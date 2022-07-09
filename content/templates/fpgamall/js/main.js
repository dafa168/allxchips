/**
 * 初始化
 */
var rfqRowIndex = 0;
$(document).ready(function () {
    //侧边栏样式
    $('#sidebar li').mouseenter(function () {
        $(this).children('.info').show();
    });
    $('#sidebar li').mouseleave(function () {
        $(this).children('.info').hide();
    });

    //监听搜索输入
    document.getElementById('searchInput').addEventListener('keyup', function (event) {
        if (event.keyCode === 13) {
            clickSearchProducts();
        }
    });

    //滚动固定头部
    let nav = document.querySelector('.bottom');
    window.addEventListener('scroll', function (e) {
        if (window.pageYOffset > 128) {
            nav.classList.add('fixed-nav');
        } else {
            nav.classList.remove('fixed-nav');
        }
    })


    //首页新产品
    var swiper = new Swiper('#new-arrival-swiper', {
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    //多图片展示
    var galleryThumbs = new Swiper('#product-swiper-thumbs', {
        spaceBetween: 10,
        slidesPerView: 3,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('#product-swiper-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });

    //预览图片
    $('.image-zoom').click(function () {
        var src = $(this).attr('src');
        var modal;

        function removeModal() {
            modal.remove();
            $('body').off('keyup.modal-close');
        }

        modal = $('<div>').css({
            background: 'RGBA(0,0,0,1) url(' + src + ') no-repeat center',
            backgroundSize: 'contain',
            width: '100%', height: '100%',
            position: 'fixed',
            zIndex: '10000',
            top: '0',
            left: '0',
            cursor: 'zoom-out'
        }).click(function () {
            removeModal();
        }).appendTo('body');
        //handling ESC
        $('body').on('keyup.modal-close', function (e) {
            if (e.key === 'Escape') {
                removeModal();
            }
        });
    });

});

function addRfq(o) {
    num = $(o).siblings('input').val();
    new_num = (parseInt(num)) - 1;
    if (new_num < 1) {
        new_num = 1;
    }
    $(o).siblings('input').val(new_num);
}

function subRfq(o) {
    num = $(o).siblings('input').val();
    new_num = (parseInt(num)) + 1;
    if (new_num > 10000000) {
        new_num = 10000000;
    }
    $(o).siblings('input').val(new_num);
}

function redirectInquiry(o) {
    href = $(o).attr('data-href');
    var num = $(o).siblings('input').val();
    window.location.href = href + '&q=' + num;
}


/**
 * 滚动到顶部
 */
function clickScrollTop() {
    $("html,body").animate({
        scrollTop: 0
    }, 500);
}


/**
 * 询报价初始化
 */
$(document).ready(function () {
    var tbody = document.getElementById('rfq-tbody');
    if (tbody != null) {
        clickAddMore();
        var part = getQueryVariable('sku');
        var q = getQueryVariable('q');
        var mfg = getQueryVariable('mfg');
        var pack = getQueryVariable('pack');
        if (part) {
            $('input[name="partNumber[]"]').val(decodeURI(part));
        }
        if (q) {
            $('input[name="quantity[]"]').val(decodeURI(q));
        }
        if (mfg) {
            $('input[name="manufacturer[]"]').val(decodeURI(mfg));
        }
        if (pack) {
            $('input[name="packaging[]"]').val(decodeURI(pack));
        }
    }
});

/**
 * 添加询价
 */
function clickAddMore(sku, q) {
    rfqRowIndex += 1;
    var template =
        '<td><input type="text" name="partNumber[]" class="form-control" value="" required></td>' +
        '<td><input type="number" name="quantity[]" class="form-control" value="" required></td>' +
        '<td><input type="number" name="targetPrice[]" class="form-control" value=""></td>' +
        '<td><input type="text" name="manufacturer[]" class="form-control" value=""></td>' +
        '<td><input type="text" name="packaging[]" class="form-control" value=""></td>' +
        '<td><input type="text" name="remark[]" class="form-control" value=""></td>' +
        '<td class="action"><a href="javascript:;" onclick="clickDelItem(' + rfqRowIndex + ')"><i class="fa fa-trash-o"></i></a></td>';
    var tbody = document.getElementById('rfq-tbody');
    var tr = document.createElement('tr');
    tr.setAttribute('id', 'rfq-row-' + rfqRowIndex);
    tr.innerHTML = template;
    tbody.appendChild(tr);
}

/**
 * 删除询价
 */
function clickDelItem(index) {
    if (index !== 1) {
        var row = document.getElementById('rfq-row-' + index);
        row.remove();
    }
}

/**
 * 获取URL参数
 */
function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] === variable) {
            return pair[1];
        }
    }
    return false;
}

/**
 * 发送询报价
 */
function clickSendRfq(keyval) {
    $('#rfq-form').validate({
        //验证规则
        rules: {
            partNumber: {
                required: true
            },
            quantity: {
                required: true
            },
            companyName: {
                required: true
            },
            contactName: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            tel: {
                required: true
            }
        },
        submitHandler: function (form) {
            //提交数据
            var inputFile = $('#input-file').val();
            if (inputFile) {
                var file = $('#input-file').prop('files')[0];
                if (file.size > 1048576) {
                    swal({
                        icon: 'warning',
                        title: 'File size exceeds 1M limit！'
                    });
                } else {
                    onUploadFile(keyval, file);
                    return;
                }
            } else {
                onSubmitRfq(keyval, null);
                return;
            }
        }
    });
}

//发送询报价(上传文件)
function onUploadFile(keyval, file) {
    var formData = new FormData();
    formData.append('inputFile', file);
    $.ajax({
        type: 'POST',
        url: '/?action=upload',
        data: formData,
        contentType: false,
        processData: false,
        success: function (result) {
            //console.log(result);
            //获取文件URL
            var fileurl = '';
            result = $.parseJSON(result);
            if (result.code === 1) {
                fileurl = result.file
                onSubmitRfq(keyval, fileurl);
                return;
            }

            swal({
                icon: 'error',
                title: 'System Error',
                text: result.msg
            });
        }
    });
}

//发送询报价(提交询价)
function onSubmitRfq(keyval, fileurl) {
    //禁用按钮状态
    $('#rfq-form :submit').attr('disabled', 'disabled');
    $('#rfq-form .fa-send').addClass('d-none');
    $('#rfq-form .fa-spinner').removeClass('d-none');
    $.ajax({
        type: 'POST',
        url: '/?action=addcom',
        data: 'rfqKey=' + keyval + '&fileUrl=' + fileurl + '&' + $('#rfq-form').serialize(),
        success: function (result) {
            //console.log(result);
            result = $.parseJSON(result);
            if (result === 0) {
                swal({
                    icon: 'error',
                    title: 'System Error',
                    text: result.msg
                });
                return
            }
            swal({
                icon: 'success',
                title: 'Submitted successfully',
                text: 'Thank you for your support, we will contact you as soon as possible!'
            });
            //重置按钮状态
            $('#rfq-form')[0].reset();
            $('#rfq-form :submit').removeAttr('disabled', 'disabled');
            $('#rfq-form .fa-send').removeClass('d-none');
            $('#rfq-form .fa-spinner').addClass('d-none');
        },
        error: function () {
            swal({
                icon: 'error',
                title: 'System Error',
                text: 'Please contact us or try again later!'
            });
        }
    });
}

/**
 * PayPal付款
 */
$(document).ready(function () {
    var paypalContainer = document.getElementById('paypal-button-container');
    if (paypalContainer != null && orderNumber != null && totalAmounts != null) {
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: totalAmounts
                        },
                        description: orderNumber
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    if (details.status === 'COMPLETED') {
                        swal({
                            icon: 'success',
                            title: 'Successful Payment',
                            text: 'Thank you, we will ship you as soon as possible!'
                        });
                    } else {
                        swal({
                            icon: 'error',
                            title: 'System Error',
                            text: 'Please feel free to contact us for payment!'
                        });
                    }
                });
            }
        }).render('#paypal-button-container');
    }
});

/**
 * 添加到收藏
 */
function AddFavorite(url, title) {
    if (window.sidebar && window.sidebar.addPanel) { // Mozilla Firefox Bookmark
        window.sidebar.addPanel(document.title, window.location.href, '');
    } else if (window.external && ('AddFavorite' in window.external)) { // IE Favorite
        window.external.AddFavorite(location.href, document.title);
    } else if (window.opera && window.print) { // Opera Hotlist
        this.title = document.title;
        return true;
    } else { // webkit - safari/chrome
        alert('Press ' + (navigator.userAgent.toLowerCase().indexOf('mac') !== -1 ? 'Command/Cmd' : 'CTRL') + ' + D to bookmark this page.');
    }
}
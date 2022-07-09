(function($){"use strict";var spinner=function(){setTimeout(function(){if($('#spinner').length>0){$('#spinner').removeClass('show');}},1);};spinner();new WOW().init();$(window).scroll(function(){if($(this).scrollTop()>300){$('.sticky-top').addClass('shadow-sm').css('top','0px');}else{$('.sticky-top').removeClass('shadow-sm').css('top','-100px');}});$(window).scroll(function(){if($(this).scrollTop()>300){$('.back-to-top').fadeIn('slow');}else{$('.back-to-top').fadeOut('slow');}});$('.back-to-top').click(function(){$('html, body').animate({scrollTop:0},1500,'easeInOutExpo');return false;});$('[data-toggle="counter-up"]').counterUp({delay:10,time:2000});$('.skill').waypoint(function(){$('.progress .progress-bar').each(function(){$(this).css("width",$(this).attr("aria-valuenow")+'%');});},{offset:'80%'});$(".project-carousel").owlCarousel({autoplay:true,smartSpeed:1000,margin:25,loop:true,nav:false,dots:true,dotsData:true,responsive:{0:{items:1},768:{items:2},992:{items:3},1200:{items:4}}});$(".testimonial-carousel").owlCarousel({autoplay:true,smartSpeed:1000,margin:25,loop:true,center:true,dots:false,nav:true,navText:['<i class="bi bi-chevron-left"></i>','<i class="bi bi-chevron-right"></i>'],responsive:{0:{items:1},768:{items:2},992:{items:3}}});})(jQuery);

function search(o){
    let sn = $("input[name=keyword]").val() ;
    window.location.href="/?keyword=" + sn ;
}



var rfqRowIndex = 0;


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
        '<td class="action"><a href="javascript:;" onclick="clickDelItem(' + rfqRowIndex + ')"><i class="fa fa-trash"></i></a></td>';
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
<?php if (!defined('EMO_ROOT')) exit('error!'); ?>


<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">Product Detail</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item">
                    <a class="text-white" href="<?php echo Url::sort($sortid); ?>" title="<?php echo $sortname ?? ''; ?>"><?php echo $sortname ?? ''; ?></a>
                </li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Product <?php echo $log_title ?? ''; ?></li>
            </ol>
        </nav>
    </div>
</div>



<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="img-border">
                    <img class="img-fluid" src="<?php echo $log_cover ?? ''; ?>" style="top: 0;left: 0" alt="<?php echo $log_title ?? ''; ?>">
                </div>
                <p>Images are for reference only See Product Specifications</p>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h6 class="section-title bg-white text-start text-primary pe-3">  7x24-hr service365 days warranty </h6> <br>
                    <h1 class="display-6 mb-4"> <?php echo $log_title ?? ''; ?> </h1>

                    <div class="row g-4">
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Part Number: </p>
                                    <p class="mb-2">  <?php echo $sku ?? ''; ?> </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Manufacturer/Brand: </p>
                                    <p class="mb-2">  <?php echo $brand ?? ''; ?> </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">Part of Description: </p>
                                    <p class="mb-2"> <?php echo $desc ?? ''; ?> </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2"> Part of Status: </p>
                                    <p class="mb-2">  <?php echo $part_status ?? ''; ?> </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2"> Package: </p>
                                    <p class="mb-2"> <?php echo $package ?? ''; ?> </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2"> Stock Condition: </p>
                                    <p class="mb-2"> √  </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2"> Datasheets: </p>
                                    <p class="mb-2">
                                        <a href="<?php echo $datasheet ?? ''; ?>" target="_blank" style="color: inherit;"
                                           rel="nofollow">
                                            <i class="fa fa-file-pdf-o text-danger"></i>
                                            <?php echo $log_title ?? ''; ?> - PDF </a>
                                    </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="skill">
                                <div class="d-flex justify-content-between">
                                    <p class="mb-2">  Unit Price: </p>
                                    <p class="mb-2">  $<?php echo $unit_price ?? 0; ?> </p>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p> This price is for reference only, please contact us for now price sales@fbgaonline.com </p>

                    <div class="col-lg-12 col-md-12">
                        <div class="position-relative mx-auto">
                            <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" type="number" id="number" min="1" max="100000" value="" placeholder="Please enter your purchase quantity">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" id="checkout" onclick="redirectInquiry(this)" data-href="/inquiry.html?sku=<?php echo $sku ?? ''; ?>">Checkout</button>
                            <div class="mb-3">Minimum: 1</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="h-100">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Product Introduction </h6>
                    <p class="mb-4">
                        fbgaonline provides full support lattice components  <?php echo $log_title ?? ''; ?> info for users
                    </p>
                       <p> lattice Unique high-performance, heterogeneous and flexible adaptive platform solutions</p>

                    <p>  Which one can offer better ALTERA FBGA chips? Please Log in to fbgaonline, here you can find lattice the abundant part numbers like stock parts,
                        hot offer parts,more used parts and obsolete parts etc and buy them. Waiting for your online enquiry
                    </p>
                    <p> Q: How To Order  <?php echo $log_title ?? ''; ?>?<br>
                        A: Please click on the "Add to Cart" Button and then proceed to checkout Or end us a RFQ.
                    </p>
                    <p>  Q: How To Pay for  <?php echo $log_title ?? ''; ?>?<br>
                        A: We accept T/T(Bank wire), Paypal, Credit card Payment through PayPal.
                    </p>
                    <p>  Q: How Long Can I Get The  <?php echo $log_title ?? ''; ?>?<br>
                        A: We will ship via FedEx or DHL or UPS, Normally will take 4 or 5 days to arrive at your office. We can also ship via registered airmail,
                        Normally will take 14-38 days to arrive at your office. Please choose your preferred shipping method when checking out on our website.
                    </p>
                    <p>   Q:  <?php echo $log_title ?? ''; ?> Warranty? <br>
                        A: We Provide 7x24-hr service and 365 days warranty for our product.
                    </p>
                    <p>   Q:  <?php echo $log_title ?? ''; ?> Technical Support?<br>
                        A: Yes, Our product technical engineer will help you with the  <?php echo $log_title ?? ''; ?> pinout information, application notes, replacement, datasheet in pdf,
                        manual, schematic, equivalent, cross reference.
                    </p>

                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">

                <div class="h-100">
                    <h6 class="section-title bg-white text-start text-primary pe-3">Product Attributes </h6>
<!--                    <h1 class="display-6 mb-4">Why People Trust Us? Learn About Us!</h1>-->

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Type</th>
                                <th>Description</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if (isset($attrs)): ?>
                                <?php foreach ($attrs as $v): ?>
                                    <tr>
                                        <td><?php echo $v['name'] ?? ''; ?></td>
                                        <td><?php echo $v['value'] ?? ''; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else:?>
                                <tr>
                                    <td colspan="3"> Sorry. no content yet </td>
                                </tr>
                            <?php endif; ?>



                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Related Products</h6>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">

            <?php if (isset($similar_logs)) : ?>
                <?php foreach ($similar_logs as $k => $v) : ?>

                    <div class="project-item border rounded h-100 p-4" data-dot="<?php echo ++$k; ?>">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded" src="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" alt="">
                            <a href="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" data-lightbox="project"><i
                                        class="fa fa-eye fa-2x"></i></a>
                        </div>
                        <h6> <?php echo $v['log_title'] ?? ''; ?> </h6>
                        <h5> $<?php echo $v['log_price'] ?? ''; ?> </h5>
                        <span> <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>"> </a> </span>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Related keywords for : <?php echo $log_title; ?>C</h6>
            <!--            <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1>-->
        </div>
        <div class="row g-4">
            <?php if (isset($rkeys) && !empty($rkeys)) : ?>
                <?php foreach ($rkeys as $v) : ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item text-center p-4">
                            <div class="team-text">
                                <div class="team-title">
                                    <h5><?php echo $log_title; ?><?php echo $v ?? ''; ?></h5>
                                </div>
                                <div class="team-social">
                                    <p><?php echo $log_title; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                Sorry, there is no content yet.
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include View::getView('footer'); ?>

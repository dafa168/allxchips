<?php if (!defined('EMO_ROOT')) exit('error!'); ?>


<div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Our Mission</h5>
                <p><?php echo $bloginfo ?? ''; ?></p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Quick Links</h5>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Products</h5>
                <div class="row g-2">
                    <div class="col-4">
                        <a href="/sort/xilinx" target="_blank">
                            <img class="img-fluid rounded" src="<?php echo TEMPLATE_URL; ?>static/img/xilinx.jpg" alt="xinlinx">
                        </a>

                    </div>
                    <div class="col-4">
                        <a href="/sort/altera" target="_blank">
                            <img class="img-fluid rounded" src="<?php echo TEMPLATE_URL; ?>static/img/altera.jpg" alt="altera">
                        </a>

                    </div>
                    <div class="col-4">
                        <a href="/sort/lattice" target="_blank">
                            <img class="img-fluid rounded" src="<?php echo TEMPLATE_URL; ?>static/img/lattice.jpg" alt="lattice">
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">Contact Us</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i> <a href="skype:<?php echo $skype ?? ''; ?>" rel="nofollow"><?php echo $skype ?? ''; ?></a> </p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>  <?php echo $phone ?? ''; ?><br> </p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo $email ?? ''; ?></p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <?php echo $footer_info ?? ''; ?>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Welcome our website !
                </div>
            </div>
        </div>
    </div>
</div>


<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/jquery-3.4.1.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>static/js/jquery.validate.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>static/js/sweetalert.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/bootstrap.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.6.1/js/bootstrap.min.js"></script>

<script src="<?php echo TEMPLATE_URL; ?>static/js/wow.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/easing.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<script src="<?php echo TEMPLATE_URL; ?>static/js/waypoints.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>static/js/counterup.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/owl.carousel.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdn.bootcdn.net/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/lightbox.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdn.bootcdn.net/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>

<script src="<?php echo TEMPLATE_URL; ?>static/js/main.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>static/js/rocket-loader.min.js" data-cf-settings="079ce9da3967b3c8f471e7f9-|49" defer=""></script>
</body>
</html>
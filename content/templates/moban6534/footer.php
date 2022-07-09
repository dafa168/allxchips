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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha512-bnIvzh6FU75ZKxp0GXLH9bewza/OIw6dLVh9ICg0gogclmYGguQJWl8U30WpbsGTqbIiAwxTsbe76DErLq5EDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/jquery.validate.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/sweetalert.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/bootstrap.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.min.js" integrity="sha512-Pv/SmxhkTB6tWGQWDa6gHgJpfBdIpyUy59QkbshS1948GRmj6WgZz18PaDMOqaEyKLRAvgil7sx/WACNGE4Txw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/wow.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/easing.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php echo TEMPLATE_URL; ?>static/js/waypoints.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js" integrity="sha512-fHXRw0CXruAoINU11+hgqYvY/PcsOWzmj0QmcSOtjlJcqITbPyypc8cYpidjPurWpCnlB8VKfRwx6PIpASCUkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/counterup.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js" integrity="sha512-d8F1J2kyiRowBB/8/pAWsqUl0wSEOkG5KATkVV4slfblq9VRQ6MyDZVxWl2tWd+mPhuCbpTB4M7uU/x9FlgQ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/owl.carousel.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js" integrity="sha512-lo4YgiwkxsVIJ5mex2b+VHUKlInSK2pFtkGFRzHsAL64/ZO5vaiCPmdGP3qZq1h9MzZzghrpDP336ScWugUMTg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--<script src="--><?php //echo TEMPLATE_URL; ?><!--static/js/lightbox.min.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js" integrity="sha512-nUUXyEC/xe6BRSl6eTPMaXErp5wdoftIGgrCBRd51MmwMn9PnN+X2usTJb7sGphsXtKT335xWAbccalopgcjNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php echo TEMPLATE_URL; ?>static/js/main.js" type="079ce9da3967b3c8f471e7f9-text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>static/js/rocket-loader.min.js" data-cf-settings="079ce9da3967b3c8f471e7f9-|49" defer=""></script>
<!--<script src="https://cdn.jsdelivr.net/npm/rocket-loader@2.4.0/js/loader.min.js" data-cf-settings="079ce9da3967b3c8f471e7f9-|49" defer=""></script>-->
</body>
</html>
<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5 mb-3">
                <img src="<?php echo TEMPLATE_URL; ?>img/logo_bm.png" class="logo"
                     alt="FBGA Solutions logo">

                <p class="mt-3 mb-3"> <?php echo $bloginfo ?? ''; ?></p>
                <p>
                    <a href="#" title="<?php echo $phone ?? ''; ?>">
                        <img src="<?php echo TEMPLATE_URL; ?>img/icon_tel.png"
                             style="height: 15px;" alt="img-tel">
                        <?php echo $phone ?? ''; ?>
                    </a>
                </p>
                <p>
                    <a href="#" title="<?php echo $email ?? ''; ?>">
                        <img src="<?php echo TEMPLATE_URL; ?>img/icon_email.png" style="height: 15px;" alt="img-email">
                        <?php echo $email ?? ''; ?>
                    </a>
                </p>
            </div>
            <div class="col-md-2 mb-3 f-products">
                <h5>Products</h5>
                <ul>
                    <li>
                        <a href="/sort/xilinx" title="xilinx distributor">
                            <img src="<?php echo TEMPLATE_URL; ?>img/xilinx.jpg" class="mfg"
                                 alt="xinlinx">
                        </a>
                    </li>
                    <li>
                        <a href="/sort/altera" title="Altera Distributors">
                            <img src="<?php echo TEMPLATE_URL; ?>img/altera.jpg" class="mfg"
                                 alt="altera">
                        </a>
                    </li>
                    <li>
                        <a href="/sort/lattice" title="Altera Distributors">
                            <img src="<?php echo TEMPLATE_URL; ?>img/lattice.jpg" class="mfg"
                                 alt="lattice">
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-2 mb-3 f-service">
                <h5>Service</h5>
                <ul>
                    <li>
                        <a href="/about.html" rel="nofollow"
                           title="About fbgaonline">About Us</a>
                    </li>
                    <li>
                        <a href="/support.html" rel="nofollow" title="Supports">Supports</a>
                    </li>
                    <li>
                        <a href="/quality.html" rel="nofollow"
                           title="Quality Control">Quality Control</a>
                    </li>
                    <li>
                        <a href="/inquiry.html" rel="nofollow"
                           title="RFQ/Quote">RFQ/Quote</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-3 mb-3 f-statement">
                <h5>Statement of liability</h5>
                <ul>
                    <li>
                        <a href="/privacy-policy.html" rel="nofollow"
                           title="Privacy Policy">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="/return-exchange.html" rel="nofollow"
                           title="Return&Exchange">Return & Exchange</a>
                    </li>
                    <li>
                        <a href="/terms-conditions.html" rel="nofollow"
                           title="Terms&Conditions">Terms & Conditions</a>
                    </li>
                    <li>
                        <a href="/faq.html" rel="nofollow" title="FAQ">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h5>Search For : </h5>
                <ul class="list-inline">
                    <?php foreach (widget_letter_list() as $v) : ?>
                        <li class="list-inline-item"><a href="<?php echo BLOG_URL . '?letter=' . $v; ?>"><?php echo $v ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="support">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_01.png" alt="img1">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_02.png" alt="img2">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_03.png" alt="img3">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_04.png" alt="img4">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_05.png" alt="img5">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_06.png" alt="img6">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_07.png" alt="img7">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_08.png" alt="img8">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_09.png" alt="img8">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_10.png" alt="img10">
                </div>
            </div>
            <div class="col-md-12">
                <p class="copywrite">
                    <?php echo $footer_info ?? ''; ?>
                    <?php doAction('index_footer'); ?>
                </p>
            </div>
        </div>


    </div>
</div>

<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/swiper.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/sweetalert.min.js"></script>
<script type="text/javascript" src="<?php echo TEMPLATE_URL; ?>js/main.js"></script>

</body>
</html>
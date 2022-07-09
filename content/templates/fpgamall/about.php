<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<div class="article">
    <div class="head">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BLOG_URL; ?>" title="FBGA Solutions,FBGA Technologies">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About Us</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title"><?php echo $log_title??''; ?></h1>
                <div class="source">source：<?php echo BLOG_URL; ?> date：<?php echo date('Y-m-d', '1632028554'); ?></div>
                <?php echo $log_content??''; ?>
            </div>
            <div class="col-md-5">
                <h1 class="title">Company Culture</h1>
                <div class="cp cp-1">
                    <h5>Orientation:</h5>
                    <p>
                        Based on merchandise
                        excellence, price of
                        advantage and high-quality
                        services, fbgaonline should be the
                        customers' preferred electronic
                        component supplier.
                    </p>
                </div>
                <div class="cp cp-2">
                    <h5>Mission:</h5>
                    <p>
                        Create maximum values for
                        customers continuously; build
                        inventory data of excellence and
                        advantage permanently; and the
                        more the data are, the better the
                        result will be.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div style="padding: 2rem 0;">
                    <img src="<?php echo TEMPLATE_URL; ?>img/img_certificate.jpg" alt="certificate" style="width: 1000px;">
                </div>
            </div>
            <div class="col-md-12">
                <img src="<?php echo TEMPLATE_URL; ?>img/img_about.jpg" alt="about" style="max-width: 353px;float: left;margin-right: 1rem;">
                <table class="table table-bordered" style="width: calc(100% - 500px);">
                    <tr>
                        <td class="bg-light">Business Type</td>
                        <td>Trading Company, Distributor/Wholesaler</td>
                    </tr>
                    <tr>
                        <td class="bg-light">Main Products</td>
                        <td>Electronic Integrated Circuit</td>
                    </tr>
                    <tr>
                        <td class="bg-light">Certifications</td>
                        <td>ISO9001</td>
                    </tr>
                    <tr>
                        <td class="bg-light">Total Annual Revenue</td>
                        <td>US$2.5 Million - US$5 Million</td>
                    </tr>
                    <tr>
                        <td class="bg-light">Country / Region</td>
                        <td>Hongkong, China</td>
                    </tr>
                    <tr>
                        <td class="bg-light">Total Employees</td>
                        <td>100 - 200 People</td>
                    </tr>
                    <tr>
                        <td class="bg-light">Year Established</td>
                        <td>2018</td>
                    </tr>
                    <tr>
                        <td class="bg-light">Main Markets</td>
                        <td>North America<br>South Asia<br>Western Europe</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include View::getView('footer');
?>

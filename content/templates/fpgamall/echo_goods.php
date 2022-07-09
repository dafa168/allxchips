<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<div class="detail">
    <div class="head">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BLOG_URL; ?>" title="FBGA Solutions,FBGA Technologies">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo Url::sort($sortid); ?>" title="<?php echo $sortname ?? ''; ?>"><?php echo $sortname ?? ''; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $log_title ?? ''; ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <form class="form" id="rfq-form" method="post" action="" onsubmit="return false">
            <div class="row">
                <div class="col-md-9">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="swiper-box">
                                <div class="brand-img text-center">
                                    <img src="<?php echo TEMPLATE_URL; ?>img/<?php echo $sortname ?? ''; ?>.jpg" alt="<?php echo $sortname ?? ''; ?>">
                                </div>
                                <div class="swiper-container gallery-top" id="product-swiper-top">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img class="image-zoom" style="cursor: zoom-in" src="<?php echo $log_cover ?? ''; ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div style="padding: 10px 40px; position: relative;">
                                    <div class="swiper-container gallery-thumbs" id="product-swiper-thumbs">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img src="<?php echo $log_cover ?? ''; ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>

                            <p class="text-center mb-0">Images are for reference only See Product Specifications</p>
                        </div>
                        <div class="col-md-8">
                            <div class="name">
                                <h1 style="color: #C20017;"><?php echo $log_title; ?></h1>
                                <p class="text-center"><span class="bg-danger text-white" style="padding: 0 5px;">7x24-hr service</span><span
                                            class="bg-primary text-white"
                                            style="padding: 0 5px;">365 days warranty</span></p>
                            </div>
                            <div class="param">
                                <ul>
                                    <li>
                                        <strong>Part Number:</strong>
                                        <?php echo $sku ?? ''; ?>
                                    </li>
                                    <li>
                                        <strong>Manufacturer/Brand:</strong>
                                        <?php echo $brand ?? ''; ?>
                                    </li>
                                    <li>
                                        <strong>Part of Description:</strong>
                                        <?php echo $desc ?? ''; ?>
                                    </li>
                                    <li>
                                        <strong>Part of Status:</strong>
                                        <?php echo $part_status ?? ''; ?>
                                    </li>
                                    <li>
                                        <strong>Package:</strong>
                                        <?php echo $package ?? ''; ?>
                                    </li>
                                    <li>
                                        <strong>Stock Condition:</strong>
                                        <i class="fa fa-check text-success"></i>
                                    </li>
                                    <li>
                                        <strong>Datasheets:</strong>
                                        <a href="<?php echo $datasheet ?? ''; ?>" target="_blank" style="color: inherit;"
                                           rel="nofollow">
                                            <i class="fa fa-file-pdf-o text-danger"></i>
                                            <?php echo $log_title ?? 0; ?> </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="price">
                                <div style="font-size: 1.5rem; font-weight: bold;">
                                    Unit Price:
                                    <span style="color: #FF7B00; font-size: 2rem;"> $<?php echo $unit_price ?? 0; ?> </span>
                                </div>
                                <div style="color: red;font-size: 12px;margin-bottom: 1em;">
                                    This price is for reference only, please contact us for now price <?php echo $email ?? '' ?>
                                </div>
                            </div>
                            <div class="qty">
                                <div class="input-group">
                                    <div class="input-group-prepend" onclick="addRfq(this)">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                    </div>
                                    <input type="text" class="form-control" placeholder=""
                                           aria-label="Example text with two button addons"
                                           aria-describedby="button-addon3" value="0">
                                    <div class="input-group-append" onclick="subRfq(this)">
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                    <a onclick="redirectInquiry(this)" data-href="/inquiry.html?sku=<?php echo $sku ?? ''; ?>" class="btn btn-danger"
                                       style="padding: 8px 20px; color: #FFF">ADD TO RFQ</a>
                                </div>
                                <div class="mb-3">Minimum: 1</div>
                            </div>
                            <div class="pay">
                                <img src="<?php echo TEMPLATE_URL; ?>img/img_01.png" alt="paypal">
                                <img src="<?php echo TEMPLATE_URL; ?>img/img_02.png" alt="visa">
                                <img src="<?php echo TEMPLATE_URL; ?>img/img_03.png" alt="xl">
                                <img src="<?php echo TEMPLATE_URL; ?>img/img_04.png" alt="amex">
                                <img src="<?php echo TEMPLATE_URL; ?>img/img_05.png" alt="escrow">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card inquiry">
                                <div class="card-header">
                                    Request Quote
                                </div>
                                <div class="card-body">
                                    <p>Please complete all required fields with your contact information. Click "SUBMIT"
                                        we will contact you shortly by email. Or Email us: info@fbgaonline.com</p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white"><span
                                                                class="text-danger">*</span>Part Number</span>
                                                </div>
                                                <input style="min-width: 100px;" type="text" class="form-control"
                                                       name="partNumber" value="<?php echo $log_title; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white"><span
                                                                class="text-danger">*</span>Quantity</span>
                                                </div>
                                                <input style="min-width: 100px;" min="0" type="number" class="form-control"
                                                       name="quantity" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text bg-white">Target Price</span>
                                                </div>
                                                <input style="min-width: 100px;" min="0" type="number" class="form-control"
                                                       name="targetPrice" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="arrow-right">
                                        <img src="<?php echo TEMPLATE_URL; ?>img/arrow-right.png" alt="arrow-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Product Introduction
                                </div>
                                <div class="card-body" style="font-size: 14px;">
                                    <p>fbgaonline provides full support <?php echo $sortname ?? ''; ?> components <?php echo $log_title; ?> info for
                                        users</p>
                                    <p><?php echo $sortname ?? ''; ?> Unique high-performance, heterogeneous and flexible adaptive platform
                                        solutions</p>
                                    <p>Which one can offer better ALTERA FBGA chips? Please Log in to fbgaonline, here you
                                        can find <?php echo $sortname ?? ''; ?> the abundant part numbers like stock parts,hot offer parts,more
                                        used parts and obsolete parts etc and buy them. Waiting for your online
                                        enquiry</p>
                                    <ul>
                                        <li class="pb-3">
                                            Q: How To Order <?php echo $log_title; ?>?</br>
                                            <span class="text-muted">A: Please click on the "Add to Cart" Button and then proceed to checkout Or end us a RFQ.</span>
                                        </li>
                                        <li class="pb-3">
                                            Q: How To Pay for <?php echo $log_title; ?>?</br>
                                            <span class="text-muted">A: We accept T/T(Bank wire), Paypal, Credit card Payment through PayPal.</span>
                                        </li>
                                        <li class="pb-3">
                                            Q: How Long Can I Get The <?php echo $log_title; ?>?</br>
                                            <span class="text-muted">A: We will ship via FedEx or DHL or UPS, Normally will take 4 or 5 days to arrive at your office.
                      We can also ship via registered airmail, Normally will take 14-38 days to arrive at your office.
                      Please choose your preferred shipping method when checking out on our website.</span>
                                        </li>
                                        <li class="pb-3">
                                            Q: <?php echo $log_title; ?> Warranty?</br>
                                            <span class="text-muted">A: We Provide 7x24-hr service and 365 days warranty for our product.</span>
                                        </li>
                                        <li class="pb-3">
                                            Q: <?php echo $log_title; ?> Technical Support?</br>
                                            <span class="text-muted">A: Yes, Our product technical engineer will help you with the <?php echo $log_title; ?> pinout information,
                      application notes, replacement, datasheet in pdf, manual, schematic, equivalent, cross reference.</span>
                                        </li>
                                    </ul>
                                    <p class="card-text">
                                        <?php echo $content ?? ''; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    CAD Models
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title">
                                                <img src="<?php echo TEMPLATE_URL; ?>img/img_cad1.jpg" alt="cad">
                                                <img src="<?php echo TEMPLATE_URL; ?>img/img_cad2.jpg" alt="cad">
                                                PCB Symbol,Footprint & 3D Model
                                            </h5>
                                            <p class="card-text">Available download format</p>
                                            <p class="card-text">
                                                <span class="mr-2 text-muted"><i class="fa fa-check-circle"></i> Altium</span>
                                                <span class="mr-2 text-muted"><i
                                                            class="fa fa-check-circle"></i> Eagle</span>
                                                <span class="mr-2 text-muted"><i
                                                            class="fa fa-check-circle"></i> OrCad</span>
                                                <span class="mr-2 text-muted"><i
                                                            class="fa fa-check-circle"></i> PADS</span>
                                                <span class="mr-2 text-muted"><i
                                                            class="fa fa-check-circle"></i> KiCad</span>
                                            </p>
                                            <p class="card-text">
                                                By downloading CAD models from fbgaonline, you agree to our
                                                <span class="text-muted">Terms & Conditions</span>
                                                and
                                                <span class="text-muted">Privacy Policy.</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Product Attributes
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th style="width: 50%;">Type</th>
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
                                            <?php endif; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <img class="mb-3" src="<?php echo TEMPLATE_URL; ?>img/img_certifications.png" alt="certifications">
                            <div class="card inquiry-card">
                                <div class="card-header">
                                    Quotation Consultation
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span>Contact Name:</label>
                                        <input type="text" class="form-control" name="contactName" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span>Company:</label>
                                        <input type="text" class="form-control" name="companyName" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span>E-Mail:</label>
                                        <input type="email" class="form-control" name="email" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label><span class="text-danger">*</span>Phone:</label>
                                        <input type="tel" class="form-control" name="phone" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Comment:</label>
                                        <textarea class="form-control" rows="5" name="comment" value=""></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-primary" style="width: 100%;"
                                                onclick="clickSendRfq(1)">
                                            <i class="fa fa-send fa-fw"></i>
                                            <i class="fa fa-spinner fa-spin fa-fw d-none"></i>
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    You May Looking For
                                </div>
                                <div class="card-body maybe">
                                    <ul>
                                        <?php if (isset($random_logs)) : ?>
                                            <?php foreach ($random_logs as $v) : ?>
                                                <li>
                                                    <img style="width: 55px;" src="<?php echo $v['log_cover'] ?? ''; ?>" alt="<?php echo $v['log_title'] ?? ''; ?>">
                                                    <div class="d-inline-block pl-3">
                                                        <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>" target="_blank">
                                                            <?php echo $v['log_title'] ?? ''; ?> </a>
                                                        <br>
                                                        <small class="text-muted"><?php echo $v['log_desc'] ?? ''; ?></small>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Start With
                                </div>
                                <ul class="list-group list-group-flush">
                                    <?php if (isset($views_logs)) : ?>
                                        <?php foreach ($views_logs as $v) : ?>
                                            <li class="list-group-item">
                                                <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>"
                                                   class="card-link" target="_blank" rel="nofollow">
                                                    <?php echo $v['log_title'] ?? ''; ?>
                                                    <span class="badge badge-light"><?php echo $v['log_views'] ?? ''; ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    New products
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <a href="/rss.php" title="new product sitemap">
                                            <img style="width:480px" src="<?php echo TEMPLATE_URL; ?>img/Xilinx-Products.jpg" alt="hot">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="hot-sale mb-0">
                    <?php if (isset($hot_logs)) : ?>
                        <?php foreach ($hot_logs as $v) : ?>
                            <a class="text-overflow" href="<?php echo $v['log_url'] ?? ''; ?>"
                               title="<?php echo $v['log_title'] ?? ''; ?>"><B><?php echo $v['log_title'] ?? ''; ?></B></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <div class="card-header">
                    Other Products
                </div>
                <div class="card-body">
                    <div class="row">

                        <?php if (isset($similar_logs) && !empty($similar_logs)) : ?>
                            <?php foreach ($similar_logs as $v) : ?>

                                <div class="col-md-3 clearfix">
                                    <div class="d-box">
                                        <a class="a-link" href="<?php echo $v['log_url'] ?? ''; ?>" target="_blank" title="<?php echo $v['log_title'] ?? ''; ?>"></a>
                                        <div class="left">
                                            <img src="<?php echo $v['log_cover']; ?>" alt="<?php echo $v['log_title'] ?? ''; ?>">
                                        </div>
                                        <div class="right">
                                            <h3><?php echo $v['log_title'] ?? ''; ?></h3>
                                            <p>
                                                <label>Description:</label>
                                                <?php echo $v['log_desc'] ?? ''; ?> </p>
                                            <p>
                                                <label>Datasheet:</label>
                                                <a href="<?php echo $v['log_datasheet'] ?? ''; ?>" target="_blank" style="color: inherit;"
                                                   rel="nofollow">
                                                    <i class="fa fa-file-pdf-o text-danger"></i>
                                                    <?php echo $v['log_title'] ?? 0; ?> </a>
                                            </p>
                                            <p class="text-center">
                                                <span class="btn">Checkout</span>
                                            </p>
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
        </div>

        <div class="grid">
            <div class="card">
                <div class="card-header">
                    Related keywords for : <?php echo $log_title; ?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if (isset($rkeys) && !empty($rkeys)) : ?>
                            <?php foreach ($rkeys as $v) : ?>
                                <div class="col-md-3 clearfix">
                                    <div class="d-box">
                                         <span><?php echo $log_title; ?><?php echo $v ?? ''; ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            Sorry, there is no content yet.
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include View::getView('footer'); ?>

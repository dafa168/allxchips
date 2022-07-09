<?php
/**
 * 自建页面模板
 */
if (!defined('EMO_ROOT')) {
    exit('error!');
}
?>


<div class="article">
    <div class="head">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BLOG_URL; ?>" title="FBGA Solutions,FBGA Technologies">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Support</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title" title="<?php echo $log_title ??''; ?>">Spot buy Service</h1>
                <div class="divider"></div>
                <div class="source">source：<?php echo BLOG_URL; ?> date：<?php echo date('Y-m-d', '1632028554'); ?></div>
                <?php echo $log_content ??''; ?>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title">Packing Service</h1>
                        <div class="divider"></div>
                        <p style="text-indent: 0;">
                            1.Tape & Reel<br>
                            2.Baking<br>
                            3.Dry-Pack<br>
                            4.Lead Formation & Crimping<br>
                            We provide a full range of packaging services,
                            governed by the size and configuration of your
                            component, strictly observing the requirements
                            of EIA-481 Standard and performing in an ESD
                            safe handling work environment to make sure
                            your products are produced and delivered in a
                            right condition with international standards.
                        </p>
                    </div>
                    <div class="col-md-12 pt-3">
                        <h1 class="title">Logistics services</h1>
                        <div class="divider"></div>
                        <p>
                            We are glad to provide a wide range of logistics
                            services and expertise to our global customers,
                            without you having to maintain global teams
                            and locations.Regardless of where you are, from
                            where the electronic components are coming,
                            or where they are going, we can provide a
                            one-stop solution for you, from transshipping,
                            drop shipping, warehousing, pick and pack, and
                            tracking services to a complete logistics
                            solution.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include View::getView('footer');
?>

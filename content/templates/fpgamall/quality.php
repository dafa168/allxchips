<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<div class="article">
    <div class="head">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BLOG_URL; ?>" title="FBGA Solutions,FBGA Technologies">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quality Control</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title" title="<?php echo $log_title ?? ''; ?>">Quality Control</h1>
                <div class="source">source：<?php echo BLOG_URL; ?> date：<?php echo date('Y-m-d', '1632028554'); ?></div>
                <?php echo $log_content ?? ''; ?>
            </div>
            <div class="col-md-5">
                <img src="<?php echo TEMPLATE_URL; ?>img/qc_1.jpg" class="qc" alt="Quality Control">
                <br>
                <img src="<?php echo TEMPLATE_URL; ?>img/qc_2.jpg" class="qc" alt="Quality Control">
            </div>
        </div>
    </div>
</div>

<?php
include View::getView('footer');
?>

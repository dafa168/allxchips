<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<div class="brand">
    <div class="head">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" title="FBGA Solutions,FBGA Technologies">Home</a></li>
                    <li class="breadcrumb-item"><a href="#" title="Search">Search</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $keyword ?? ''; ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="hot-sale">
            <?php if (isset($hot_logs)) : ?>
                <?php foreach ($hot_logs as $v) : ?>
                    <a class="text-overflow" href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>"><B><?php echo $v['log_title'] ?? ''; ?></B></a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="pager">
            <div class="row mb-4">
                <div class="col-md-4">
                    <p class="total">Total: <span class="num"><?php echo $lognum ?? ''; ?></span></p>
                </div>
                <div class="col-md-8" style="overflow: auto;">
                </div>
            </div>
        </div>
        <div class="grid">
            <div class="row">
                <?php doAction('search_loglist_top');
                if (!empty($logs)): ?>
                    <?php foreach ($logs as $v): ?>

                        <div class="col-md-3 clearfix">
                            <div class="b-box">
                                <a class="a-link" href="<?php echo $v['log_url']; ?>" title="<?php echo $v['log_title']; ?>"></a>
                                <div class="left">
                                    <?php if (!empty($v['log_cover'])) : ?>
                                        <img src="<?php echo $v['log_cover']; ?>" alt="<?php echo $v['log_title']; ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="right">
                                    <h3><?php echo $v['log_title']; ?></h3>
                                    <p>
                                        <label>Description:</label> <?php echo $v['log_description']; ?> </p>
                                    <p>
                                        <label>Datasheet:</label>
                                    </p>
                                    <p class="text-center">
                                        <span class="btn">Checkout</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Sorry, there is no content yet。</p>
                <?php endif; ?>
            </div>
        </div>
        <div class="pager text-right" style="overflow: auto;">
            <?php echo $page_url ?? ''; ?>
        </div>
    </div>
</div>

<?php include View::getView('footer'); ?>

<?php if (!defined('EMO_ROOT')) exit('error!'); ?>


<div class="article">
    <div class="head">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BLOG_URL; ?>" title="FBGA Solutions,FBGA Technologies">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7 mb-3">
                <h2 class="lt">Blog</h2>

                <?php
                doAction('index_loglist_top');
                if (!empty($logs)):?>
                    <?php foreach ($logs as $value): ?>
                        <div class="list">
                            <a href="<?php echo $value['log_url']; ?>" style="color: inherit;" title="<?php echo $value['log_title']; ?>">
                                <h5><?php echo $value['log_title']; ?></h5>
                            </a>
                            <p class="text-muted"></p>
                            <div class="sl">
                                <small>By </small>
                                <span class="share">
                                  <a href="javascript:;">
                                    <i class="fa fa-facebook fa-fw"></i>
                                  </a>
                                  <a href="javascript:;">
                                    <i class="fa fa-twitter fa-fw"></i>
                                  </a>
                                  <a href="javascript:;">
                                    <i class="fa fa-linkedin fa-fw"></i>
                                  </a>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Sorry, there is no content yet.</p>
                <?php endif; ?>

                <div class="mt-3" style="overflow: auto;float: right;">
                    <?php echo $page_url ?? ''; ?>
                </div>
            </div>

            <div class="col-md-5">
                <h2 class="lt" style="width: 350px;">Hot Tags</h2>
                <img style="width: 350px" src="<?php echo TEMPLATE_URL; ?>img/wz_img3.jpg" alt="hot">
                <br>
                <div class="tag">
                    <?php if (isset($tags)): ?>
                        <?php foreach ($tags as $k => $v): ?>
                            <a href="/search/?tag=<?php echo $v['tagname']; ?>" class="badge badge-info" title="<?php echo $v['tagname']; ?>"><?php echo $v['tagname']; ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include View::getView('footer'); ?>

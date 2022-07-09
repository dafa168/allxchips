<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<div class="article">
    <div class="head">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BLOG_URL; ?>" title="FBGA Solutions,FBGA Technologies">Home</a></li>
                    <li class="breadcrumb-item"><a href="/sort/blog" title="blog">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $log_title ?? ''; ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="title"><?php echo $log_title; ?></h1>
                <div class="source">By <?php blog_sort($logid ?? 0); ?></div>
                <div class="ftl">
                    <a href="#">
                        <i class="fa fa-facebook fa-fw fa-2x"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-twitter fa-fw fa-2x"></i>
                    </a>
                    <a href="#">
                        <i class="fa fa-linkedin fa-fw fa-2x"></i>
                    </a>
                </div>
                <div class="pt-2 pb-4">
                    <small class="text-muted">Related Part Numbers:</small>

                    <?php echo $site_key ?? ''; ?>
                    <!--<a href="EP4S40G2F40I1.htm" title="EP4S40G2F40I1" class="badge badge-light">
                        EP4S40G2F40I1 </a>
                    <a href="" title="EP4S40G2F40I1N" class="badge badge-light">
                        EP4S40G2F40I1N </a>
                    <a href="EP1AGX50DF780I6.htm" title="EP1AGX50DF780I6" class="badge badge-light">
                        EP1AGX50DF780I6 </a>
                    <a href="EP1AGX60DF780C6N.htm" title="EP1AGX60DF780C6N" class="badge badge-light">
                        EP1AGX60DF780C6N </a>
                    <a href="EP3C25Q240C8N.htm" title="EP3C25Q240C8N" class="badge badge-light">
                        EP3C25Q240C8N </a>-->
                </div>
                <div class="content">
                    <h2 style="font-size: 1rem;">
                        <?php echo $blog_info ?? ''; ?>
                    </h2>
                    <hr id="null">
                    <div>
                        <?php echo $log_content ?? ''; ?>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <img src="<?php echo TEMPLATE_URL; ?>img/wz_img1.jpg" class="qc" alt="ic-img">
                <br>
                <img src="<?php echo TEMPLATE_URL; ?>img/wz_img2.jpg" class="qc" alt="ic-img">
                <br>
                <h3 style="color: #996600">Hote Products:</h3>

                <?php if (isset($hot_logs)): ?>
                    <?php foreach ($hot_logs as $k => $v): ?>
                        <a href="<?php echo $v['log_url']; ?>" class="badge badge-info" title="<?php echo $v['log_title']; ?>"><?php echo $v['log_title']; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>

                <h3 style="color: #996600">Products Tag :</h3>
                <?php if (isset($tags)): ?>
                    <?php foreach ($tags as $k => $v): ?>
                        <a href="/?tag=<?php echo $v['tagname']; ?>" class="badge badge-info" title="<?php echo $v['tagname']; ?>"><?php echo $v['tagname']; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>


        </div>
    </div>
</div>

<?php include View::getView('footer'); ?>

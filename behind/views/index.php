<?php if (!defined('EMO_ROOT')) {
    exit('error!');
} ?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hi，<a class="small" href="./blogger.php"><?php echo $user_cache[UID]['name']??'' ?></a></h1>
        <?php doAction('adm_main_top'); ?>
    </div>
<?php if (ROLE == ROLE_ADMIN): ?>
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <h6 class="card-header">站点信息</h6>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">产品
                            <a href="./article.php"><span class="badge badge-primary badge-pill"><?php echo $sta_cache['lognum']??''; ?></span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">草稿
                            <a href="./article.php?draft=1"><span class="badge badge-primary badge-pill"><?php echo $sta_cache['draftnum']; ?></span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">询价数
                            <a href="./comment.php"><span class="badge badge-primary badge-pill"><?php echo $sta_cache['comnum_all']; ?></span></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">待处理询价数
                            <a href="./comment.php?hide=y"><span class="badge badge-warning badge-pill"><?php echo $sta_cache['hidecomnum']; ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <h6 class="card-header">软件信息</h6>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            PHP <span><?php echo $php_ver ?? ''; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            MySQL <span><?php echo $mysql_ver ?? ''; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Web Server <span><?php echo $serverapp ?? ''; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(hideActived, 2600);
        $("#menu_home").addClass('active');
    </script>
<?php endif; ?>
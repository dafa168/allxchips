<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<?php
//blog：导航
function blog_navi()
{
    global $CACHE;
    $navi_cache = $CACHE->readCache('navi');
    ?>

    <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
        <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto p-3 p-lg-0">
                <?php foreach ($navi_cache as $value): ?>
                    <?php if ($value['pid'] != 0) continue; ?>
                    <?php
                    $newtab = $value['newtab'] === 'y' ? 'target="_blank"' : '';
                    $value['url'] = $value['isdefault'] === 'y' ? BLOG_URL . $value['url'] : trim($value['url']);
                    $active = "";
                    if ("/" === $value['url']) {
                        $active = "active";
                    }
                    ?>
                    <a class="nav-link nav-item <?php echo $active; ?>" href="<?php echo $value['url']; ?>" <?php echo $newtab; ?>
                       title="<?php echo strtoupper($value['naviname']); ?>">
                        <?php echo strtoupper($value['naviname']); ?>
                    </a>
                <?php endforeach; ?>

<!--                <a href="contact.html" class="nav-item nav-link">Contact Us</a>-->
            </div>
            <a href="/?keyword=Your Product Part Number" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Go Search</a>
        </div>
    </nav>

<?php } ?>

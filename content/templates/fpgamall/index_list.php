<?php if (!defined('EMO_ROOT')) exit('error!'); //首页模板?>

<div class="home">
    <div class="banner">
        <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?php echo TEMPLATE_URL; ?>img/banner1.jpg"
                         alt="welcome to fbgaonline">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo TEMPLATE_URL; ?>img/banner2.jpg"
                         alt="explore fbgaonline">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?php echo TEMPLATE_URL; ?>img/banner3.jpg"
                         alt="RFQ to fbgaonline">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel1">
            <h2 style="padding-top: 2rem;">Your Faithful Electronic Components Supply Chain Partner</h2>
            <p>
                Leading online electronic components store - AS9120B , ISO9001 :2008 , ISO14001.<br>
                Specializes in offering a wide range of obsolete and common-used electronic parts , <br>
                also offers cost-effective alternative solutions.Providing online linecard, <br>
                inventory and purchasing, with 500,000 SKUs Inventroy, 24 Hours Shipment, 365 Days Guaranty.
            </p>
        </div>
        <div class="panel panel2">
            <div class="title">
                <h3>HOT OFFER</h3>
                <div class="more" style="color: #FFFFFF;">FIND THE FBGA YOU NEED</div>
            </div>
            <div class="box">
                <div class="swiper-container" id="new-arrival-swiper">
                    <div class="swiper-wrapper">

                        <?php if (isset($top_logs)) : ?>
                            <?php foreach ($top_logs as $v) : ?>
                                <div class="swiper-slide">
                                    <?php foreach ($v as $vs) : ?>
                                        <a class="block" href="<?php echo $vs['log_url'] ?? ''; ?>"
                                           title="<?php echo $vs['log_title'] ?? ''; ?>">
                                            <img src="<?php echo $vs['log_cover'] ?? ''; ?>"
                                                 alt="<?php echo $vs['log_title'] ?? ''; ?>">
                                            <p class="name text-overflow"><?php echo $vs['log_title'] ?? ''; ?></p>
                                            <p class="price text-overflow">Lowest to <span
                                                        style="font-weight:bold;font-size: 1rem;color: #D10024;">$<?php echo $vs['log_price'] ?? ''; ?></span>
                                            </p>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

        <?php if (isset($sort_a)) : ?>
            <div class="panel panel3">
                <div class="title">
                    <h3 title="<?php echo $sort_a['sortname'] ?? ''; ?>"><?php echo strtoupper($sort_a['sortname'] ?? ''); ?></h3>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo TEMPLATE_URL; ?>img/<?php echo $sort_a['sortname'] ?? ''; ?>.jpg"
                                 class="logo" alt="<?php echo $sort_a['sortname'] ?? ''; ?>">
                            <p class="info">
                                <?php echo $sort_a['seoinfo'] ?? ''; ?>
                            </p>
                            <a href="<?php echo $sort_a['url'] ?? ''; ?>"
                               title="<?php echo $sort_a['seoname'] ?? ''; ?>"
                               class="learn-more">Learn More</a>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <?php if ($sort_a['logs']) : ?>
                                    <?php foreach ($sort_a['logs'] as $v) : ?>
                                        <div class="col-md-3 col-12">
                                            <a href="<?php echo $v['log_url'] ?? ''; ?>"
                                               style="color: inherit;" title="<?php echo $v['log_title'] ?? ''; ?>">
                                                <div class="bl">
                                                    <div class="up clearfix">
                                                        <div class="left">
                                                            <img style="width: 100px;"
                                                                 src="<?php echo TEMPLATE_URL; ?>img/<?php echo $sort_a['sortname'] ?? ''; ?>.jpg"
                                                                 alt="xilinx logo">
                                                            <p class="name text-overflow"><?php echo $v['log_title'] ?? ''; ?></p>
                                                            <p class="desc text-overflow"><?php echo $v['log_desc'] ?? ''; ?></p>
                                                        </div>
                                                        <div class="right">
                                                            <img style="width: 100px;"
                                                                 src="<?php echo $v['log_cover'] ?? ''; ?>"
                                                                 alt="<?php echo $v['log_title'] ?? ''; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="bottom">
                                              <span class="detail">
                                                Details
                                                <span class="float-right">></span>
                                              </span>
                                                        <span class="price">
                                                <span class="usd" style="color: #FF0060;">USD</span>
                                                <span class="pce"><?php echo $v['log_price'] ?? ''; ?></span>
                                              </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    Sorry, there is no content yet.
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($sort_b)) : ?>
            <div class="panel panel4">
                <div class="title">
                    <h3 title="<?php echo $sort_b['sortname'] ?? ''; ?>"><?php echo strtoupper($sort_b['sortname'] ?? ''); ?></h3>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo TEMPLATE_URL; ?>img/<?php echo $sort_b['sortname'] ?? ''; ?>.jpg"
                                 class="logo" alt="<?php echo $sort_b['sortname'] ?? ''; ?>">
                            <p class="info">
                                <?php echo $sort_b['seoinfo'] ?? ''; ?>
                            </p>
                            <a href="<?php echo $sort_b['url'] ?? ''; ?>"
                               title="<?php echo $sort_b['seoname'] ?? ''; ?>"
                               class="learn-more">Learn More</a>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <?php if (isset($sort_b['logs'])) : ?>
                                    <?php foreach ($sort_b['logs'] as $v) : ?>
                                        <div class="col-md-3 col-12">
                                            <a href="<?php echo $v['log_url'] ?? ''; ?>"
                                               style="color: inherit;" title="<?php echo $v['log_title'] ?? ''; ?>">
                                                <div class="bl">
                                                    <div class="up clearfix">
                                                        <div class="left">
                                                            <img style="width: 100px;"
                                                                 src="<?php echo TEMPLATE_URL; ?>img/<?php echo $sort_b['sortname'] ?? ''; ?>.jpg"
                                                                 alt="xilinx logo">
                                                            <p class="name text-overflow"><?php echo $v['log_title'] ?? ''; ?></p>
                                                            <p class="desc text-overflow"><?php echo $v['log_desc'] ?? ''; ?></p>
                                                        </div>
                                                        <div class="right">
                                                            <img style="width: 100px;"
                                                                 src="<?php echo $v['log_cover'] ?? ''; ?>"
                                                                 alt="<?php echo $v['log_title'] ?? ''; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="bottom">
                                              <span class="detail">
                                                Details
                                                <span class="float-right">></span>
                                              </span>
                                                        <span class="price">
                                                <span class="usd" style="color: #FF0060;">USD</span>
                                                <span class="pce"><?php echo $v['log_price'] ?? ''; ?></span>
                                              </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>

                                <?php else : ?>
                                    Sorry, there is no content yet.
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if (isset($sort_c)) : ?>
            <div class="panel panel4">
                <div class="title">
                    <h3 title="<?php echo $sort_c['sortname'] ?? ''; ?>"><?php echo strtoupper($sort_c['sortname'] ?? ''); ?></h3>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo TEMPLATE_URL; ?>img/<?php echo $sort_c['sortname'] ?? ''; ?>.jpg"
                                 class="logo" alt="<?php echo $sort_c['sortname'] ?? ''; ?>">
                            <p class="info">
                                <?php echo $sort_c['seoinfo'] ?? ''; ?>
                            </p>
                            <a href="<?php echo $sort_c['url'] ?? ''; ?>"
                               title="<?php echo $sort_c['seoname'] ?? ''; ?>"
                               class="learn-more">Learn More</a>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <?php if (isset($sort_c['logs'])) : ?>
                                    <?php foreach ($sort_c['logs'] as $v) : ?>
                                        <div class="col-md-3 col-12">
                                            <a href="<?php echo $v['log_url'] ?? ''; ?>"
                                               style="color: inherit;" title="<?php echo $v['log_title'] ?? ''; ?>">
                                                <div class="bl">
                                                    <div class="up clearfix">
                                                        <div class="left">
                                                            <img style="width: 100px;"
                                                                 src="<?php echo TEMPLATE_URL; ?>img/<?php echo $sort_c['sortname'] ?? ''; ?>.jpg"
                                                                 alt="xilinx logo">
                                                            <p class="name text-overflow"><?php echo $v['log_title'] ?? ''; ?></p>
                                                            <p class="desc text-overflow"><?php echo $v['log_desc'] ?? ''; ?></p>
                                                        </div>
                                                        <div class="right">
                                                            <img style="width: 100px;"
                                                                 src="<?php echo $v['log_cover'] ?? ''; ?>"
                                                                 alt="<?php echo $v['log_title'] ?? ''; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="bottom">
                                              <span class="detail">
                                                Details
                                                <span class="float-right">></span>
                                              </span>
                                                        <span class="price">
                                                <span class="usd" style="color: #FF0060;">USD</span>
                                                <span class="pce"><?php echo $v['log_price'] ?? ''; ?></span>
                                              </span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>

                                <?php else : ?>
                                    Sorry, there is no content yet.
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="panel panel5 clearfix">
            <div class="left">
                <img src="<?php echo TEMPLATE_URL; ?>img/information.png"
                     alt="information">
            </div>
            <div class="center">
                <ul>
                    <?php if (isset($logs)) : ?>
                        <?php foreach ($logs as $v) : ?>
                            <li>
                                <a href="<?php echo $v['log_url'] ?? ''; ?>"
                                   title="<?php echo $v['log_title'] ?? ''; ?>"
                                   class="text-overflow">
                                    <i class="fa fa-file-text-o mr-2"></i>
                                    <?php echo $v['log_title'] ?? ''; ?> </a>
                            </li>
                        <?php endforeach;; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="right">
                <a href="<?php echo Url::sort(3) ?>">
                    <img src="<?php echo TEMPLATE_URL; ?>img/more-right.png" alt="information">
                </a>
            </div>
        </div>
        <div class="panel panel6">
            <img src="<?php echo TEMPLATE_URL; ?>img/ad_img.jpg" alt="bottom-banner">
        </div>
    </div>
</div>

<?php include View::getView('footer'); ?>

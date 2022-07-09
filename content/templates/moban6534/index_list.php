<?php if (!defined('EMO_ROOT')) exit('error!'); ?>


<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                <img class="img-fluid" src="<?php echo TEMPLATE_URL; ?>static/picture/carousel-1.jpg" alt="Image">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="1" aria-label="Slide 2">
                <img class="img-fluid" src="<?php echo TEMPLATE_URL; ?>static/picture/carousel-2.jpg" alt="Image">
            </button>
            <button type="button" data-bs-target="#header-carousel" data-bs-slide-to="2" aria-label="Slide 3">
                <img class="img-fluid" src="<?php echo TEMPLATE_URL; ?>static/picture/carousel-3.jpg" alt="Image">
            </button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?php echo TEMPLATE_URL; ?>static/picture/carousel-1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn"> XILINX </h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn">Flexibility. All things are intelligent</h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?php echo TEMPLATE_URL; ?>static/picture/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn"> ALTERA </h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn"> Intel® FPGAs and Programmable Devices-Intel® FPGA </h1>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="<?php echo TEMPLATE_URL; ?>static/picture/carousel-3.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-4 animated zoomIn"> LATTICE </h4>
                        <h1 class="display-1 text-white mb-0 animated zoomIn"> Lattice Semiconductor | The Low Power FPGA Leader </h1>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">XILINX Products</h6>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">

            <?php if (isset($sort_a)) : ?>
                <?php foreach ($sort_a as $k => $v) : ?>

                    <div class="project-item border rounded h-100 p-4" data-dot="<?php echo ++$k; ?>">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded" src="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" alt="">
                            <a href="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" data-lightbox="project"><i
                                        class="fa fa-eye fa-2x"></i></a>
                        </div>
                        <h6> <?php echo $v['log_title'] ?? ''; ?> </h6>
                        <h5> $<?php echo $v['log_price'] ?? ''; ?> </h5>
                        <span> Flexibility. All things are intelligent </span>
                        <span> <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>"> </a> </span>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">ALTERA Products</h6>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">

            <?php if (isset($sort_b)) : ?>
                <?php foreach ($sort_b as $k => $v) : ?>

                    <div class="project-item border rounded h-100 p-4" data-dot="<?php echo ++$k; ?>">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded" src="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" alt="">
                            <a href="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" data-lightbox="project"><i
                                        class="fa fa-eye fa-2x"></i></a>
                        </div>
                        <h6> <?php echo $v['log_title'] ?? ''; ?> </h6>
                        <h5> $<?php echo $v['log_price'] ?? ''; ?> </h5>
                        <span> Flexibility. All things are intelligent </span>
                        <span> <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>"> </a> </span>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">LATTICE Products</h6>
        </div>
        <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">

            <?php if (isset($sort_c)) : ?>
                <?php foreach ($sort_c as $k => $v) : ?>

                    <div class="project-item border rounded h-100 p-4" data-dot="<?php echo ++$k; ?>">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded" src="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" alt="">
                            <a href="<?php echo $v['log_cover'] ?? TEMPLATE_URL . 'static/img/prod.png'; ?>" data-lightbox="project"><i
                                        class="fa fa-eye fa-2x"></i></a>
                        </div>
                        <h6> <?php echo $v['log_title'] ?? ''; ?> </h6>
                        <h5> $<?php echo $v['log_price'] ?? ''; ?> </h5>
                        <span> Flexibility. All things are intelligent </span>
                        <span> <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>"> </a> </span>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="section-title bg-white text-center text-primary px-3">Blog</h6>
            <h1 class="display-6 mb-4">Latest News</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">

            <?php if (isset($logs)) : ?>
                <?php foreach ($logs as $k => $v) :
                    ++$k;
                    ?>
                    <div class="testimonial-item bg-light rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img class="flex-shrink-0 rounded-circle border p-1"
                                 src="<?php echo TEMPLATE_URL; ?>static/picture/testimonial-<?php echo $k; ?>.jpg" alt="">
                            <div class="ms-4">
                                <h5 class="mb-1"><?php echo $v['log_title'] ?? ''; ?></h5>
                            </div>
                        </div>
                        <p class="mb-0"> <?php echo $v['log_excerpt'] ?? ''; ?> </p>
                        <p class="mb-0">
                            <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>">Read More >> </a>
                        </p>
                    </div>
                <?php endforeach;; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


<?php include View::getView('footer'); ?>

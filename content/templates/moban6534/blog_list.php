<?php if (!defined('EMO_ROOT')) exit('error!'); ?>


<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">Blog List</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Blog List</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">

            <?php if (!empty($logs)): ?>
                <?php foreach ($logs as $k => $v): ?>

                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="h-100">
                            <h6 class="section-title bg-white text-start text-primary pe-3">#<?php echo ++$k; ?></h6>
                            <h1 class="display-6 mb-4"> <?php echo $v['log_title']; ?> </h1>
                            <p>
                                <?php echo $v['log_description']; ?>
                            </p>
                            <a class="btn btn-primary rounded-pill" href="<?php echo $v['log_url']; ?>" title="<?php echo $v['log_title']; ?>">View More</a>
                        </div>
                    </div>

                <?php endforeach; ?>
            <?php else: ?>
                <p>Sorry, there is no content yet.</p>
            <?php endif; ?>

            <ul class="pagination">
                <?php echo $page_url ?? ''; ?>
            </ul>

        </div>
    </div>
</div>


<?php include View::getView('footer'); ?>


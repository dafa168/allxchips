<?php if (!defined('EMO_ROOT')) exit('error!'); ?>


<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-4 text-white animated slideInDown mb-3">Product List</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                <li class="breadcrumb-item text-primary active" aria-current="page">Product List</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">

                <div class="col-lg-12 col-md-6">
                    <div class="position-relative mx-auto">
                        <input class="form-control bg-transparent border-secondary w-100 py-3 ps-4 pe-5" name="keyword" value="<?php echo $keyword??'';?>" type="text" placeholder="Your Product Part Number">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2" onclick="search(this)">Search</button>
                    </div>
                    <br>
                </div>


                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Part Number</th>
                        <th>Manufacturer/Brand</th>
                        <th>Quantity</th>
                        <th>Packaging</th>
                        <th>Description</th>
                        <th>RFQ</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if (!empty($logs)): ?>
                        <?php foreach ($logs as $v): ?>

                            <tr>
                                <th scope="row">
                                    <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>">
                                        <img class="card-img" style="width: 70px;" src="<?php echo $v['log_cover']; ?>" alt="<?php echo $v['log_title']; ?>">
                                    </a>
                                </th>
                                <td>
                                    <a href="<?php echo $v['log_url'] ?? ''; ?>" title="<?php echo $v['log_title'] ?? ''; ?>"><?php echo $v['log_title'] ?? ''; ?></a>
                                </td>
                                <td><?php echo $v['log_brand'] ?? ''; ?></td>
                                <td> <?php echo $v['log_random'] ?? ''; ?> </td>
                                <td> <?php echo $v['log_package'] ?? ''; ?> </td>
                                <td><?php echo $v['log_description'] ?? '' ?></td>
                                <td><a href="skype:<?php echo $skype ?? ''; ?>" rel="nofollow"> <img src="<?php echo TEMPLATE_URL; ?>static/img/icon_s_skype.png" alt="">
                                    </a></td>
                            </tr>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="12">
                                Sorry, there is no content yet。
                            </td>
                        </tr>
                    <?php endif; ?>


                    </tbody>
                </table>

            </div>

            <ul class="pagination">
                <?php echo $page_url ?? ''; ?>
            </ul>

        </div>
    </div>
</div>

<?php include View::getView('footer'); ?>


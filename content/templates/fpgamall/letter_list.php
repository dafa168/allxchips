<?php if (!defined('EMO_ROOT')) exit('error!'); //首页模板?>

<div class="home">
    <div class="container">

        <div style="margin-top: 20px;"></div>

        <div class="panel panel6">

            <div class="row">
                <div class="col-md-12">
                    <!--<nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">A</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">B</a>
                            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">C</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">AAA</div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">BBB</div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">CCC</div>
                    </div>-->

                    <?php widget_letter(); ?>
                </div>
            </div>

        </div>


    </div>
</div>

<?php include View::getView('footer'); ?>

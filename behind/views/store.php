<?php if (!defined('EMO_ROOT')) {
    exit('error!');
} ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">模板主题</h1>
</div>
<div class="card-columns">
    <div class="card" style="min-height: 340px;">
        <div class="card-body">
            <p class="card-text"><span class="badge badge-warning">模板</span>  </p>
            <p class="card-text text-muted small">

            </p>
            <p class="card-text text-right">
                <a href="#" class="btn btn-sm btn-warning btn-sm" target="_blank">去购买</a>
            </p>
        </div>
    </div>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">扩展插件</h1>
</div>
<div class="card-columns">
    <div class="card">
        <a href="#" target="_blank"><img class="card-img-top" src=" " alt=""/></a>
        <div class="card-body">
            <p class="card-text"><span class="badge badge-primary">插件</span> test</p>
            <p class="card-text text-muted small">
            </p>
            <p class="card-text text-right">

            </p>
        </div>
    </div>
</div>

<script>
    $("#menu_store").addClass('active');
    setTimeout(hideActived, 3600);
</script>

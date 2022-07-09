<?php if (!defined('EMO_ROOT')) {
    exit('error!');
} ?>
<?php if (isset($_GET['activated'])): ?>
    <div class="alert alert-success">设置保存成功</div><?php endif; ?>
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger">保存失败，请联系admin</div><?php endif; ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">设置</h1>
</div>
<div class="panel-heading">
    <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="./configure.php">基本设置</a></li>
        <li class="nav-item"><a class="nav-link " href="./seo.php">SEO设置</a></li>
        <li class="nav-item"><a class="nav-link active" href="./smtp.php">邮件设置</a></li>
        <li class="nav-item"><a class="nav-link" href="./blogger.php">个人设置</a></li>
    </ul>
</div>
<div class="card shadow mb-4 mt-2">
    <div class="card-body">
        <form action="smtp.php?action=update" method="post">

            <h4 class="mt-4">邮件发送设置</h4>
            <div class="form-group">
                <label>SMTP发送地址</label>
                <input class="form-control" value="<?php echo $smtp_host ?? ''; ?>" name="smtp_host">
            </div>
            <div class="form-group">
                <label><label>SMTP端口</label></label>
                <input class="form-control" value="<?php echo $smtp_port ?? 0; ?>" name="smtp_port">
            </div>
            <div class="form-group">
                <label><label>SMTP用户名</label></label>
                <input class="form-control" value="<?php echo $smtp_name ?? 0; ?>" name="smtp_name">
            </div>
            <div class="form-group">
                <label><label>SMTP密码</label></label>
                <input class="form-control" value="<?php echo $smtp_pass ?? 0; ?>" name="smtp_pass">
            </div>

            <div class="form-group">
                <label>SMTP调试开关：</label>
                <select name="smtp_debug" class="form-control">
                    <option value="n" <?php echo $debug ?? ''; ?>>关闭</option>
                    <option value="y" <?php echo $debug ?? ''; ?>>开启</option>
                </select>
            </div>

            <input name="token" id="token" value="<?php echo LoginAuth::genToken(); ?>" type="hidden"/>
            <input type="submit" value="保存设置" class="btn btn-sm btn-success"/>
        </form>
    </div>
</div>
<script>
    setTimeout(hideActived, 2600);
    $("#menu_category_sys").addClass('active');
    $("#menu_sys").addClass('show');
    $("#menu_setting").addClass('active');
</script>
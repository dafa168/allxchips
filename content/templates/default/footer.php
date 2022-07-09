<?php
/**
 * 页面底部信息
 */
if (!defined('EMO_ROOT')) {
	exit('error!');
}
?>
<footer class="py-3">
    <div class="container">
        <p class="text-center small">powered by <a href="https://www.emlog.net">emlog pro</a>
            <a href="https://beian.miit.gov.cn/" target="_blank"><?php echo $icp; ?></a> <br>
			<?php echo $footer_info; ?>
			<?php doAction('index_footer'); ?>
        </p>
    </div>
</footer>
<script>
    $('#captcha').click(function () {
        var timestamp = new Date().getTime();
        $(this).attr("src", "./include/lib/checkcode.php?" + timestamp);
    });
</script>
</body>
</html>

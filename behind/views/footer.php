<?php if (!defined('EMO_ROOT')) {
    exit('error!');
} ?>
</div>
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Powered by <a href="#">frans</a> </span>
        </div>
    </div>
</footer>
</div>
</div>
<?php doAction('adm_footer'); ?>
<script src="./views/js/sb-admin-2.min.js?t=<?php echo Option::EMLOG_VERSION_TIMESTAMP; ?>"></script>

<script type="text/javascript">
    $(function () {
        $('#UpdateCache').on('click', function () {
            $.get("index.php?action=Cache", function () {
                return;
            });
        });
    });
</script>
</body>
</html>

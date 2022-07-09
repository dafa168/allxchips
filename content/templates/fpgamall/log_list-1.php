<?php
/**
 * 首页模板
 */
if (!defined('EMO_ROOT')) {
	exit('error!');
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
			<?php
			doAction('index_loglist_top');
			if (!empty($logs)):
				foreach ($logs as $value):
					?>
                    <div class="shadow-theme mb-4">
                        <div class="card-body loglist_body">
                            <h3 class="card-title">
                                <a href="<?php echo $value['log_url']; ?>" class="loglist_title"><?php echo $value['log_title']; ?></a>
								<?php topflg($value['top'], $value['sortop'], isset($sortid) ? $sortid : ''); ?>
                            </h3>
							<?php if (!empty($value['log_cover'])) : ?>
                                <div class="loglist_cover">
                                    <a href="<?php echo $value['log_url']; ?>">
                                        <img src="<?php echo $value['log_cover']; ?>" class="cover img-fluid">
                                    </a>
                                </div>
							<?php endif; ?>
                            <div class="loglist_content markdown"><?php echo $value['log_description']; ?></div>
                            <div class="tag loglist_tag"><?php blog_tag($value['logid']); ?></div>
                        </div>
                        <hr class="list_line"/>
                        <div class="row p-3 info_row">
                            <div class="col-md-8 text-muted loglist_info">
								<?php blog_author($value['author']); ?> 发布于 <?php echo gmdate('Y-n-j h:m', $value['date']); ?>
                            </div>
                            <div class="col-md-4 text-right text-muted loglist_count">
                                <a href="<?php echo $value['log_url']; ?>#comments">评论(<?php echo $value['comnum']; ?>)&nbsp;</a>
                                <a href="<?php echo $value['log_url']; ?>">浏览(<?php echo $value['views']; ?>)</a>
                            </div>
                        </div>
                    </div>
				<?php
				endforeach;
			else:
				?>
                <p>抱歉，暂时还没有内容。</p>
			<?php endif; ?>
            <ul class="pagination justify-content-center mb-4">
				<?php echo $page_url; ?>
            </ul>
        </div>
		<?php include View::getView('side'); ?>
    </div>
</div>
<?php include View::getView('footer'); ?>

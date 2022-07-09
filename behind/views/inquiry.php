<?php if (!defined('EMO_ROOT')) exit('error!'); ?>

<?php if (isset($_GET['active_del'])): ?>
    <div class="alert alert-success">删除询价成功</div><?php endif; ?>

<?php if (isset($_GET['active_export'])): ?>
    <div class="alert alert-success">导出完成</div><?php endif; ?>

<?php if (isset($_GET['active_rep'])): ?>
    <div class="alert alert-success">分配询价成功</div><?php endif; ?>
<?php if (isset($_GET['error_a'])): ?>
    <div class="alert alert-danger">请选择要执行操作的询价</div><?php endif; ?>
<?php if (isset($_GET['error_b'])): ?>
    <div class="alert alert-danger">请选择要执行的操作</div><?php endif; ?>
<?php if (isset($_GET['error_c'])): ?>
    <div class="alert alert-danger">备注内容不能为空</div><?php endif; ?>
<?php if (isset($_GET['error_d'])): ?>
    <div class="alert alert-danger">备注内容过长</div><?php endif; ?>

<?php if (isset($_GET['error_e'])): ?>
    <div class="alert alert-danger">分配用户不能为空</div>
<?php endif; ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">询价管理</h1>
</div>

<form action="inquiry.php?action=op" method="post" name="form_com" id="form_com">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="checkAll"/></th>
                        <th>ID</th>
                        <th>联系人</th>
                        <th>公司名称</th>
                        <th>邮箱</th>
                        <th>电话</th>
                        <th>备注</th>
                        <th>询价信息</th>
                        <th>来源</th>
                        <th>创建时间</th>

                        <th>是否分配</th>
                        <th>分配时间</th>
                        <th>对接人</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($list)) : ?>
                        <?php foreach ($list as $v): ?>
                            <tr>
                                <td width="19"><input type="checkbox" value="<?php echo $v['id']; ?>" name="ids[]" class="ids"
                                        <?php if ($v['state'] == Inquiry_Model::STATE_HANDLED) : ?>  disabled <?php endif; ?>/></td>

                                <td><?php echo $v['id'] ?? ''; ?></td>
                                <td><?php echo $v['name'] ?? ''; ?></td>
                                <td><?php echo $v['cname'] ?? ''; ?></td>
                                <td><?php echo $v['email'] ?? ''; ?></td>
                                <td><?php echo $v['phone'] ?? ''; ?></td>

                                <td>
                                    <?php if ($v['state'] == Inquiry_Model::STATE_UNHANDLE) : ?>
                                        <a href="#" data-toggle="modal" data-target="#replyModal" data-id="<?php echo $v['id']; ?>"
                                           data-comment="<?php echo $v['id'] . ' - ' . $v['msg']; ?>">
                                            <?php echo $v['msg'] ?? ''; ?>
                                        </a>
                                    <?php else: ?>
                                        <?php echo $v['msg'] ?? ''; ?>
                                    <?php endif; ?>
                                </td>

                                <td><?php echo $v['quote'] ?? ''; ?> <?php if ($v['file_url'] !== 'null') : ?> <a href="<?php echo $v['quote'] ?? ''; ?>" target="_blank"
                                                                                                                  class="small">[下载]</a> <?php endif; ?> </td>
                                <td><?php echo $v['way_at'] ?? ''; ?></td>
                                <td><?php echo $v['date_at'] ?? ''; ?></td>

                                <td><?php echo $v['state_at'] ?? ''; ?></td>
                                <td><?php echo $v['update_at'] ?? ''; ?></td>
                                <td><?php echo $v['op_user'] ?? ''; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="list_footer">
                <div class="btn-group btn-group-sm" role="group">
                    <a type="button" href="javascript:commentact('del');" class="btn btn-sm btn-danger">删除</a>
                    <!--                    <a type="button" href="javascript:commentact('export');" class="btn btn-sm btn-success">导出</a>-->
                </div>
                <input name="operate" id="operate" value="" type="hidden"/>
            </div>
            <div class="page"><?php echo $pageurl ?? 0; ?> （有 <?php echo $total ?? 0; ?> 条询价）</div>
        </div>
    </div>
</form>

<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">分配询价</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="inquiry.php?action=assign" method="post">
                <div class="modal-body">

                    <p></p>

                    <div class="form-group">
                        <input type="hidden" value="" name="id" id="id"/>
                        <select class="form-control" name="user">
                            <?php if (isset($users)) : ?>
                                <?php foreach ($users as $name): ?>
                                    <option value="<?php echo $name ?>"><?php echo $name ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" name="remark" required placeholder="备注"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-sm btn-success">分配</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#menu_inquiry").addClass('active');
    setTimeout(hideActived, 2600);

    function commentact(act) {
        if (getChecked('ids') === false) {
            alert('请选择要操作的询价');
            return;
        }
        if (act === 'del' && !confirm('你确定要删除所选询价吗？')) {
            return;
        }
        $("#operate").val(act);
        $("#form_com").submit();
    }

    $('#replyModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var comment = button.data('comment')
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body p').html(removeHTMLTag(comment))
        modal.find('.modal-body #id').val(id)
    })
</script>

<?php
/**
 * comments
 *
 *
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

$model = new Inquiry_Model();

if (!$action) {
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    $addUrl = '';

    $list = $model->getInquiryForAdmin($page);
    $total = $model->getInquiryNum();
    $pageurl = pagination($total, Option::get('admin_perpage_num'), $page, "inquiry.php?{$addUrl}page=");

    $users = (new User_Model())->getUsernameList(20);

    include View::getView('header');
    require_once(View::getView('inquiry'));
    include View::getView('footer');
    View::output();
}

//删除
if ($action === 'op') {
//    LoginAuth::checkToken();
    if (ROLE !== ROLE_ADMIN) {
        emMsg('权限不足！', './');
    }

    $act = $_POST['operate'] ?? '';
    if ($act === 'del') {

        $ids = isset($_POST['ids']) ? (array)$_POST['ids'] : '';
        if ($ids === '') {
            emDirect("./inquiry.php?error_a=1");
        }

        $model->delInquiry($ids);
        emDirect("./inquiry.php?active_del=1");
    }

    if ($act === 'export') {
        emDirect("./inquiry.php?active_export=1");
    }

}

//分配询价
if ($action === 'assign') {
    //LoginAuth::checkToken();
    if (ROLE !== ROLE_ADMIN) {
        emMsg('权限不足！', './');
    }

    $id = isset($_POST['id']) ? (int)$_POST['id'] : '';
    $user = $_POST['user'] ?? '';
    $remark = $_POST['remark'] ?? '';

    if ($remark === '') {
        emDirect("./inquiry.php?error_c=1");
    }
    if (mb_strlen($remark) > 250) {
        emDirect("./inquiry.php?error_d=1");
    }

    if ($user === '') {
        emDirect("./inquiry.php?error_e=1");
    }

    $model->updateInquiry($id, ['op_user' => htmlClean($user), 'remark' => htmlClean($remark)]);
    emDirect("./inquiry.php?active_rep=1");
}


//if ($action === 'delbyip') {
//	LoginAuth::checkToken();
//	if (ROLE !== ROLE_ADMIN) {
//		emMsg('权限不足！', './');
//	}
//	$ip = $_GET['ip'] ? addslashes($_GET['ip']) : '';
//	$model->delCommentByIp($ip);
//	$CACHE->updateCache(array('sta', 'comment'));
//	emDirect("./comment.php?active_del=1");
//}

//if ($action === 'hide') {
//	$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
//	$model->hideComment($id);
//	$CACHE->updateCache(array('sta', 'comment'));
//	emDirect("./inquiry.php?active_hide=1");
//}
//if ($action === 'show') {
//	$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
//	$model->showComment($id);
//	$CACHE->updateCache(array('sta', 'comment'));
//	emDirect("./inquiry.php?active_show=1");
//}

//if ($action === 'admin_all_coms') {
//	$operate = $_POST['operate'] ?? '';
//	$comments = isset($_POST['com']) ? array_map('intval', $_POST['com']) : array();
//
//	if ($comments === '') {
//		emDirect("./inquiry.php?error_a=1");
//	}
//
//	if ($operate === '') {
//		emDirect("./inquiry.php?error_b=1");
//	}
//	if ($operate === 'del') {
//		$model->batchComment('delcom', $comments);
//		$CACHE->updateCache(array('sta', 'comment'));
//		emDirect("./inquiry.php?active_del=1");
//	}
//	if ($operate === 'hide') {
//		$model->batchComment('hidecom', $comments);
//		$CACHE->updateCache(array('sta', 'comment'));
//		emDirect("./inquiry.php?active_hide=1");
//	}
//	if ($operate === 'pub') {
//		$model->batchComment('showcom', $comments);
//		$CACHE->updateCache(array('sta', 'comment'));
//		emDirect("./inquiry.php?active_show=1");
//	}
//}

//if ($action === 'doreply') {
//    $reply = isset($_POST['reply']) ? trim(addslashes($_POST['reply'])) : '';
//    $commentId = isset($_POST['cid']) ? (int)$_POST['cid'] : '';
//    $blogId = isset($_POST['gid']) ? (int)$_POST['gid'] : '';
//    $hide = isset($_POST['hide']) ? addslashes($_POST['hide']) : 'n';

//    if ($reply === '') {
//        emDirect("./inquiry.php?error_c=1");
//    }
//    if (strlen($reply) > 2000) {
//        emDirect("./inquiry.php?error_d=1");
//    }
//    //回复一条待审核的评论，视为要将其公开（包括回复内容）
//    if ($hide == 'y') {
//        $model->showComment($commentId);
//        $hide = 'n';
//    }
//    $model->replyComment($blogId, $commentId, $reply, $hide);
//    $CACHE->updateCache('comment');
//    $CACHE->updateCache('sta');
//    doAction('comment_reply', $commentId, $reply);


//    emDirect("./inquiry.php?active_rep=1");
//}

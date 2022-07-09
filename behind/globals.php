<?php
/**
 * 后台全局项加载
 * 
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once '../init.php';

const TEMPLATE_PATH = EMO_ROOT . '/behind/views/';              //后台模板路径

$sta_cache = $CACHE->readCache('sta');
$user_cache = $CACHE->readCache('user');
$action = isset($_GET['action']) ? addslashes($_GET['action']) : '';
$admin_path_code = isset($_GET['s']) ? addslashes($_GET['s']) : '';


if ($action === 'login') {
	if (defined('ADMIN_PATH_CODE') && $admin_path_code !== ADMIN_PATH_CODE) {
		show_404_page(true);
	}
	$username = isset($_POST['user']) ? addslashes(trim($_POST['user'])) : '';
	$password = isset($_POST['pw']) ? addslashes(trim($_POST['pw'])) : '';
	$ispersis = isset($_POST['ispersis']) ? (int)$_POST['ispersis'] : 0;
	$img_code = Option::get('login_code') === 'y' && isset($_POST['imgcode']) ? addslashes(trim(strtoupper($_POST['imgcode']))) : '';

	$loginAuthRet = LoginAuth::checkUser($username, $password, $img_code);

	if ($loginAuthRet === true) {
		LoginAuth::setAuthCookie($username, $ispersis);
		emDirect("./");
	} else {
		LoginAuth::loginPage($loginAuthRet);
	}
}

if ($action === 'logout') {
	setcookie(AUTH_COOKIE_NAME, ' ', time() - 31536000, '/');
	emDirect("../");
}

if (ISLOGIN === false) {
	LoginAuth::loginPage(null, $admin_path_code);
}

$request_uri = strtolower(substr(basename($_SERVER['SCRIPT_NAME']), 0, -4));
if (ROLE === ROLE_WRITER && !in_array($request_uri, array('article_write', 'article', 'blogger', 'comment', 'index', 'article_save'))) {
	emMsg('权限不足！', './');
}

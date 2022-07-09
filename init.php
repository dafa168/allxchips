<?php
/**
 * 全局项加载
 *
 */
const APP_DEBUG = 0;

if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'ON');
} else {
    error_reporting(1);
}

ob_start();
header('Content-Type: text/html; charset=UTF-8');

const EMO_ROOT = __DIR__;

if (extension_loaded('mbstring')) {
    mb_internal_encoding('UTF-8');
}

require_once EMO_ROOT . '/config.php';
require_once EMO_ROOT . '/include/lib/function.base.php';

spl_autoload_register("emAutoload");

$CACHE = Cache::getInstance();

$userData = array();

define('ISLOGIN', LoginAuth::isLogin());

//站点时区
date_default_timezone_set(Option::get('timezone'));

//用户组:admin管理员, writer联合撰写人, visitor访客
const ROLE_ADMIN = 'admin';
const ROLE_WRITER = 'writer';
const ROLE_VISITOR = 'visitor';
//用户角色
define('ROLE', ISLOGIN === true ? $userData['role'] : ROLE_VISITOR);
//用户ID
define('UID', ISLOGIN === true ? $userData['uid'] : '');
//站点固定地址
define('BLOG_URL', Option::get('blogurl'));
//模板库地址
const TPLS_URL = BLOG_URL . 'content/templates/';
//模板库路径
const TPLS_PATH = EMO_ROOT . '/content/templates/';
//解决前台多域名ajax跨域
define('DYNAMIC_BLOGURL', Option::get("blogurl"));
//前台模板URL
define('TEMPLATE_URL', TPLS_URL . Option::get('nonce_templet') . '/');

$active_plugins = Option::get('active_plugins');
$emHooks = array();
if ($active_plugins && is_array($active_plugins)) {
    foreach ($active_plugins as $plugin) {
        if (true === checkPlugin($plugin)) {
            include_once(EMO_ROOT . '/content/plugins/' . $plugin);
        }
    }
}


// 本段代码放到 init.php 文件最后
function stripslashesDeep($value)
{
    return is_array($value) ? array_map('stripslashesDeep', $value) : stripslashes($value);
}

//if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
    $_GET = stripslashesDeep($_GET);
    $_POST = stripslashesDeep($_POST);
    $_COOKIE = stripslashesDeep($_COOKIE);
    $_REQUEST = stripslashesDeep($_REQUEST);

    reset($_GET);
    reset($_POST);
    reset($_COOKIE);
    reset($_REQUEST);
//}
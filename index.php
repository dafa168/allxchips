<?php
/**
 * 前端页面加载
 * 
 */
require_once 'init.php';

define('TEMPLATE_PATH', TPLS_PATH . Option::get('nonce_templet') . '/');//前台模板路径

$dispatcher = Dispatcher::getInstance();
$dispatcher->dispatch();
View::output();

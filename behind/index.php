<?php
/**
 * control pannel
 *
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

if (empty($action)) {
    $avatar = empty($user_cache[UID]['avatar']) ? './views/images/avatar.svg' : '../' . $user_cache[UID]['avatar'];
    $name = $user_cache[UID]['name'];

    $serverapp = $_SERVER['SERVER_SOFTWARE'];
    $mysql_ver = Database::getInstance()->getMysqlVersion();

    $max_execution_time = ini_get('max_execution_time') ?: '';
    $php_ver = PHP_VERSION . ', MET' . $max_execution_time;
    if (function_exists("curl_init")) {
        $php_ver .= ', Curl';
    }
    if (class_exists('ZipArchive', FALSE)) {
        $php_ver .= ', Zip';
    }

    include View::getView('header');
    require_once(View::getView('index'));
    include View::getView('footer');
    View::output();
}

if ($action === 'Cache') {
    $CACHE->updateCache();
    jsonExit(['code' => 1]);
}

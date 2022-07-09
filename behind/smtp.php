<?php
/**
 * 邮件SMTP设置
 *
 */

/**
 * @var string $action
 * @var object $CACHE
 */

require_once 'globals.php';

if (empty($action)) {
    $options_cache = $CACHE->readCache('options');
    extract($options_cache, EXTR_OVERWRITE);

    $debug = isset($smtp_debug) && $smtp_debug === 'y' ? 'selected' : '';

    include View::getView('header');
    require_once(View::getView('smtp'));
    include View::getView('footer');
    View::output();
}

if ($action === 'update') {
    LoginAuth::checkToken();

    $getData = array(
        'smtp_host' => isset($_POST['smtp_host']) ? addslashes($_POST['smtp_host']) : '',
        'smtp_port' => isset($_POST['smtp_port']) ? (int)addslashes($_POST['smtp_port']) : '',
        'smtp_name' => isset($_POST['smtp_name']) ? addslashes($_POST['smtp_name']) : '',
        'smtp_pass' => isset($_POST['smtp_pass']) ? addslashes($_POST['smtp_pass']) : '',
        'smtp_debug' => isset($_POST['smtp_debug']) ? addslashes($_POST['smtp_debug']) : 'n'
    );

    foreach ($getData as $key => $val) {
        Option::updateOption($key, $val);
    }
    $CACHE->updateCache('options');
    header('Location: ./smtp.php?activated=1');
}

<?php
/*
Template Name:默认模板
Template Url:https://www.xxxx.net/template/
Description:这是mmlog pro的默认模板
Author:mmlog
Author Url:http://www.xxx.net
*/
if (!defined('EMO_ROOT')) exit('error!');
require_once View::getView('module');
?>

<!doctype html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $site_title; ?></title>
    <meta name="keywords" content="<?php echo $site_key; ?>"/>
    <meta name="description" content="<?php echo $site_description; ?>"/>
    <meta name="generator" content="emlog"/>
    <link rel="alternate" title="RSS" href="<?php echo BLOG_URL; ?>rss.php" type="application/rss+xml"/>
    <link href="<?php echo TEMPLATE_URL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo TEMPLATE_URL; ?>css/main.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo TEMPLATE_URL; ?>css/markdown.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo TEMPLATE_URL; ?>js/common_tpl.js" type="text/javascript"></script>
    <script src="<?php echo TEMPLATE_URL; ?>js/jquery.min.3.5.1.js?v=<?php echo Option::EMLOG_VERSION_TIMESTAMP; ?>"></script>
    <script src="<?php echo TEMPLATE_URL; ?>js/bootstrap.min.js" type="text/javascript"></script>
    <?php doAction('index_head'); ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light mb-5">
    <div class="container">
        <a class="navbar-brand main_blogname" title="<?php echo $bloginfo; ?>" href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation" style="outline: none;">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php blog_navi(); ?>
        <?php doAction('index_navi_ext'); ?>
    </div>
</nav>

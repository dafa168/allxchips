<?php
/*
Template Name:fbgaonline模板
Template Url:https://www.fbgaonline.com/
Description:fbgaonline默认模板
Author:fbgaonline
Author Url:http://www.fbgaonline.com
*/
if (!defined('EMO_ROOT')) exit('error!');
require_once View::getView('module');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8"utf-8">
    <title><?php echo $site_title ?? ''; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $site_key ?? ''; ?>"/>
    <meta name="description" content="<?php echo $site_description ?? ''; ?>"/>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="alternate" title="RSS" href="<?php echo BLOG_URL; ?>rss.php" type="application/rss+xml"/>
    <link rel="canonical" href="<?php echo BLOG_URL; ?>"/>
    <link href="<?php echo TEMPLATE_URL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/swiper.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL; ?>css/style.css"/>
    <?php doAction('index_head'); ?>
</head>
<body>

<div class="header">
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <ul class="text-left">
                        <li>
                            <img src="<?php echo TEMPLATE_URL; ?>img/icon_s_skype.png" alt="img-collection">
                            <span style="color: #fff"><a href="skype:<?php echo $skype ?? ''; ?>" rel="nofollow"><?php echo $skype ?? ''; ?></a></span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10">
                    <ul class="text-right">
                        <li>
                            <img src="<?php echo TEMPLATE_URL; ?>img/icon_tel.png" alt="img-tel">
                            <span style="color: #fff"> <?php echo $phone ?? ''; ?></span>
                        </li>
                        <li>
                            <img src="<?php echo TEMPLATE_URL; ?>img/icon_email.png" alt="img-email">
                            <span style="color: #fff"><?php echo $email ?? ''; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="search">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="left">
                        <a href="<?php echo BLOG_URL; ?>" title="FBGA Solutions,FBGA Technologies">
                            <img src="<?php echo TEMPLATE_URL; ?>img/logo.png"
                                 alt="FBGA Solutions,FBGA Technologies">
                        </a>
                    </h1>
                </div>
                <div class="col-md-4">
                    <form class="form" id="searchForm" action="/">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control" id="searchInput" placeholder="" aria-label="Search"
                                   aria-describedby="button-addon">
                            <div class="input-group-append">
                                <button class="btn" type="submit" id="button-addon"  >
                                    <img src="<?php echo TEMPLATE_URL; ?>img/icon_search.png" alt="img-search">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="right">
                        <a href="#" class="ad">
                            <img style="height: 35px;" src="<?php echo TEMPLATE_URL; ?>img/img_purchasing.png" alt="Purchasing Agent">
                            <span class="text">Purchasing Agent</span>
                        </a>
                        <a href="#" class="ad">
                            <img style="height: 35px;" src="<?php echo TEMPLATE_URL; ?>img/img_quality.png" alt="Quality Assurance">
                            <span class="text">Quality Assurance</span>
                        </a>
                        <a href="#" class="ad">
                            <img style="height: 35px;" src="<?php echo TEMPLATE_URL; ?>img/img_delivery.png" alt="Fast Delivery">
                            <span class="text">Fast Delivery</span>
                        </a>
                        <a href="#" class="ad">
                            <img style="height: 35px;" src="<?php echo TEMPLATE_URL; ?>img/img_onestop.png" alt="One-stop Purchasing">
                            <span class="text">One-stop Purchasing</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="bottom">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php blog_navi(); ?>
            </nav>
        </div>
    </div>

</div>

<div class="sidebar">
    <ul>
        <li>
            <a href="#" class="s-me">
                <img src="<?php echo TEMPLATE_URL; ?>img/icon_s_me.png" alt="My account">
            </a>
        </li>
        <li>
            <a href="/inquiry.html" class="s-rfq" title="RFQ for us">
                R<br>F<br>Q
            </a>
        </li>
        <li>
            <a href="skype:<?php echo $skype ?? ''; ?>" class="s-skype" title="skype">
                <img src="<?php echo TEMPLATE_URL; ?>img/icon_s_skype.png"
                     alt="skype">
            </a>
        </li>
        <li>
            <a href="tel:<?php echo $phone ?? ''; ?>" class="s-tel" title="<?php echo $phone ?? ''; ?>">
                <img src="<?php echo TEMPLATE_URL; ?>img/icon_s_tel.png"
                     alt="<?php echo $phone ?? ''; ?>">
            </a>
        </li>
        <li>
            <a href="mailto:<?php echo $email ?? ''; ?>" class="email" title="<?php echo $email ?? ''; ?>">
                <img src="<?php echo TEMPLATE_URL; ?>img/icon_s_email.png"
                     alt="<?php echo $email ?? ''; ?>">
            </a>
        </li>
        <li>
            <a href="javascript:;" class="top" onclick="clickScrollTop()" title="">
                <img src="<?php echo TEMPLATE_URL; ?>img/icon_s_top.png" alt="top">
            </a>
        </li>
    </ul>
</div>



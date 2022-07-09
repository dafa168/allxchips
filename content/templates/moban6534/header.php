<?php
/*
Template Name:moban6534
Template Url:https://www.moban6534.com/
Description:moban6534
Author:moban6534
Author Url:http://www.moban6534.com
*/
if (!defined('EMO_ROOT')) exit('error!');
require_once View::getView('module');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $site_title ?? ''; ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="keywords" content="<?php echo $site_key ?? ''; ?>"/>
    <meta name="description" content="<?php echo $site_description ?? ''; ?>"/>


    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="<?php echo TEMPLATE_URL; ?>static/css/css2.css" rel="stylesheet">

    <link href="<?php echo TEMPLATE_URL; ?>static/css/all.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_URL; ?>static/css/bootstrap-icons.css" rel="stylesheet">

    <link href="<?php echo TEMPLATE_URL; ?>static/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_URL; ?>static/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo TEMPLATE_URL; ?>static/css/lightbox.min.css" rel="stylesheet">

<!--    <link href="--><?php //echo TEMPLATE_URL; ?><!--static/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css" integrity="sha512-NZ19NrT58XPK5sXqXnnvtf9T5kLXSzGQlVZL9taZWeTBtXoN3xIfTdxbkQh6QSoJfJgpojRqMfhyqBAAEeiXcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo TEMPLATE_URL; ?>static/css/style.css" rel="stylesheet">
</head>
<body>

<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border position-relative text-primary" style="width: 6rem; height: 6rem;" role="status"></div>
    <i class="fa fa-laptop-code fa-2x text-primary position-absolute top-50 start-50 translate-middle"></i>
</div>


<div class="container-fluid bg-light px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="small text-secondary" href="/">Welcome</a></li>
                <li class="breadcrumb-item"><a class="small text-secondary" href="#">FbgaOnline</a></li>
<!--                <li class="breadcrumb-item"><a class="small text-secondary" href="#">Terms</a></li>-->
<!--                <li class="breadcrumb-item"><a class="small text-secondary" href="#">Privacy</a></li>-->
            </ol>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <div class="h-100 d-inline-flex align-items-center">
                <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn-square text-primary border-end rounded-0" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn-square text-primary pe-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid py-4 px-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="row align-items-center top-bar">
        <div class="col-lg-4 col-md-12 text-center text-lg-start">
            <a href="" class="navbar-brand m-0 p-0">
                <h1 class="fw-bold text-primary m-0"><i class="fa fa-microchip me-3"></i>FbgaOnline</h1>

            </a>
        </div>
        <div class="col-lg-8 col-md-7 d-none d-lg-block">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-clock text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">Skype</p>
                            <h6 class="mb-0"><a href="skype:<?php echo $skype ?? ''; ?>" rel="nofollow"><?php echo $skype ?? ''; ?></a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="fa fa-phone text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">Call Us</p>
                            <h6 class="mb-0"><a href="tel:<?php echo $phone ?? ''; ?>" rel="nofollow"><?php echo $phone ?? ''; ?></a></h6>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="d-flex align-items-center justify-content-end">
                        <div class="flex-shrink-0 btn-lg-square border rounded-circle">
                            <i class="far fa-envelope text-primary"></i>
                        </div>
                        <div class="ps-3">
                            <p class="mb-2">Email Us</p>
                            <h6 class="mb-0"> <a href="mailTo:"><?php echo $email ?? ''; ?></a> </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php blog_navi(); ?>

<!--<nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0">
            <a href="" class="nav-item nav-link active">Home</a>
            <a href="about.html" class="nav-item nav-link">About Us</a>
            <a href="service.html" class="nav-item nav-link">Services</a>
            <a href="project.html" class="nav-item nav-link">Projects</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact Us</a>
        </div>
        <a href="#" class="btn btn-sm btn-light rounded-pill py-2 px-4 d-none d-lg-block">Go Search</a>
    </div>
</nav>-->

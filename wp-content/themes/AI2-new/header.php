<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title(); ?></title>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/vendors/animate.css/animate.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/vendors/slick-carousel/slick.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/vendors/slick-carousel/slick-theme.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
<script src="<?php echo get_template_directory_uri(); ?>/assets/vendors/jquery/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/loader.js"></script>


    <?php wp_head(); ?>
</head>

<body>
    <div class="oleez-loader"></div>
    <header class="oleez-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="<?php echo get_permalink( get_page_by_path( 'home' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Logo_2.svg" alt="Oleez"></a>
            <ul class="nav nav-actions d-lg-none ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="searchModal">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="search">
                    </a>
                </li>
                <li class="nav-item nav-item-cart">
                    <a class="nav-link" href="#!">
                        <span class="cart-item-count">0</span>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping-cart.svg" alt="cart">
                    </a>
                </li>
                <li class="nav-item dropdown d-none d-sm-block">
                    <a class="nav-link dropdown-toggle" href="#!" id="languageDropdown" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">ENG</a>
                    <div class="dropdown-menu" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="#!">ARB</a>
                        <a class="dropdown-item" href="#!">FRE</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!" data-toggle="offCanvasMenu">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social icon@2x.svg" alt="social-nav-toggle">
                    </a>
                </li>
            </ul>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#oleezMainNav"
                aria-controls="oleezMainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="oleezMainNav">
                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo get_permalink( get_page_by_path( 'home' ) ); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" href="<?php echo get_permalink( get_page_by_path( 'about' ) ); ?>">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="pagesDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Pages</a>
                        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                            <a class="dropdown-item" href="<?php echo get_permalink( get_page_by_path( 'shop' ) ); ?>">Shop</a>
                            <a class="dropdown-item" href="<?php echo get_permalink( get_page_by_path( 'contacts' ) ); ?>">Contact</a>
                        </div>
                    </li>  -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo get_permalink( get_page_by_path( 'portfolio' ) ); ?>">Portfolio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo get_permalink( get_page_by_path( 'blog' ) ); ?>">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo get_permalink( get_page_by_path( 'admin' ) ); ?>">Адмінпанель</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo get_permalink( get_page_by_path( 'register' ) ); ?>">Реєстрація</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-none d-lg-flex">                   
                    <li class="nav-item">
                        <a class="nav-link nav-link-btn" href="#!" data-toggle="searchModal">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/search.svg" alt="search">
                        </a>
                    </li>
                    <!-- Корзина -->
                    <!-- <li class="nav-item nav-item-cart">
                        <a class="nav-link nav-link-btn" href="#!">
                            <span class="cart-item-count">0</span>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shopping-cart.svg" alt="cart">
                        </a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#!" id="languageDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">ENG</a>
                        <div class="dropdown-menu" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="#!">Укр</a>
                            <a class="dropdown-item" href="#!">Spa</a>
                        </div>
                    </li>
                    <li class="nav-item ml-5">
                        <a class="nav-link pr-0 nav-link-btn" href="#!" data-toggle="offCanvasMenu">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/social icon@2x.svg" alt="social-nav-toggle">
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/img/tp.ico">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TechParts | 小さな欠片を大きな力に</title>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/slick/slick-theme.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/slick/slick.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <section class="header">
        <div class="header__bg">
            <div class="header__wrap">
                <div class="header__logo">
                    <a href="<?php echo home_url( '/', 'https' ); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/tp-logo_white.png" alt="TechPartsのロゴ"></a>
                </div>
                <div class="header__nav">
                    <?php 
                        if ( is_home() ) {
                            wp_nav_menu( array( 'menu' => 'top-header-nav' ) );
                        } else {
                            wp_nav_menu( array( 'menu' => 'sub-header-nav' ) );
                        }
                    ?>
                </div>
            </div>
            <div id="hamburger" class="hamburger">
                    <span class="hamburger__line hamburger__line--top"></span>
                    <span class="hamburger__line hamburger__line--bottom"></span>
            </div>
            <div id="black-bg" class="black-bg"></div>
        </div>
        <div class="header__cat">
            <ul>
                <li><a href="/category/programming" class="category-programming">プログラミング</a></li>
                <li><a href="/category/design" class="category-design">デザイン</a></li>
                <li><a href="/category/direction" class="category-direction">ディレクション</a></li>
            </ul>
        </div>
    </section>

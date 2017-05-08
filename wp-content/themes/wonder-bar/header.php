<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico" />
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300' rel='stylesheet' type='text/css'>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'before' ); ?>

<header id="masthead" class="site-header" role="banner">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
    <div id="top-bar"></div>
    <div class="container">
        <div class="row">
            <div class="site-header-inner col-xs-12">
                <?php $header_image = get_header_image();
                if ( ! empty( $header_image ) ) { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
                    </a>
                <?php } // end if ( ! empty( $header_image ) ) ?>
                
                <div class="logo">
                    <h1 class="site-title">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/wonder-bar-logo.svg" alt="Wonder-Bar"/>
                        </a>
                    </h1>
                    <p class="lead"><?php bloginfo( 'description' ); ?></p>
                </div>
            </div> <!-- .site-header-inner -->
        </div><!-- row -->
    </div><!--container-->
        
        
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
    <div class="container-fluid">
        <div class="row">

            <a class="visible-xs visible-sm small-site-cart" href="<?php echo YITH_Request_Quote()->get_raq_page_url() ?>" title="Request a Quote"><?php echo apply_filters( 'yith_ywraq_quote_list_button_label' , __('Request a Quote - ', 'ywraq') )  ?>
                <span><?php echo sprintf (_n( '%d item', '%d items', YITH_Request_Quote()->get_raq_item_number() ), YITH_Request_Quote()->get_raq_item_number() ); ?></span>
                <i class="fa fa-pencil-square-o fa-lg"></i>
            </a>

        <nav class="flex-navigation">

            <a href="#" class="toggleNav">☰ Menu</a>
            <ul class="menu">
            <li class="social">
                <a href="https://www.twitter.com/wonderbaruk" target="_blank" title="Wonder-Bar Twitter"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="social">
                <a href="https://www.facebook.com/wonderbaruk" target="_blank" title="Wonder-Bar Facebook"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="social hidden-md hidden-lg">
                <a href="<?php echo bloginfo ( 'url' ) ?>/contact-us/"><i class="fa fa-phone"></i></a>
            </li>
            <li class="social hidden-md hidden-lg">
                <a href="<?php echo bloginfo ( 'url' ) ?>/contact-us/"><i class="fa fa-envelope"></i></a>
            </li>
            <li><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/mobile-bar-hire/">Mobile Bar Hire</a></li>
            <li><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/bar-hire-packages/">Packages</a></li>
            <li><a href="<?php echo bloginfo ( 'url' ) ?>/shop/vintage-van-bar-hire/">Vintage Van Bar</a></li>
            <li class="sub-menu"><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/mobile-bar-hire/drinks/">Drinks<i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul>
                <li><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/drinks/drinks-packages/">Drinks Packages</a></li>
                <li><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/drinks/drinks-machine-hire/">Drinks Machine Hire</a></li>
                <li><a href="<?php echo bloginfo ( 'url' ) ?>/drinks-menu/">Drinks Menu</a></li>
                <li><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/refrigeration-hire/">Refrigeration</a></li>
              </ul>
            </li>
            <li class="sub-menu"><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/staff/bar-staff-hire/">Staff<i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul>
                <li><a href="<?php echo bloginfo ( 'url' ) ?>/shop/bar-staff/">Bar-Staff</a></li>
                <li><a href="<?php echo bloginfo ( 'url' ) ?>/shop/mixologists/">Mixologists</a></li>
              </ul>
            </li>
            <li><a href="<?php echo bloginfo ( 'url' ) ?>/reviews/">Reviews</a></li>
            <li><a href="<?php echo bloginfo ( 'url' ) ?>/contact-us/">Contact Us</a></li>

            <li class="sub-menu site-header-cart hidden-xs hidden-sm">
                <a href="<?php echo YITH_Request_Quote()->get_raq_page_url() ?>" title="Request a Quote" class="raq-link"><?php echo apply_filters( 'yith_ywraq_quote_list_button_label' , __('View Quote', 'ywraq') )  ?>
                    <!-- <span><?php echo sprintf (_n( '%d item', '%d items', YITH_Request_Quote()->get_raq_item_number() ), YITH_Request_Quote()->get_raq_item_number() ); ?></span> -->
                    <i class="fa fa-pencil-square-o fa-lg"></i>
                </a>
                <ul>
                    <?php dynamic_sidebar( 'header-quote-list' ); ?>
                </ul>
            </li>  
        </nav>
           
        </div><!--row -->
    </div><!-- .container fluid -->
</header><!-- #masthead -->


<div class="main-content">
    <?php if (is_page('contact-us')) {
    echo '<div class="container-fluid"id="map-container"></div>';
} ?>
<?php if (is_product_category()) {
    return;
}
    else {
        echo '<div class="container">';
        echo '<div class="row">';
    } 

    ?>
 

<?php// substitute the class "container-fluid" below if you want a wider content area ?>

            <?php if (is_page('contact-us')) {
    echo '<section id="content" class="main-content-inner col-xs-12 col-md-8">';
}

            else { 
                echo '<section id="content" class="main-content-inner col-sm-12">';
            } ?>


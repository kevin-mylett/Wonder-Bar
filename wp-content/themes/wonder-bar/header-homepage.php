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
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
    
<?php if ( is_front_page() ): ?>
<div id="carousel-homepage" class="carousel slide" data-ride="carousel" data-interval="5000">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-homepage" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-homepage" data-slide-to="1"></li>
    <li data-target="#carousel-homepage" data-slide-to="2"></li>
    <li data-target="#carousel-homepage" data-slide-to="3"></li>
    <li data-target="#carousel-homepage" data-slide-to="3"></li>
  </ol>
 
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/riba-venues-banner.jpg" alt="Mobile Bar at indoor event" class="img-responsive" />
    </div>
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/vintage-van-bar-hire.jpg" alt="Citroen H Vintage van bar hire" class="img-responsive" />
    </div>
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/guests-at-mobile-bar.jpg" alt="Guests standing at the bar" class="img-responsive" />
    </div>
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pour-your-own-beer.jpg" alt="Self-service beer machine" class="img-responsive" />
    </div>
    <div class="item">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/bar-runner.jpg" alt="Wonder-Bar bar runner" class="img-responsive" />
            <div class="carousel-caption hidden-xs hidden-sm">
                <blockquote class="bubble">
                    <p>Booked Wonder Bar for the corporate summer party at my company and they were nothing short of outstanding. The guys and girls on the bar delivered a fantastic service, they turned up early and kept drinks flowing all night long. They were more than happy to accommodate our token based drinks system before moving on to a more traditional pay as you go system. Wouldn't hesitate to recommend for any corporate events, no matter the scale. Thanks guys!</p>
                <footer>Timothy Stack – Venue Hire &amp; Events Sales Manager - activeNewham</footer>
                </blockquote>
            </div>
    </div>
  </div><!-- Carousel Inner -->

 
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-homepage" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-homepage" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> <!-- Carousel -->
    
<!--<div class="container">
    <div class="row">   
        <div class="col-md-3 col-sm-4 hidden-xs">
             <a title="The Eastbourne Wedding Spectacular" target="_blank" href="https://www.weddingfairs.com/fairs/the-eastbourne-wedding-spectacular-7th-january-2017/">
                <div class="circle">
                    <span class="circle-caption">
                        <h4 class="event-heading">Come &amp; see us!</h4>
                        <p>AT THE</p>
                        <p class="event-name">Eastbourne Wedding Spectacular</p>
                        <p>Winter Garden, Eastbourne</p>
                        <p class="hidden-sm hidden-md">Sat 7th &amp; Sun 8th Jan 2017</p>
                        <p>View Details</p>

                    </span>
                </div>
            </a>
        </div>

        <a title="The Eastbourne Wedding Spectacular" target="_blank" href="https://www.weddingfairs.com/fairs/the-eastbourne-wedding-spectacular-7th-january-2017/" class="col-xs-12 hidden-sm hidden-md hidden-lg next-event-mobile">
            Come &amp; see us at the Eastbourne Wedding Spectacular<br /><small>View details</small>
        </a>
    </div>
</div>-->

<div class="container">
    <div class="row">
        <h2>Clients</h2>
    </div>
</div>

<?php endif; ?>


<div class="main-content">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">
		<div class="row">
			<div id="content" class="main-content-inner col-sm-12">


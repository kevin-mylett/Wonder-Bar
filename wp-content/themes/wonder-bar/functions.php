<?php

//Bootstrap CDN setup
// Only on front-end pages, NOT in admin area
if (!is_admin()) {

	// Load CSS
	add_action('wp_enqueue_scripts', 'twbs_load_styles', 11);
	function twbs_load_styles() {
		// Bootstrap
		wp_register_style('bootstrap-styles', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css', array(), null, 'all');
		wp_enqueue_style('bootstrap-styles');
        //wonder_bar Theme CSS (minified if production)
        if(get_site_url() == "https://www.wonder-bar.co.uk" || get_site_url() == "https://staging.wonder-bar.co.uk" ) {
            wp_register_style('wonder-bar', get_stylesheet_directory_uri() . '/style.min.css', array(), null, 'all');
            wp_enqueue_style('wonder-bar');
        } else {
		// Theme Styles
		wp_register_style('theme-styles', get_stylesheet_uri(), array(), null, 'all');
		wp_enqueue_style('theme-styles');
         }
		// Font Awesome
		wp_register_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), null, 'all');
		wp_enqueue_style('font-awesome');

	}

	// Load Javascript
	add_action('wp_enqueue_scripts', 'twbs_load_scripts', 12);
    function twbs_load_scripts() {
		// jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', array(), null, true);
		wp_enqueue_script('jquery');
		// Bootstrap
		wp_register_script('bootstrap-scripts', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js', array('jquery'), null, true);
		wp_enqueue_script('bootstrap-scripts');
        //Cookies
        wp_register_script('jsmin', get_stylesheet_directory_uri() . '/js/js.min.js', array(), null, true);
        wp_enqueue_script('jsmin');
        if (is_page('contact-us')){
        //Maps
        wp_register_script('maps', 'https://maps.google.com/maps/api/js?key=AIzaSyBixkrcaZ8_DNCRkuiH2SGoE-B1Df6D8Rc', array(), null, null, true);
        wp_enqueue_script('maps');
        //Google Maps
        wp_register_script('google-maps', get_stylesheet_directory_uri() . '/js/google-maps.js', '', 1.0, true);
        wp_enqueue_script('google-maps');
        }

    }

} // end if !is_admin

/* Make JavaScript Asynchronous in Wordpress
add_filter( 'script_loader_tag', function ( $tag, $handle ) {    
    if( is_admin() ) {
        return $tag;
    }
    return str_replace( ' src', ' async src', $tag );
}, 10, 2 );*/
     

/*
*Disable css files from _tk parent theme (Using CDN instead)
*/

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

function my_deregister_styles() {
	wp_deregister_style( '_tk-style' );
    wp_deregister_style( '_tk-bootstrap' );
    wp_deregister_style( '_tk-font-awesome' );
}

/*
* Removes bootstrap.min.js from _tk parent theme (Using CDN instead)
*/

add_action( 'wp_print_scripts', 'wpdocs_dequeue_script', 100 );

function wpdocs_dequeue_script() {
   wp_dequeue_script( '_tk-bootstrapjs' );
}

?>
<?php
add_action('wp_footer', 'add_googleanalytics');
function add_googleanalytics() { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-72977716-1', 'auto');
  ga('send', 'pageview');

</script>
<?php } ?>
<?php
/*
*Remove woocommerce wrappers. Bootstrap takes care of this
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/*
*Declare theme support for Woocommerce
*/

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/**
 * De-register _tk sidebar widget area
 * Register widgetized area and update sidebar with default widgets
 */
function remove_tk_sidebar() {
    remove_action( 'widgets_init', '_tk_widgets_init' );
}
add_action( 'after_setup_theme', 'remove_tk_sidebar' );

function _wb_widgets_init() {
    register_sidebar( array(
		'name'          => __( 'Header', 'wonder-bar' ),
		'id'            => 'header-quote-list',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', '_wb_widgets_init');

/* Remove Breadcrumbs from category pages */

function remove_crumbs_from_cat () {
    if ( is_product_category () ){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    }
}

add_action('wp_head', 'remove_crumbs_from_cat');


/*
*Add custom text to price
*/

add_filter( 'woocommerce_get_price_html', 'custom_price_message' );
function custom_price_message( $price ) {
        $vat = '<span class="vat-note">' . __(' +VAT').'</span>';
    if( is_product() && has_term( 'Mobile Bar Hire', 'product_cat') ){
  $new_price = $price . $vat . '<br /><span class="custom-price-prefix">' . __('(per section per 24hrs)').'</span>';
  return $new_price;
    }
    if ( is_product() && has_term( 'Staff Hire', 'product_cat' ) ){
  $new_price = '<span class="custom-price-prefix">' . __(' From ').'</span>' . $price . '<br /><span class="custom-price-prefix">' . __('(per hour + VAT)').'</span>';
  return $new_price;
        }
    if ( is_product() && has_term( 'Packages', 'product_cat' ) ){
  $new_price = '<span class="custom-price-prefix">' . __(' From ').'</span>' . $price . $vat ;
  return $new_price;
        }
    if ( is_single('Citroen H Vintage Van Bar') ){
  $new_price = '<span class="custom-price-prefix">' . __(' From ').'</span>' . $price . $vat ;
  return $new_price;
        }
    else {
	return $price . $vat;
    }
}

add_filter( 'woocommerce_variation_price_html', 'before_price', 10, 2);
function before_price( $price, $variation ) {
    if ( is_single('Citroen H Vintage Van Bar') ){
  $new_price = '<span class="custom-price-prefix">' . __(' From ').'</span>' . $price . $vat ;
  return $new_price;
        }
}

/**
 * Hides the 'Free!' price notice
 */

add_filter( 'woocommerce_variable_free_price_html',  'hide_free_price_notice' );
add_filter( 'woocommerce_free_price_html',           'hide_free_price_notice' );
add_filter( 'woocommerce_variation_free_price_html', 'hide_free_price_notice' );
 
function hide_free_price_notice( $price ) {
 
  return 'FREE';
}

add_filter('woocommerce_empty_price_html', 'custom_call_for_price');

function custom_call_for_price() {
     return 'To Be Confirmed';
}


/*
*Re-order Single Product Information & add notes 
*/

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );
add_action( 'woocommerce_single_product_summary', 'add_order_note', 26 );
add_action( 'woocommerce_single_product_summary', 'add_discount_note', 27 );

function add_order_note () {
    $var= get_post_meta( get_the_ID(), 'order_note', true );
    if( !empty ($var) ){
    echo '<div class="order_note">';
    echo get_post_meta( get_the_ID(), 'order_note', true );
    echo '</div>';
    }
}

function add_discount_note () {
    $var= get_post_meta( get_the_ID(), 'discount_note', true );
    if( !empty ($var) ){
    echo '<div class="discount_note">';
    echo get_post_meta( get_the_ID(), 'discount_note', true );
    echo '</div>';
    }
}



/*
*Rename Description tab to 'Specifications
*/

add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );

function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Specifications' );// Rename the description tab
    
    if ( is_product() && has_term( 'Bar-Staff', 'product_cat' ) ) {
    $tabs['description']['title'] = __( 'Further Details' );// Rename the description tab  
    }
    
    if ( is_product() && has_term( 'Packages', 'product_cat' ) || is_single('465' ) ) {
    $tabs['description']['title'] = __( 'Package Details' );// Rename the description tab  
    }

	return $tabs;

}

/*
*Add Delivery Tab
*/

add_filter( 'woocommerce_product_tabs', 'woo_delivery' );
function woo_delivery( $tabs ) {
	
	// Adds the new tab
	
	$tabs['delivery'] = array(
		'title' 	=> __('Delivery', 'woocommerce' ),
		'priority' 	=> 15,
		'callback' 	=> 'woo_delivery_tab_content'
	);

	return $tabs;

}
function woo_delivery_tab_content() {

	// The new tab content

    echo '<div class="col-sm-6">';
    echo '<h4>Delivery, Installation & Collection</h4>';
	echo '<p><strong>Please be aware that we do not add our delivery costs to your initial quote.</strong></p><p>Our delivery costs are unique to each event. We will therefore calculate the cost of delivery once we know the exact location of your event.</p><p>Our delivery includes setup of all equipment prior to your event and removal of the equipment afterwards.</p><p>Delivery prior to your event can take place up to 36 hours prior.</p><p>Our deliveries are ONLY completed using our own trained and uniformed staff, enabling us to ensure your hired goods arrive at the time you have requested and in perfect condition.</p>';
    echo '</div>';
    echo '<div class="delivery-map col-sm-6 col-md-5">';
    echo '<img src="https://www.wonder-bar.co.uk/wp-content/themes/wonder-bar/img/wonder-bar-delivery-map.png" class="img-responsive" />';
    echo '</div>';
}


/*
*Add Delivery Cost to quote before quote is submitted
*/

function add_delivery_to_quote() {
    
    if (class_exists('YITH_Request_Quote')) {

    if ( ! is_admin() ) {
$product_id = 402;
$raq = YITH_Request_Quote::get_instance();
    if ( ! $raq->is_empty() ) {
$raq->add_item( array( 'product_id' => $product_id) );
}
}
}
}

add_action( 'template_redirect', 'add_delivery_to_quote' );

/**
*Add Date Picker fallback on contact form 7.
*/
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );

/**
*Product Category product transitions


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    } 
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $woocommerce;
        $output = '<div class="hovereffect">';

        if ( has_post_thumbnail() ) {               
            $output .= get_the_post_thumbnail( $post->ID, $size );              
        }                       
        $output .= '<div class="overlay">  
            <h2></h2>
            <p>View Product</p>         
        </div> ';
        return $output .= '</div>';
    }
}*/


/**
*Boostrap Breadcrumbs
*/
function my_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<ul class="breadcrumb">',
            'wrap_after'  => '</ul>',
            'before'      => '<li>',
            'after'       => '</li>',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}
 
add_filter( 'woocommerce_breadcrumb_defaults', 'my_woocommerce_breadcrumbs' );

/*
Override "woocommerce_before_shop_loop" hook.
Add a check : (Line 41 - 43)
Avoid error if administrator choosing "rating" in administration and rating are disabled.
IF "woocommerce_enable_review_rating" option equal "no"
AND
"woocommerce_default_catalog_orderby" option equal "rating"
THEN
update "woocommerce_default_catalog_orderby" option to "date"
https://gist.github.com/Rtransat/c990f35194c0661b6e52
*/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
function get_current_url() {
    global $wp;
    $old = 'http://' . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?');
    $current_url = add_query_arg( '', '', home_url( $wp->request ) );
    return $current_url;
}
function woocommerce_catalog_ordering() {
    global $wp_query;
    if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() ) {
        return;
    }
    $orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
        'menu_order' => __( 'default', 'woocommerce' ),
        'popularity' => __( 'popularity', 'woocommerce' ),
        'rating'     => __( 'average rating', 'woocommerce' ),
        'date'       => __( 'newness', 'woocommerce' ),
        'price'      => __( 'price: low to high', 'woocommerce' ),
        'price-desc' => __( 'price: high to low', 'woocommerce' )
    ) );
    if ( ! $show_default_orderby ) {
        unset( $catalog_orderby_options['menu_order'] );
    }
    if ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) {
        unset( $catalog_orderby_options['rating'] );
    }
    if( get_option('woocommerce_enable_review_rating') == 'no' && get_option('woocommerce_default_catalog_orderby') == 'rating') {
        update_option('woocommerce_default_catalog_orderby', 'date');
    }
    wc_get_template( 'loop/orderby.php', array( 'catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby, 'show_default_orderby' => $show_default_orderby ) );
}

/* 3 products per page */
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 4;' ), 20 );

// Register Custom Navigation Walker
require_once('wp_bootstrap_pagination.php');

function customize_wp_bootstrap_pagination($args) {

    $args['previous_string'] = '&larr;';
    $args['next_string'] = '&rarr;';

    return $args;
}
add_filter('wp_bootstrap_pagination_defaults', 'customize_wp_bootstrap_pagination');

//----------------------------------------------------------/
//  responsive images [ 1) add img-responsive class 2) remove dimensions ]
//----------------------------------------------------------/
function bootstrap_responsive_images( $html ){
  $classes = 'img-responsive'; // separated by spaces, e.g. 'img image-link'
  // check if there are already classes assigned to the anchor
  if ( preg_match('/<img.*? class="/', $html) ) {
    $html = preg_replace('/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . ' $2', $html);
  } else {
    $html = preg_replace('/(<img.*?)(\/>)/', '$1 class="' . $classes . '" $2', $html);
  }
  // remove dimensions from images,, does not need it!
  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
  return $html;
}
add_filter( 'the_content','bootstrap_responsive_images',10 );
add_filter( 'post_thumbnail_html', 'bootstrap_responsive_images', 10 );



<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

<div class="jumbotron" id="<?php echo $term->slug; ?>">
<?php if ( is_product_category( 'bar-staff-hire' ) ) {
	echo '<img src="';
	echo  get_stylesheet_directory_uri();
	echo '/img/mixologist-banner.jpg" class="img-responsive" />';
	} if (is_product_category('drinks') ) {
		echo '<img src="';
		echo get_stylesheet_directory_uri();
		echo '/img/drinks-banner.jpg" class="img-responsive" />';
		} if (is_product_category('mobile-bar-hire') ) {
		echo '<img src="';
		echo get_stylesheet_directory_uri();
		echo '/img/pop-up-banner.jpg" class="img-responsive" />';
		} if (is_product_category('bar-hire-packages') ) {
		echo '<img src="';
		echo get_stylesheet_directory_uri();
		echo '/img/packages-banner.jpg" class="img-responsive" />';
		}
		if (is_product_category('drinks-machine-hire') ) {
		echo '<img src="';
		echo get_stylesheet_directory_uri();
		echo '/img/pour-your-own-beer.jpg" class="img-responsive" />';
		}
		if (is_product_category('refrigeration-hire') ) {
		echo '<img src="';
		echo get_stylesheet_directory_uri();
		echo '/img/refrigeration-banner.jpg" class="img-responsive" />';
		}
		if (is_product_category('drinks-packages') ) {
		echo '<img src="';
		echo get_stylesheet_directory_uri();
		echo '/img/champagne-banner.jpg" class="img-responsive" />';
		}
		?>
	<div class="container centered">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="page-title"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>
	</div>
  </div>


<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

<div class="container">
<div class="row">

		<?php
			/**
			 * woocommerce_archive_description hook
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
		?>


		<?php if (is_product_category('bar-hire-packages') )
			wc_get_template_part('packages');
		?>

		<?php if (is_product_category('drinks-packages') )
			wc_get_template_part('drinks-packages');
		?>

		<?php if ( have_posts() && (! is_product_category (array('bar-hire-packages', 'drinks-packages') ) )  ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook
				 *
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action( 'woocommerce_before_shop_loop' );
			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php if ( ! is_product_category (array('bar-hire-packages', 'drinks-packages') ) ) 

			wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>



<?php get_footer( 'shop' ); ?>

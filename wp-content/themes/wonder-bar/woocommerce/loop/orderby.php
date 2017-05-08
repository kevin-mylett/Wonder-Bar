<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="btn-group pull-right sort-list">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><?php echo (isset($_GET['orderby'])) ? $catalog_orderby_options[$orderby] : $catalog_orderby_options[get_option( 'woocommerce_default_catalog_orderby' )]; ?> <span class="caret"></span></button>
	<ul class="dropdown-menu">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<li<?php echo (isset($_GET['orderby']) && $_GET['orderby'] == $id ) ? ' class="active"' : ($id == get_option( 'woocommerce_default_catalog_orderby') && !isset($_GET['orderby'])) ? ' class="active"' : ''; ?>>
				<a href="<?php echo get_current_url() . '/?orderby=' . $id ; ?>"><?php echo esc_html( $name ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
<?php wc_get_template( 'loop/result-count.php' ); ?>
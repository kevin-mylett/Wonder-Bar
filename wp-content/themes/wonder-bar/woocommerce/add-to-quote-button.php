<?php
/**
 * Add to Quote button template
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @author  Yithemess
 */


?>

<a href="#" class="<?php echo $class ?> btn btn-primary" data-product_id="<?php echo $product_id ?>" data-wp_nonce="<?php echo $wpnonce ?>">
    <?php echo $label ?>
        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</a>
<img src="<?php echo esc_url( YITH_YWRAQ_ASSETS_URL.'/images/wpspin_light.gif' ) ?>" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Item Added to Quote</h4>
      </div>
      <div class="modal-body">
					<div class="row vertical-align">
						<div class="col-sm-4">
                            <?php $product = wc_get_product( $product_id );
   echo $product->get_image(); ?>
						</div>
						<div class="col-sm-4">
                            <?php echo '<a href="'.get_permalink($product_id).'">'.get_the_title($product_id).'</a>'; ?>
						</div>
						<div class="col-sm-4">
							<?php echo $product->get_price_html(); ?>
						</div>
					</div>
				</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Continue Shopping</button>
        <a href="<?php echo YITH_Request_Quote()->get_raq_page_url() ?>" class="btn btn-primary btn-sm"><?php echo apply_filters( 'yith_ywraq_quote_list_button_label' , __('Go To Quote', 'ywraq') )  ?> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
      </div>
    </div>
  </div>
</div>
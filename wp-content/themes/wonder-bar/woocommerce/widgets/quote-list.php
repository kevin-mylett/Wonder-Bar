<?php
/**
 * Table view to Request A Quote
 *
 * @package YITH Woocommerce Request A Quote
 * @since   1.0.0
 * @author  Yithemess
 */

if( count($raq_content) == 0):
    ?>
    <p><?php  _e('No products in the list', 'ywraq') ?></p>
<?php else: ?>
        <div class="yith-ywraq-list-wrapper">
            <img src="<?php echo esc_url( admin_url( 'images/wpspin_light.gif' ) ) ?>" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
            <ul class="yith-ywraq-list">
            <?php foreach($raq_content as $key=>$raq):

                $_product = wc_get_product(  isset( $raq['variation_id'] ) ? $raq['variation_id'] : $raq['product_id'] );
                $thumbnail = ( $show_thumbnail ) ?  $_product->get_image() : '';
                ?>
                <li class="yith-ywraq-list-item">
                    <?php  if ( $_product->is_visible() ): ?><a href="<?php echo $_product->get_permalink() ?>"><?php endif ?>
                        <?php echo $thumbnail; ?>
                    <?php  if ( $_product->is_visible() ): ?></a><?php endif ?>

                    <span class="yith-ywraq-list-info">
                        <?php  if ( $_product->is_visible() ): ?><a href="<?php echo $_product->get_permalink() ?>"><?php endif ?>
                            <?php echo $_product->get_title() ?>
                         <?php  if ( $_product->is_visible() ): ?></a><?php endif ?>

                        <?php  if( isset($raq['variations']) && $show_variations ): ?><small><?php  yith_ywraq_get_product_meta($raq); ?></small><?php endif ?>
                        <?php  if( $show_quantity ||  $show_price ): ?>
                            <span class="quantity">
                         <?php
                            echo ( $show_quantity ) ? $raq['quantity'] : '';
                         if( $show_price ){
                             $x = ( $show_quantity ) ? ' x ' : '';
                             echo apply_filters( 'yith_ywraq_hide_price_template' , $x .WC()->cart->get_product_subtotal( $_product, $raq['quantity'] ), $_product->id);
                         }
                         endif;
                        ?>
                    </span>
                    </span>
                </li>
            <?php endforeach ?>
            </ul>
            <a href="<?php echo YITH_Request_Quote()->get_raq_page_url() ?>" class="quote-widget-button"><?php echo apply_filters( 'yith_ywraq_quote_list_button_label' , __('View list', 'ywraq') )  ?></a>
        </div>
<?php endif ?>


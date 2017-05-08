<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
	<label class="screen-reader-text sr-only" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>
        <div class="row">
          <div class="col-sm-12">
            <div class="input-group">
              <input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
                  <span class="input-group-btn">
                    <button class="btn btn-default btn-search" type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><i class="fa fa-search"></i></button>
                   <input type="hidden" name="post_type" value="product" />
                  </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->
        </div>
</form>

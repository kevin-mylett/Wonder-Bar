<?php
/**
 * The sidebar containing the main widget area
 *
 * @package _tk
 */
?>

	</section><!-- close .main-content-inner -->

	<aside class="sidebar col-sm-12 col-md-4">

		<?php // add the class "panel" below here to wrap the sidebar in Bootstrap style ;) ?>
		<div class="sidebar-padder contact-padder">

			<?php do_action( 'before_sidebar' ); ?>
            
            <hr />
            <div class="contact-us">
            <div class="row">
                    <span class="fa-stack contact-icon col-sm-3">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-map-marker fa-stack-1x icon"></i>
                    </span>
                <span class="col-md-7" id="contact-address">
                <strong>Wonder-Bar</strong><br  />
                Unit E - Winkhurst Farm Buildings<br />
                Coopers Corner<br />
                Ide Hill<br />
                Sevenoaks<br />
                Kent<br />
                TN14 6LB</span>
            </div>
            </div>
            
            <div class="contact-us">
            <div class="row">
                    <span class="fa-stack contact-icon col-sm-3">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-phone fa-stack-1x icon"></i>
                    </span>
                    <span class="contact-info col-md-7">01732 750981</span>
            </div>
            </div>
            
            <div class="contact-us">
            <div class="row">
                    <span class="fa-stack contact-icon col-sm-3">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-envelope-o fa-stack-1x icon"></i>
                    </span>
                <span class="contact-info col-md-8"><a href="mailto:contactus@wonder-bar.co.uk" title="Email Us">contactus@wonder-bar.co.uk</a></span>
            </div>
            </div>
            
            <hr />
            
            <div class="social-media">
                <a href="http://www.facebook.com/wonderbaruk" title="Contact Us on Facebook" target="_blank"><span class="fa-stack contact-icon">
                <i class="fa fa-circle fa-stack-2x" id="facebook-circle"></i>
                <i class="fa fa-facebook fa-stack-1x icon"></i>
                    </span></a>
                <a href="http://www.twitter.com/wonderbaruk" title="Contact Us on Twitter" target="_blank"><span class="fa-stack contact-icon">
                <i class="fa fa-circle fa-stack-2x" id="twitter-circle"></i>
                    <i class="fa fa-twitter fa-stack-1x icon"></i>
                    </span></a>
            </div>
            
		</div><!-- close .sidebar-padder -->

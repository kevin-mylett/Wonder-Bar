<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _tk
 */
?>
			</aside><!-- close .*-inner (main-content or sidebar, depending if sidebar is used) -->
		</div><!-- close .row -->
	</div><!-- close .container -->
</div><!-- close .main-content -->

<div class="footer-header"></div>
<footer id="colophon" class="site-footer" role="contentinfo">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>
	<div class="container">     
        <div class="row">
            <div class="contact-icons">
                
                <h4>Get in Touch</h4>

                <span class="fa-stack contact-icon">
                    <a href="<?php echo get_home_url(); ?>/contact-us">
                        <i class="fa fa-circle fa-stack-2x footer-icon-background"></i>
                        <i class="fa fa-phone fa-stack-1x footer-icon"></i>
                    </a>
                </span>
            
                <span class="fa-stack contact-icon">
                    <a href="<?php echo get_home_url(); ?>/contact-us">
                        <i class="fa fa-circle fa-stack-2x footer-icon-background"></i>
                        <i class="fa fa-envelope-o fa-stack-1x footer-icon"></i>
                    </a>
                </span>
            
                <span class="fa-stack contact-icon">
                    <a href="<?php echo get_home_url(); ?>/contact-us">
                        <i class="fa fa-circle fa-stack-2x footer-icon-background"></i>
                        <i class="fa fa-map-marker fa-stack-1x footer-icon"></i>
                    </a>
                </span>
            
                <span class="fa-stack contact-icon">
                    <a href="https://www.facebook.com/wonderbaruk" target="_blank">
                        <i class="fa fa-circle fa-stack-2x footer-icon-background"></i>
                        <i class="fa fa-facebook fa-stack-1x footer-icon"></i>
                    </a>
                </span>
            
                <span class="fa-stack contact-icon">
                    <a href="https://www.twitter.com/wonderbaruk" target="_blank">
                        <i class="fa fa-circle fa-stack-2x footer-icon-background"></i>
                        <i class="fa fa-twitter fa-stack-1x footer-icon"></i>
                    </a>
                </span>
            </div>
        </div>


        <div class="row">

        <div class="col-sm-4 col-md-3">
            <h4>Latest Tweets</h4>
                <div class="twitter-block">
                    <a class="twitter-timeline" href="https://twitter.com/wonderbaruk"  data-tweet-limit="1" data-chrome="nofooter noheader transparent" data-link-color="#fff">Tweets by wonderbaruk</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

        </div>

                    <div class="col-sm-4 col-md-3">
                <h4>Help</h4>
                    <ul class="help-links">
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/about-us" title="About Us">About Us</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/contact-us" title="Contact Us">Contact Us</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/terms-conditions" title="Terms &amp; Conditions">Terms &amp; Conditions</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/privacy-policy" title="Privacy Policy">Privacy Policy</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/sitemap_index.xml" title="Sitemap">Site Map</a></li>
                    </ul>
            </div>

            <div class="col-sm-4 col-md-3">
                <h4>Popular Links</h4>
                    <ul class="help-links">
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/bar-hire-packages/" title="Mobile bar hire packages">Bar Hire Packages</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/product-category/drinks/drinks-packages/" title="Drinks Packages">Drinks Packages</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/shop/daiquiri-bar-hire-package/" title="The Daiquiri bar hire package">The Daiquiri</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/drinks-menu/" title="Drinks Menu">Drinks Menu</a></li>
                        <li><a href="<?php echo bloginfo ( 'url' ) ?>/reviews/" title="Mobile bar hire reviews">Bar Hire Reviews</a></li>
                    </ul>
            </div>

            <div class="col-md-3 hidden-sm suppliers">
                <h4> Our Partners</h4>
                    <div class="col-xs-4 col-sm-4">
                        <a href="http://www.weddingwishingwell.org.uk/" target="_blank" title="The Wedding Wishing Well Foundation Website"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/the-wedding-wishing-well-foundation.jpg" alt="Wedding Wishing Well Website" class="img-responsive center-block" /></a>
                    </div>
                    <div class="col-xs-4 col-sm-4">
                        <a href="https://www.heineken.co.uk/" target="_blank" title="Heineken Website"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/heineken-logo.jpg" alt="Heineken" class="img-responsive center-block" /></a>
                    </div>
                    <div class="col-xs-4 col-sm-4">
                        <a href="http://westerhambrewery.co.uk/" target="_blank" title="Westerham Brewery Website"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/westerham-brewery-logo.gif" alt="Westerham Brewery" class="img-responsive center-block"/></a>
                    </div>
                    <div class="col-xs-12">
                    <h4 class="payments-heading">Secure Payments</h4>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/card-icons-vertical.gif" alt="Secure card payments by paymentsense" class="img-responsive center-block"/></a>
                    </div>
            </div>
            
            </div>


        
        <div class="row footer-footer">
            <div class="payment-icons visible-sm">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/card-icons-horizontal.gif" alt="Secure card payments by paymentsense" class="img-responsive center-block"/></a>
            </div>

            <div class="copyright">
            <p>Copyright &copy; <?php echo date('Y'); ?> Wonder-Bar t/a Wonder-Group (Int) Ltd. <a href="http://www.99pixels.co.uk">Website Design</a> by 99 Pixels</p>
        	</div>
        
        </div>
        
            
    </div><!-- close .container -->
</footer><!-- close #colophon -->

<?php wp_footer(); ?>

</body>
</html>

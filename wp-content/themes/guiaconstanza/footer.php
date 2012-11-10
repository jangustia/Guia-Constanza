<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
		<footer id="footer" role="contentinfo" class="wrap">
			<nav>
				<ul>
					<li><a href="<?php echo get_page_link(76); ?>">Contacto</a></li>
					<li><a href="<?php echo get_category_link(10); ?>">Blog</a></li>
					<li><a href="<?php echo get_page_link(28); ?>">Somos</a></li>
				</ul>
				<ul>
					<li><a href="<?php echo get_category_link(3); ?>">Hoteles</a></li>
					<li><a href="<?php echo get_category_link(4); ?>">Bares &amp; Restaurantes</a></li>
					<li><a href="<?php echo get_page_link(24); ?>">Donde ir</a></li>
				</ul>
				<ul>
					<li><a href="<?php echo get_category_link(6); ?>">Atractivos</a></li>
					<li><a href="<?php echo get_category_link(8); ?>">Fotografia</a></li>
					<li><a href="<?php echo get_page_link(26); ?>">Recomendaciones</a></li>
				</ul>
			</nav>
			<aside>
				<ul>
					<li><a href="http://www.twitter.com">Siguenos en Twitter</a></li>
					<li><a href="http://www.facebook.com">Conviertete en fan en Facebook</a></li>
					<li><a href="http://www.twitter.com">Subscribete a nuestro Feed</a></li>
				</ul>
			</aside>
		<?php
		/* A sidebar in the footer? Yep. You can can customize
		 * your footer with four columns of widgets.
		 */
		//get_sidebar( 'footer' );
		?>
		</footer><!-- footer -->
	</div><!-- #container -->

	<!-- Vines container -->
	<div id="vines"></div>

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php bloginfo ('template_url'); ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="//maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>

	<!-- scripts concatenated and minified via build script -->
	<script defer src="<?php bloginfo ('template_url'); ?>/js/plugins.js"></script>
	<script defer src="<?php bloginfo ('template_url'); ?>/js/script.js"></script>
	<!-- end scripts -->

	<!-- Asynchronous Google Analytics snippet. Change UA-XXXXX-X to be your site's ID.
	mathiasbynens.be/notes/async-analytics-snippet -->
	<!--script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script-->

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
	chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
	<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body>
</html>
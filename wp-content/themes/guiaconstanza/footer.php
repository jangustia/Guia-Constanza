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
					<li><a href="<?php echo get_page_link(28); ?>">Nosotros</a></li>
					<li><a href="<?php echo get_page_link(257); ?>">Afiliarse</a></li>
					<li><a href="<?php echo get_page_link(76); ?>">Contacto</a></li>
				</ul>
				<ul>
					<li><a href="<?php echo get_category_link(3); ?>">Hoteles</a></li>
					<li><a href="<?php echo get_category_link(4); ?>">Bares &amp; Restaurantes</a></li>
					<li><a href="<?php echo get_page_link(24); ?>">Donde ir</a></li>
				</ul>
				<ul>
					<li><a href="<?php echo get_category_link(6); ?>">Atractivos</a></li>
					<!-- <li><a href="<?php echo get_category_link(8); ?>">Fotografia</a></li> -->
					<li><a href="<?php echo get_page_link(26); ?>">Recomendaciones</a></li>
				</ul>
			</nav>
			<aside>
				<ul>
					<li class="twitter_icon"><a target="_blank" href="https://twitter.com/guiaconstanza">Siguenos en Twitter</a></li>
					<li class="fb_icon"><a target="_blank" href="https://www.facebook.com/guiaconstanza">Conviertete en fan en Facebook</a></li>
					<li class="rss_icon"><a target="_blank" href="<?php bloginfo('rss2_url'); ?>">Subscribete a nuestro Feed</a></li>
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
	
	<div class="lightbox"></div>

	<!-- Clima lightbox -->
	<div class="lightbox_details clima_details">
		<h1 class="lightbox_header">
			<img src="<?php bloginfo ('template_url'); ?>/images/cloud_icon.png">
			Clima en Constanza
			<a class="close_btn" href="#">cerrar</a>
		</h1>
		<div class="lightbox_content clima_content">
			<script type="text/javascript" src="http://www.freemeteo.com/weather.fm?key=6141AD0BAB4FA1DDA8CAFBEEA98D8C52254883"></script>
		</div>
	</div>

	<!-- Recomendaciones Lightbox -->
	<div class="lightbox_details recomendaciones_details">
		<h1 class="lightbox_header">
			<img src="<?php bloginfo ('template_url'); ?>/images/recommend_icon.png">
			Añadir Recomendacion
			<a class="close_btn" href="#">cerrar</a>
		</h1>
		<div class="lightbox_content recomendaciones_content">
			<div class="write_recommendation">
				<form action="#" class="submit_recommendation" method="post">
					<div class="recommendation_heading">
						<div class="circled">
							<div class="inside">
								<img src="<?php bloginfo('template_url') ?>/images/recomend_thumb.png" alt="Recommend" />
							</div>
						</div>
						<h3></h3>
					</div>
					<textarea name="message" id="message" cols="72" rows="6"></textarea>
					<p class="char_limit">Limite de Caracteres: <span class="limit">140</span></p>
					<h5>Normas de uso:</h5>
					<p>GuiaConstanza.com no se hace responsable de los comentarios emitidos por sus lectores y colaboradores.</p>
					<p class="please_no">Por favor no comentes en <strong>MAYÚSCULAS</strong>, te lo agradeceremos.</p>
					<input id="submit_recommendation_btn" type="submit" class="button" value="Añadir">
				</form>
			</div><!-- .write_recommendation -->
		</div>
	</div>


	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php bloginfo ('template_url'); ?>/js/libs/jquery-1.7.1.min.js"><\/script>')</script>

	<script src="//maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>

	<!-- scripts concatenated and minified via build script -->
	<script defer src="<?php bloginfo ('template_url'); ?>/js/plugins.js"></script>
	<script defer src="<?php bloginfo ('template_url'); ?>/js/libs/jquery.mCustomScrollbar.concat.min.js"></script>
	<script defer src="<?php bloginfo ('template_url'); ?>/js/libs/jquery.paging.min.js"></script>
	<script defer src="<?php bloginfo ('template_url'); ?>/js/script.js"></script>
	<!-- end scripts -->

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-5684966-6', 'guiaconstanza.com');
		ga('send', 'pageview');
	</script>

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
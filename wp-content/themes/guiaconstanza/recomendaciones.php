<?php
/**
 * Template Name: Recomendaciones
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h1 id="subheader" class="wrap">
		<span><?php the_title(); ?></span>
		<div class="fullbanner to_right">
			<script type="text/javascript">
				<!--
					google_ad_client = "ca-pub-8397939586383038";
					/* 468x60, creado 1/06/10 */
					google_ad_slot = "4670795372";
					google_ad_width = 468;
					google_ad_height = 60;
				//-->
			</script>
			<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
		</div>
	</h1>
	<div id="container" class="wrap" role="main">
		<div class="fullpage">
			<ul class="breadcrumbs">
				<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
				<li>Donde ir</li>
			</ul>
		</div>
		<div id="recommend" class="fullpage">
			<section>
				<h2>Conozca las recomendaciones de quienes ya han visitado Constanza. <strong>Animate a compartir tu experiencia!</strong></h2>
				<?php for($i=0;$i<8;$i++): ?>
				<article>
					<img src="<?php bloginfo('template_url') ?>/images/recomend_thumb.png" alt="" />
					<div class="box">
						<h3><a href="#">Julio Rodríguez</a></h3>
						<p>Nam sed erat. Nunc lorem risus, elementum mollis, suscipit quis, tempor ac, ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
						<span>Hace 5 días</span>
					</div>
				</article>
				<?php endfor; ?>
				<ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li>1</li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li class="spacer">&#8230;</li>
					<li><a href="#">21</a></li>
					<li><a href="#">22</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
				<a class="button" href="#"><span>Añadir Recomendación</span></a>
			</section>

			<aside class="sideinfo">
				<section class="box">
					<h3>Hoteles Recomendados</h3>

					<img src="<?php bloginfo('template_url') ?>/images/generic_thumb.png" alt="" />
					<h4><a href="#">Villa Pajon</a></h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magnanmui perdiet molestie vitae sed purus.</p>
					<ul class="incluye">
						<li class="tv">TV</li>
						<li class="wifi">Wi-Fi</li>
						<li class="delivery">Transporte</li>
						<li class="menu">Menu</li>
						<li class="drink">Drink</li>
					</ul>
				</section>
				<section>
					<h3>Atractivos</h3>
					<?php for ($i=0;$i<6;$i++): ?>
					<article>
						<img src="<?php bloginfo('template_url') ?>/images/smaller_thumb.png" alt="" />
						<h4><a href="#">Nunc convallis lectus elementum diam sodales in suscipit</a></h4>
					</article>
					<?php endfor; ?>
					<div class="skyscraper"></div>
				</section>
			</aside>
		</div> <!-- #recommend -->
	</div> <!-- #content -->

<?php endwhile; ?>
<?php get_footer(); ?>
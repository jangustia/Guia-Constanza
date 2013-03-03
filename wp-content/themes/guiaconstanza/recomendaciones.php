<?php
/**
 * Template Name: Recomendaciones
 */

get_header(); ?>

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
		<div id="main_content">
			<ul class="breadcrumbs">
				<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
				<li>Recomendaciones</li>
			</ul>

			<div id="recommend">
				<section>
					<h2>Conozca las recomendaciones de quienes ya han visitado Constanza. <strong>Animate a compartir tu experiencia!</strong></h2>
					<?php for($i=0;$i<8;$i++): ?>
						<article>
							<img src="<?php bloginfo('template_url') ?>/images/recomend_thumb.png" alt="Recommend" />
							<span class="tip"></span>
							<div class="box">
								<h3>Julio Rodríguez</h3>
								<p>Nam sed erat. Nunc lorem risus, elementum mollis, suscipit quis, tempor ac, ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
								<span>Hace 5 días</span>
							</div>
						</article>
					<?php endfor; ?>
					
					<div class="pages_area">
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
					</div><!-- .pages_area -->
				</section>
			</div> <!-- #recommend -->
		</div><!-- #main_content -->

		<aside id="side_content" class="sideinfo">
			<section class="box">
				<h3>Recomendamos</h3>
				<img src="<?php bloginfo('template_url') ?>/images/generic_thumb.png" alt="" />
				<h4><a href="#">Nulla a tellus also magna imperdiet intomarte molestie vitae sed purus.</a></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magnanmui perdiet molestie vitae sed purus. Nulla a tellus ac mangnanmui perdiet molestie vitae sed purus.</p>
			</section>
			<div class="places-list">
				<?php // Get "Atractivos" section
				get_sidebar( 'atractivos' ); ?>
			</div><!-- .places-list -->
		</aside>

<?php get_footer(); ?>
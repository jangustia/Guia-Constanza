<?php
/**
 * Template Name: Contacto
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
		<div id="somos" class="fullpage">
			<ul class="breadcrumbs">
				<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
				<li><?php the_title(); ?></li>
			</ul>

			<img src="<?php bloginfo('template_url') ?>/images/img_somos_headline.jpg" alt="Paisaje de Constanza" />

			<?php the_content() ?>
		</div><!-- #somos -->

<?php endwhile; ?>
<?php get_footer(); ?>
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

			<div id="main_content">
				<?php the_content() ?>
			</div><!-- #main_content -->

			<div id="side_content">
				<?php if (282 == get_the_ID()): ?>
				<form id="contact_form">
					<fieldset>
						<label for="name">Nombre</label>
						<input type="text" id="name" name="name" />
						<label for="email">Correo</label>
						<input type="text" id="email" name="email" />
						<label for="message">Mensaje</label>
						<textarea id="message"></textarea>
						<input type="submit" class="button" name="submit" value="Enviar">
					</fieldset>
				</form>
				<?php else: ?>
				<h3 class="visuallyhidden">Enlaces</h3>
				<ul class="button_menu clearfix">
					<li><a class="button" href="<?php bloginfo('url') ?>/somos/publicidad/">Publicidad</a></li>
					<li><a class="button" href="<?php bloginfo('url') ?>/somos/contacto/">Contacto</a></li>
				</ul>
				<?php endif; ?>
			</div>
	</div><!-- #somos -->

<?php endwhile; ?>
<?php get_footer(); ?>
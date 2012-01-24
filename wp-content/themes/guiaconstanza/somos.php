<?php
/**
 * Template Name: Contacto
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h1 id="subheader"><span><?php the_title(); ?></span></h1>
	<div id="content" class="wrap" role="main">
		<div id="somos">
			<ul class="breadcrumbs">
				<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
				<li>Somos</li>
			</ul>

			<img src="<?php bloginfo('template_url') ?>/images/somos_img.jpg" alt="" />
			<h2>Qué Somos?</h2>
			<p>Guía Constanza es una guía ecoturística completa sobre Constanza, considerada la ciudad con el clima más frío de la República Dominicana y de todo el Caribe.</p>
			<p>GuiaConstanza.com busca mostrar las maravillas que hacen de una estadía en el hermoso valle de Constanza una experiencia inolvidable.</p>

			<h2>Misión</h2>
			<p>Orientar e informar sobre los atractivos y servicios de ecoturismo del valle de Constanza, de manera que nuestros usuarios se conviertan en futuros visitantes de la ciudad.</p>

			<h2>Visión</h2>
			<p>Dar a conocer las bellezas de Constanza a nivel mundial, y ser el promotor número uno del valle.</p>

			<ul class="more_pages">
				<li><a class="button" href="#">Publicidad</a></li>
				<li><a class="button" href="#">Contacto</a></li>
			</ul>
	</div><!-- #somos -->

<?php endwhile; ?>
<?php get_footer(); ?>
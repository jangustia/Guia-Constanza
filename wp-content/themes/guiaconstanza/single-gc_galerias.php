<?php
get_header(); ?>

<h1 id="subheader"><span><?php the_title(); ?></span></h1>
<div id="content" class="wrap" role="main">
	<div id="photo-albums">
		<ul class="breadcrumbs">
			<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
			<li>Fotografías</li>
		</ul>
	</div><!-- #photo-albums -->

<?php get_footer(); ?>
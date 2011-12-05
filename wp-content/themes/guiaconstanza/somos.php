<?php
/**
 * Template Name: Contacto
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<h1 id="subheader"><span><?php the_title(); ?></span></h1>
	<div id="content" class="wrap" role="main">
		<?php the_content(); ?>
		<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
		<nav>
			<ul>
				<li><a class="button" href="#">Publicidad</a></li>
				<li><a class="button" href="#">Contacto</a></li>
			</ul>
		</nav>
	</div><!-- #content -->
<?php endwhile; ?>
<?php get_footer(); ?>
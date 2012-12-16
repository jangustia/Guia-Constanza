<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header();

if ( have_posts() ) while ( have_posts() ) : the_post();
	$post_id   = get_the_ID();
	$post_type = get_post_type ($post_id);
	$category  = get_the_category();

?>
				<h1 id="subheader" class="wrap">
					<span><?php echo $category[0]->cat_name;?></span>
				</h1>

				<div id="container" class="wrap" role="main">
					<div id="main_content">
						<ul class="breadcrumbs">
							<li><a href="<?php echo home_url( '/' ); ?>">Inicio</a></li>
							<li><?php the_category(' '); ?></li>
							<li><?php the_title(); ?></li>
						</ul>
						<div id="details">
							<h2 class="fn org"><?php the_title(); ?></h2>
							<div class="postmeta">
									<span class="postdate">Fecha: <?php the_time('j/n/Y'); ?></span>
									<span class="postcat">
										Categoria: 
										<a href="<?php echo get_category_link($category[0]->cat_ID); ?>"><?php echo $category[0]->cat_name; ?></a>
									</span>
									<span class="postcomments">
										Comentarios: <?php comments_number('0', '1', '%'); ?></span>
									</span>
								</div>
							<?php the_content(); ?>
							<?php comments_template( '', true ); ?>
					</div><!-- #details -->
				</div><!-- #main_content -->

				<div id="side_content">
					<aside class="sideinfo">
						<section class="box">
							<h3>Recomendamos</h3>

							<img src="<?php bloginfo('template_url') ?>/images/generic_thumb.png" alt="" />
							<h4><a href="#">Nulla a tellus also magna imperdiet intomarte molestie vitae sed purus.</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magnanmui perdiet molestie vitae sed purus. Nulla a tellus ac mangnanmui perdiet molestie vitae sed purus.</p>
						</section>

						<?php // Get "Atractivos" section
						get_sidebar( 'atractivos' ); ?>
					</aside>
				</div><!-- #side_content -->
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
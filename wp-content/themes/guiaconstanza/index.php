<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

	get_header();
	get_sidebar( 'featured' );
	
	$query_args = array (
		'post_type' => 'gc_atractivos'
	);
	
	$atractivos = new WP_Query ($query_args);
?>

				<div id="content" class="wrap" role="main">
					<section id="atractivos">
						<?php if (!$atractivos->have_posts()): ?>
						<?php else: ?>
							<h2>Atractivos</h2>
							
							<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
								<article>
									<?php the_post_thumbnail ('thumbnail'); ?>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<?php the_excerpt(); ?>
								</article>
							<?php endwhile; ?>
							
							<div class="fullbanner">
								<script type="text/javascript"><!--
									google_ad_client = "ca-pub-8397939586383038";
									/* GuiaConstanza 468x60 */
									google_ad_slot = "6293014751";
									google_ad_width = 468;
									google_ad_height = 60;
									//-->
								</script>
							</div>
						<?php endif; ?>
					</section><!-- #atractivos -->
					
					<?php $atractivos->rewind_posts(); ?>
					
					<section id="dondeir-widget">
						<h2>Donde ir</h2>
						<div id="dondeir_map"></div>
						<ul id="marker_list" class="visuallyhidden">
						<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
							<?php if (($geo_lat = get_post_meta (get_the_ID(), 'geo_lat', TRUE)) && ($geo_long = get_post_meta (get_the_ID(), 'geo_long', TRUE))): ?>
								<li data-geo_lat="<?php echo $geo_lat; ?>" data-geo_long="<?php echo $geo_long; ?>">
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>">Ver más</a>
								</li>
							<?php endif; ?>
						<?php endwhile; ?>
						</ul>
						<div class="verticalbanner"></div>
						<div class="squarepopup"></div>
					</section>

<?php get_footer(); ?>
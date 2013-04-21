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
		'post_type' => 'gc_atractivos',
		'posts_per_page' => 3
	);

	$atractivos = new WP_Query ($query_args);
?>

		<div id="container" class="wrap" role="main">
			<div id="main_content">
				<?php if (!$atractivos->have_posts()): ?>
				<?php else: ?>
				<section class="places-list">
					<h2>Atractivos</h2>
					<ul>
						<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
							<li>
								<div class="circled">
									<div class="inside">
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail ('thumbnail'); ?>
										<?php else : ?>
											<img src="<?php bloginfo('template_url') ?>/images/atractivos_listing_thumb_guide.png" alt="">
										<?php endif; ?>
									</div>
								</div>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php new_excerpt(160); ?>
							</li>
						<?php endwhile; ?>
					</ul>

					<a href="<?php echo get_category_link('6'); ?>" class="know_more">Conoce otros atractivos</a>

					<div class="fullbanner">
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
				</section><!-- #atractivos -->
				<?php endif; ?>
			</div><!-- #main_content -->
			<?php $atractivos->rewind_posts(); ?>

			<div id="side_content">
				<section id="dondeir-widget">
					<h2>Donde ir</h2>
					<div id="map_container">
						<div id="dondeir_map"></div>
						<ul id="marker_list" class="visuallyhidden">
						<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
							<?php if (($geo_lat = get_post_meta (get_the_ID(), 'geo_lat', TRUE)) && ($geo_long = get_post_meta (get_the_ID(), 'geo_long', TRUE))): ?>
								<li data-geo_lat="<?php echo $geo_lat; ?>" data-geo_long="<?php echo $geo_long; ?>">
									<h3><?php the_title(); ?></h3>
									<p><?php echo get_the_excerpt(); ?></p>
									<a href="<?php the_permalink(); ?>">Ver más</a>
								</li>
							<?php endif; ?>
						<?php endwhile; ?>
						</ul><!-- #marker_list -->
					</div><!-- #map_container -->
					<div class="verticalbanner"></div>
					<div class="squarepopup"></div>
				</section>
			</div><!-- #side_content -->

<?php get_footer(); ?>
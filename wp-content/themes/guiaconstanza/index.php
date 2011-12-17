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
get_sidebar( 'featured' ); ?>

				<div id="content" class="wrap" role="main">
					<section id="atractivos">
						<?php if (have_posts()): ?>
						<h2>Atractivos</h2>
							<?php while(have_posts()): the_post(); ?>
						<article>
							<img src="<?php bloginfo('template_url') ?>/images/constanza-agricultura.png" alt="" />
							<h3><a href="#"><?php the_title() ?></a></h3>
							<?php the_excerpt() ?>
						</article>
							<?php endwhile; ?>
						<?php else: ?>
							<h2>No hay nah, bro</h2>
						<?php endif; ?>
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
					</section><!-- #atractivos -->

					<section id="dondeir-widget">
						<h2>Donde ir</h2>
						<img src="<?php bloginfo('template_url') ?>/images/map_placeholder.png" alt="Mapa" />
						<div class="verticalbanner"></div>
						<div class="squarepopup"></div>
					</section>

<?php get_footer(); ?>
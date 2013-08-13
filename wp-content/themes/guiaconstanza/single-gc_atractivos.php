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
							<div class="post_share">
								<!-- Share on Twitter -->
								<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

								<!-- Share on FB -->
								<div class="fb-like" data-send="false" data-width="315" data-show-faces="false"></div>
							</div>
							<?php echo do_shortcode('[fbcomments]'); ?>
					</div><!-- #details -->
				</div><!-- #main_content -->

				<div id="side_content">
					<aside class="sideinfo">
						<?php get_sidebar("recommend"); ?>

						<?php // Get "Atractivos" section
						get_sidebar( 'atractivos' ); ?>
					</aside>
				</div><!-- #side_content -->
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
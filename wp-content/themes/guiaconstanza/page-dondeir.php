<?php
/**
 * Template Name: Donde ir
 */
     
	get_header();

	$query_args = array (
		'post_type' => 'gc_atractivos'
	);

	$loop = new WP_Query ($query_args);
?>
			<?php while (have_posts()) : the_post(); ?>
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
					<div class="fullpage">
						<ul class="breadcrumbs">
							<li><a href="<?php echo bloginfo('url') ?>">Inicio</a></li>
							<li>Donde ir</li>
						</ul>
					</div>
						
					<div id="dondeir">
						<section>
							<?php the_content() ?>
						</section>
						<div id="map_container">
							<div id="dondeir_map"></div>
							<ul id="marker_list" class="visuallyhidden">
							<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<?php if (($geo_lat = get_post_meta (get_the_ID(), 'geo_lat', TRUE)) && ($geo_long = get_post_meta (get_the_ID(), 'geo_long', TRUE))): ?>
									<li data-geo_lat="<?php echo $geo_lat; ?>" data-geo_long="<?php echo $geo_long; ?>">
										<h3><?php the_title(); ?></h3>
										<p><?php echo get_the_excerpt(); ?></p>
										<a href="<?php the_permalink(); ?>">Ver más</a>
									</li>
								<?php endif; ?>
							<?php endwhile; ?>
							</ul>
						</div><!-- #map_container -->
						<div id="dondeir_share">Compartir:
							<img src="<?php bloginfo('template_url') ?>/images/icon_twt_dondeir.png" alt="Twitter" />
							<img src="<?php bloginfo('template_url') ?>/images/icon_fb_dondeir.png" alt="Facebook" />
						</div>
					</div><!-- #dondeir -->

			<?php endwhile ?>
<?php get_footer() ?>
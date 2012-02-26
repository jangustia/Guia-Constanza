<?php
/*
 Template Name: Donde Ir
*/
	get_header();
	
	$query_args = array (
		'post_type' => 'gc_atractivos'
	);
	
	$loop = new WP_Query ($query_args);
?>
			<?php while (have_posts()) : the_post(); ?>
				<h1 id="subheader" class="wrap"><span><?php
					the_title();
				?></span></h1>

				<div id="content" class="wrap" role="main">
					<div id="dondeir">
						<section>
							<?php the_content() ?>
						</section>
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
						<div id="dondeir_share">Compartir:
							<img src="<?php bloginfo('template_url') ?>/images/icon_twt_dondeir.png" alt="Twitter" />
							<img src="<?php bloginfo('template_url') ?>/images/icon_fb_dondeir.png" alt="Facebook" />
						</div>
					</div><!-- #dondeir -->
				</div><!-- #content -->
			<?php endwhile ?>
<?php get_footer() ?>
<?php
	$hoteles = new WP_Query (array (
		'post_type'      => 'gc_hoteles',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));

	$bares_y_rests = new WP_Query (array (
		'post_type'      => 'gc_bares_y_rests',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));
	
	$blogs = new WP_Query (array (
		'post_type'      => 'gc_atractivos',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));

	$hoteles_first_post = TRUE;
	$blogs_first_post = TRUE;
	
	/* 
	 * Bares y Restaurantes are shown first
	 */
?>
				<div id="featured" class="wrap clearfix">
					<section id="featured_hotel">
						<h2>Bares y Restaurantes Destacados</h2>

						<div id="hotel_slide" class="nivoSlider">
						<?php while ($bares_y_rests->have_posts()): $bares_y_rests->the_post(); ?>
							<a class="nivo-imageLink" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail ('medium', array ('title'=>get_the_title())); ?>
							</a>
						<?php endwhile; ?>
						</div>
					</section>

					<section id="featured_bars">
						<h2>Hoteles</h2>

						<nav class="featured_arrows">
							<ul>
								<li><a class="next ir" href="javascript:;">Siguiente</a></li>
								<li><a class="prev ir" href="javascript:;">Anterior</a></li>
							</ul>
						</nav>

						<?php while ($hoteles->have_posts()): $hoteles->the_post(); ?>
							<div class="slide<?php if ($hoteles_first_post) { $hoteles_first_post = FALSE; ?> active<?php }?>">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="circled">
									<div class="inside">
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail ('thumbnail'); ?>
										<?php else : ?>
											<img src="<?php bloginfo('template_url') ?>/images/hotel_thumb_default.jpg" alt="">
										<?php endif; ?>
									</div>
								</div>
								<p><?php echo new_excerpt (180); ?></p>

								<ul class="includes_small">
								<?php $counter = 0; ?>
								<?php foreach (hoteles_icons() as $slug => $name): ?>
									<?php if ($counter < 5) : ?>
										<li class="<?php echo $slug . "_small"; ?>"><?php //echo $name;?></li>
									<?php endif; ?>
									<?php $counter++; ?>
								<?php endforeach; ?>
								</ul>
							</div>
						<?php endwhile; ?>
					</section>
					
					<section id="featured_posts">
						<h2>Atractivos</h2>
						
						<nav class="featured_arrows">
							<ul>
								<li><a class="next ir" href="javascript:;">Siguiente</a></li>
								<li><a class="prev ir" href="javascript:;">Anterior</a></li>
							</ul>
						</nav>
						
						<?php while ($blogs->have_posts()): $blogs->the_post(); ?>
							<div class="slide<?php if ($blogs_first_post) { $blogs_first_post = FALSE; ?> active<?php }?>">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="circled">
									<div class="inside">
										<?php if (has_post_thumbnail()) : ?>
											<?php the_post_thumbnail ('thumbnail'); ?>
										<?php else : ?>
											<img src="<?php bloginfo('template_url') ?>/images/hotel_thumb_default.jpg" alt="">
										<?php endif; ?>
									</div>
								</div>
								<p><?php echo new_excerpt (500); ?></p>
						</div>
						<?php endwhile; ?>
					</section>
					
				</div><!-- #featured -->

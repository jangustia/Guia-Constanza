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

	$first_post = TRUE;
?>
				<div id="featured" class="wrap">
					<section id="featured_hotel">
						<h2>Hoteles Destacados</h2>

						<div id="hotel_slide" class="niveSlider">
						<?php while ($hoteles->have_posts()): $hoteles->the_post(); ?>
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail ('medium', array ('title'=>get_the_title())); ?></a>
						<?php endwhile; ?>
						</div>
					</section>

					<section id="featured_bars">
						<h2>Bares y Restaurantes</h2>

						<nav class="featured_arrows">
							<ul>
								<li><a class="next ir" href="javascript:;">Siguiente</a></li>
								<li><a class="prev ir" href="javascript:;">Anterior</a></li>
							</ul>
						</nav>

						<?php while ($bares_y_rests->have_posts()): $bares_y_rests->the_post(); ?>
							<div class="slide<?php if ($first_post) { $first_post = FALSE; ?> active<?php }?>">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php the_post_thumbnail ('thumbnail'); ?>
								<p><?php echo new_excerpt (120); ?></p>

								<ul class="incluye">
								<?php foreach (bares_y_rests_icons() as $slug => $name): ?>
									<li class="<?php echo $slug; ?>"><?php echo $name;?></li>
								<?php endforeach; ?>
								</ul>
							</div>
						<?php endwhile; ?>
					</section>
					<section id="featured_posts">
						<h2>Blog: La Suiza del Caribe</h2>
						<div class="slide">
							<h3><a href="#">Nulla a tellus also magna imperdiet intomarte molestie vitae sed purus</a></h3>
							<img src="<?php bloginfo('template_url') ?>/images/generic_thumb.png" alt="" />
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magna imperdiet molestie vitae sed purus.</p>
						</div>
					</section>
				</div><!-- #featured -->

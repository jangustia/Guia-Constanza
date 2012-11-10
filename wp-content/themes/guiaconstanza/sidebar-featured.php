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
		'category_name'      => 'blog',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));

	$bares_first_post = TRUE;
	$blogs_first_post = TRUE;
?>
				<div id="featured" class="wrap clearfix">
					<section id="featured_hotel">
						<h2>Hoteles Destacados</h2>

						<div id="hotel_slide" class="nivoSlider">
						<?php while ($hoteles->have_posts()): $hoteles->the_post(); ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail ('medium', array ('title'=>get_the_title())); ?>
							</a>
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
							<div class="slide<?php if ($bares_first_post) { $bares_first_post = FALSE; ?> active<?php }?>">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php the_post_thumbnail ('thumbnail'); ?>
								<p><?php echo new_excerpt (120); ?></p>

								<ul class="includes">
								<?php foreach (bares_y_rests_icons() as $slug => $name): ?>
									<li class="<?php echo $slug; ?>"><?php echo $name;?></li>
								<?php endforeach; ?>
								</ul>
							</div>
						<?php endwhile; ?>
					</section>
					<section id="featured_posts">
						<h2>Blog: La Suiza del Caribe</h2>
						
						<nav class="featured_arrows">
							<ul>
								<li><a class="next ir" href="javascript:;">Siguiente</a></li>
								<li><a class="prev ir" href="javascript:;">Anterior</a></li>
							</ul>
						</nav>
						
						<?php while ($blogs->have_posts()): $blogs->the_post(); ?>
							<div class="slide<?php if ($blogs_first_post) { $blogs_first_post = FALSE; ?> active<?php }?>">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php the_post_thumbnail ('thumbnail'); ?>
								<p><?php echo new_excerpt (500); ?></p>
						</div>
						<?php endwhile; ?>
						
					</section>
				</div><!-- #featured -->

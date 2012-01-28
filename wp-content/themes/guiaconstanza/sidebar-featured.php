<?php
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
						<figure class="hotel_slide">
							<img src="<?php bloginfo('template_url') ?>/images/img_hoteles.jpg" alt="Rancho Guaraguao" />
							<figcaption>
								<h3>Rancho Guaraguao</h3>
								<p>El encanto y la magia del clima de montaña combinan armónicamente con un complejo turístico.</p>
							</figcaption>
						</figure>
					</section>
					<section id="featured_bars">
						<h2>Bares y Restaurantes</h2>
						
						<nav class="featured_arrows">
							<ul>
								<li><a class="next" href="javascript:;">▶</a></li>
								<li><a class="prev" href="javascript:;">◀</a></li>
							</ul>
						</nav>
						
						<?php while ($bares_y_rests->have_posts()): $bares_y_rests->the_post(); ?>
						<?php if ($first_post): $first_post = FALSE; ?>
							<div class="slide active">
						<?php else: ?>
							<div class="slide">
						<?php endif; ?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<img src="<?php bloginfo('template_url') ?>/images/generic_thumb.png" alt="" />
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

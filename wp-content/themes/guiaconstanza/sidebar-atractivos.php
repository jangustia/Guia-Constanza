<?php
	$atractivos = new WP_Query (array (
		'post_type'      => 'gc_atractivos',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));
?>
						<section>
							<h2>Atractivos</h2>
							<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
							<article>
								<img src="<?php bloginfo ('template_url'); ?>/images/constanza-agricultura.png" alt="" />
								<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							</article>
							<?php endwhile; ?>
							<div class="skyscraper"></div>
						</section>

<?php
	$featured = new WP_Query (array (
		'post_type'      => 'gc_atractivos',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));
?>
				<section id="featured_atractivos">
					<div id="atractivo_slider" class="nivoSlider">
					<?php while ($featured->have_posts()): $featured->the_post(); ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail ('atractivo-featured', array ('title'=>get_the_title())); ?></a>
					<?php endwhile; ?>
					</div>
				</section>

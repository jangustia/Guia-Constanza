<?php 
	$query_args = array (
		'post_type' => 'gc_atractivos',
		'posts_per_page' => 5
	);

	$atractivos = new WP_Query($query_args);
	$atractivos_first_post = TRUE;
?>

<section class="we_recommend box">
	<h3>Recomendamos</h3>
		<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
			<div class="recommend_slide <?php if ($atractivos_first_post) { $atractivos_first_post = FALSE; ?> active<?php }?>">
				<div class="circled">
					<div class="inside">
						<?php if (has_post_thumbnail()) : ?>
							<?php the_post_thumbnail ('thumbnail'); ?>
						<?php else : ?>
							<img src="<?php bloginfo('template_url') ?>/images/atractivos_listing_thumb_guide.png" alt="">
						<?php endif; ?>
					</div>
				</div>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<?php new_excerpt(130); ?>
			</div>
		<?php endwhile; ?>
	<ul class="recommend_nav">
		<li><a class="prev ir" href="javascript:;"></a></li>
		<li><a class="next ir" href="javascript:;"></a></li>
	</ul>
</section>
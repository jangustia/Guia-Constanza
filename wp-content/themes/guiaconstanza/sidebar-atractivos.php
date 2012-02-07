<?php
	$atractivos = new WP_Query (array (
		'post_type'      => 'gc_atractivos',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));
?>
						<section id="sidebar-atractivos">
							<h2>Atractivos</h2>
							<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
							<article>
								<?php the_post_thumbnail ('square-thumb'); ?>
								<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
							</article>
							<?php endwhile; ?>
							<div class="skyscraper">
								<script type="text/javascript"><!--
									google_ad_client = "ca-pub-8397939586383038";
									/* GuiaConstanza 160x600 */
									google_ad_slot = "4408559931";
									google_ad_width = 160;
									google_ad_height = 600;
									//-->
								</script>
							</div>
						</section>

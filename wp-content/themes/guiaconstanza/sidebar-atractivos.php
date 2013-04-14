<?php
	$atractivos = new WP_Query (array (
		'post_type'      => 'gc_atractivos',
		'posts_per_page' => 5,
		'orderby'        => 'rand'
	));
?>
						<section class="places-list smaller">
							<h3>Atractivos</h3>
							<ul>
								<?php while ( $atractivos->have_posts() ) : $atractivos->the_post(); ?>
									<li>
										<?php the_post_thumbnail ('square-thumb'); ?>
										<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
									</li>
								<?php endwhile; ?>
							</ul>
							<div class="skyscraper">
								<script type="text/javascript">
									<!--
										google_ad_client = "ca-pub-8397939586383038";
										/* 120x600, creado 1/06/10 */
										google_ad_slot = "1079743079";
										google_ad_width = 120;
										google_ad_height = 600;
									//-->
								</script>
								<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
							</div>
						</section><!-- .places-list -->

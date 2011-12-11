<?php
/*
 Template Name: Donde Ir
*/
get_header();
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
						<div id="dondeir_share">Compartir:
							<img src="<?php bloginfo('template_url') ?>/images/icon_twt_dondeir.png" alt="Twitter" />
							<img src="<?php bloginfo('template_url') ?>/images/icon_fb_dondeir.png" alt="Facebook" />
						</div>
					</div><!-- #dondeir -->
				</div><!-- #content -->
				<?php endwhile ?>
<?php get_footer() ?>
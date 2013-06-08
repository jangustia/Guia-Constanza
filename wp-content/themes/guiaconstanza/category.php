<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

	get_header();

	$category   = get_category (get_query_var ('cat'));
	$has_search = in_array ($category->slug, array ('hoteles', 'bares-y-restaurantes'));
	$query_args = array (
		'post_type'      => post_type_for_category ($category->slug),
		'posts_per_page' => 7
	);

	if ($has_search)
	{
		$nombre = isset ($_REQUEST['nombre']) ? $_REQUEST['nombre'] : '';
		$tipo   = isset ($_REQUEST['tipo'])   ? $_REQUEST['tipo']   : '';
		$bar    = isset ($_REQUEST['bar'])    ? $_REQUEST['bar']    : FALSE;
		$tv     = isset ($_REQUEST['tv'])     ? $_REQUEST['tv']     : FALSE;
		$wifi   = isset ($_REQUEST['wifi'])   ? $_REQUEST['wifi']   : FALSE;

		$chim   = isset ($_REQUEST['chim'])  ? $_REQUEST['chim']  : FALSE;
		$pool   = isset ($_REQUEST['pool'])  ? $_REQUEST['pool']  : FALSE;
		$james  = isset ($_REQUEST['james']) ? $_REQUEST['james'] : FALSE;
		$heat   = isset ($_REQUEST['heat'])  ? $_REQUEST['heat']  : FALSE;
		$menu   = isset ($_REQUEST['menu'])  ? $_REQUEST['menu']  : FALSE;

		$crio     = isset ($_REQUEST['crio'])     ? $_REQUEST['crio']     : FALSE;
		$inter    = isset ($_REQUEST['inter'])    ? $_REQUEST['inter']    : FALSE;
		$delivery = isset ($_REQUEST['delivery']) ? $_REQUEST['delivery'] : FALSE;

		if (!empty ($nombre))
			$query_args['meta_query'][] = array ('key' => 'nombre', 'value' => $nombre, 'compare' => 'LIKE');
		if (!empty ($tipo))
			$query_args['meta_query'][] = array ('key' => 'tipo',   'value' => $tipo);
		if (!empty ($bar))
			$query_args['meta_query'][] = array ('key' => 'bar',    'value' => $bar);
		if (!empty ($tv))
			$query_args['meta_query'][] = array ('key' => 'tv',     'value' => $tv);
		if (!empty ($wifi))
			$query_args['meta_query'][] = array ('key' => 'wifi',   'value' => $wifi);

		if (!empty ($chim)  && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'chim',  'value' => $chim);
		if (!empty ($pool)  && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'pool',  'value' => $pool);
		if (!empty ($james) && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'james', 'value' => $james);
		if (!empty ($heat)  && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'heat',  'value' => $heat);
		if (!empty ($menu)  && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'menu',  'value' => $menu);

		if (!empty ($crio)     && $category->slug == 'bares-y-restaurantes')
			$query_args['meta_query'][] = array ('key' => 'crio',     'value' => $crio);
		if (!empty ($inter)    && $category->slug == 'bares-y-restaurantes')
			$query_args['meta_query'][] = array ('key' => 'inter',    'value' => $inter);
		if (!empty ($delivery) && $category->slug == 'bares-y-restaurantes')
			$query_args['meta_query'][] = array ('key' => 'delivery', 'value' => $delivery);
	}

	$loop = new WP_Query ($query_args);
?>

				<h1 id="subheader" class="wrap">
					<span><?php printf( __( '%s', 'boilerplate' ), '' . single_cat_title( '', false ) . '' );?></span>
					<div class="fullbanner to_right">
						<script type="text/javascript">
							<!--
								google_ad_client = "ca-pub-8397939586383038";
								/* 468x60, creado 1/06/10 */
								google_ad_slot = "4670795372";
								google_ad_width = 468;
								google_ad_height = 60;
							//-->
						</script>
						<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
					</div><!-- .fullbanner -->
				</h1><!-- #subheader -->

				<?php 
				// Get "Featured" section
				if ($has_search)
					
					if ($category->cat_ID == 3) {
						get_sidebar( 'featured' );
					} else if ($category->cat_ID == 9) {
						get_sidebar( 'featured1' );
					}
				?>
				
				<!-- Advanced Search -->
				<?php if ($has_search): ?>
					<div id="adv_search" class="wrap">
						<form action="<?php echo get_category_link ($category->cat_ID) ?>">
							<h2>Búsqueda Avanzada</h2>
							<input type="text" id="name" name="nombre"
								value="<?php echo $nombre ?>"
								placeholder="Nombre"/>

							<?php get_template_part ('search', $category->slug); ?>

							<input class="button" type="submit" value="Buscar"/>
						</form>
					</div>
				<?php endif ?>

				<div id="container" class="wrap" role="main">
					<div id="main_content">
						<?php if ($has_search) : ?>
							<h2><?php printf( __( '%s', 'boilerplate' ), '' . single_cat_title( '', false ) . '' );?></h2>
						<?php endif; ?>
						
						<?php if ( !$loop->have_posts() ): ?>
							<h2>No hay nah, bro</h2>
						<?php else: ?>
							<div class="places-list">
								<?php if (!$has_search): ?>
									<ul class="breadcrumbs">
										<li><a href="<?php echo home_url( '/' ); ?>">Inicio</a></li>
										<li><?php printf( __( '%s', 'boilerplate' ), '' . single_cat_title( '', false ) . '' );?></li>
									</ul>
									
									<div class="featured_atractivo">
										<?php
											$featured = new WP_Query (array (
												'post_type'      => 'gc_atractivos',
												'posts_per_page' => 1,
												'orderby'        => 'rand'
											));
										?>

										<?php while ($featured->have_posts()): $featured->the_post(); ?>
											<a href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail ('atractivo-featured', array ('title'=>get_the_title())); ?></a>
										<?php endwhile; ?>

										<div class="post_sum">
											<a href="<?php the_permalink(); ?>">
												<?php the_title(); ?>
											</a>
										</div>
									</div><!-- .featured_atractivo -->
									<?php //get_sidebar( 'featured-atractivos' ); ?>
								<?php endif; ?>
							
								<ul>
									<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
										<li>
											<div class="circled">
												<div class="inside">
													<?php if (has_post_thumbnail()) : ?>
														<?php the_post_thumbnail ('thumbnail'); ?>
													<?php else : ?>
														<img src="<?php bloginfo('template_url') ?>/images/atractivos_listing_thumb_guide.png" alt="">
													<?php endif; ?>
												</div>
											</div>
											<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
											<p><?php new_excerpt(160); ?></p>
										</li>
									<?php endwhile; ?>
								</ul>

								<?php wp_pagenavi(); ?>
							</div><!-- .places-list -->
						<?php endif; ?>
					</div><!-- #main_content -->

					<div id="side_content" class="sideinfo">
						<?php if (!$has_search) : ?>
							<?php get_sidebar("recommend"); ?>
						<?php endif; ?>
						<div class="places-list">
							<?php // Get "Atractivos" section
							get_sidebar( 'atractivos' ); ?>
						</div><!-- .places-list -->
					</div><!-- #side_content -->

<?php get_footer(); ?>

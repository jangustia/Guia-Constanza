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
		$chim   = isset ($_REQUEST['chim'])   ? $_REQUEST['chim']   : FALSE;
		$pool   = isset ($_REQUEST['pool'])   ? $_REQUEST['pool']   : FALSE;
		$james  = isset ($_REQUEST['james'])  ? $_REQUEST['james']  : FALSE;
		$heat   = isset ($_REQUEST['heat'])   ? $_REQUEST['heat']   : FALSE;
		$menu   = isset ($_REQUEST['menu'])   ? $_REQUEST['menu']   : FALSE;
		$bar    = isset ($_REQUEST['bar'])    ? $_REQUEST['bar'] : FALSE;
		$tv     = isset ($_REQUEST['tv'])     ? $_REQUEST['tv']     : FALSE;
		$wifi   = isset ($_REQUEST['wifi'])   ? $_REQUEST['wifi']   : FALSE;
		
		if (!empty ($nombre))
			$query_args['meta_query'][] = array ('key' => 'nombre', 'value' => $nombre, 'compare' => 'LIKE');
		if (!empty ($tipo))
			$query_args['meta_query'][] = array ('key' => 'tipo',   'value' => $tipo,   'compare' => 'LIKE');
		if (!empty ($chim)   && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'chim',   'value' => $chim,   'compare' => 'LIKE');
		if (!empty ($pool)   && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'pool',   'value' => $pool,   'compare' => 'LIKE');
		if (!empty ($james)  && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'james',  'value' => $james,  'compare' => 'LIKE');
		if (!empty ($heat)   && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'heat',   'value' => $heat,   'compare' => 'LIKE');
		if (!empty ($menu)   && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'menu',   'value' => $menu,   'compare' => 'LIKE');
		if (!empty ($bar) && $category->slug == 'hoteles')
			$query_args['meta_query'][] = array ('key' => 'bar',    'value' => $bar,    'compare' => 'LIKE');
		if (!empty ($tv))
			$query_args['meta_query'][] = array ('key' => 'tv',     'value' => $tv,     'compare' => 'LIKE');
		if (!empty ($wifi))
			$query_args['meta_query'][] = array ('key' => 'wifi',   'value' => $wifi,   'compare' => 'LIKE');
	}
	
	$loop = new WP_Query ($query_args);
?>

				<h1 id="subheader" class="wrap"><span><?php
					printf( __( '%s', 'boilerplate' ), '' . single_cat_title( '', false ) . '' );
				?></span></h1>

				<?php // Get "Featured" section
				get_sidebar( 'featured' ); ?>
				
				<?php if ($has_search): ?>
					<div id="adv_search">
						<form action="<?php echo get_category_link ($category->cat_ID) ?>">
							<h2>Búsqueda Avanzada</h2>
							<input type="text" id="name" name="nombre"
								value="<?php echo $nombre ?>"
								placeholder="Nombre"/>
							
							<?php get_template_part ('search', $category->slug); ?>
							
							<input type="submit" value="Buscar"/>
						</form>
					</div>
				<?php endif ?>
				
				<div id="content" class="wrap" role="main">
					<?php if ( !$loop->have_posts() ): ?>
						<h2>No hay nah, bro</h2>
					<?php else: ?>
						<div id="places-list">
							<h2><?php single_cat_title(); ?></h2>
							<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<article>
									<!-- Display the Title as a link to the Post's permalink. -->
									<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									<img src="<?php bloginfo ('template_url'); ?>/images/generic_thumb.png" alt="" />
									<p><?php the_excerpt(); ?></p>
								</article>
							<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
					
					<?php // Get "Atractivos" section
					get_sidebar( 'atractivos' ); ?>
				</div>

<?php get_footer(); ?>

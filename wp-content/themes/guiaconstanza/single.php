<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header();

if ( have_posts() ) while ( have_posts() ) : the_post();

	$post_id   = get_the_ID();
	$post_type = get_post_type ($post_id);
	$category  = get_the_category();

	// Hoteles only
	if ('gc_hoteles' == $post_type) {
		$facilidades = (object) array (
			'chim'  => get_post_meta ($post_id, 'chim',  TRUE) ? 'Chimenea'      : '',
			'pool'  => get_post_meta ($post_id, 'pool',  TRUE) ? 'Piscina'       : '',
			'james' => get_post_meta ($post_id, 'james', TRUE) ? 'Juegos'        : '',
			'heat'  => get_post_meta ($post_id, 'heat',  TRUE) ? 'Agua Caliente' : '',
			'menu'  => get_post_meta ($post_id, 'menu',  TRUE) ? 'Restaurante'   : '',
			'bar'   => get_post_meta ($post_id, 'bar',   TRUE) ? 'Bar'           : '',
			'tv'    => get_post_meta ($post_id, 'tv',    TRUE) ? 'Televisión'    : '',
			'wifi'  => get_post_meta ($post_id, 'tv',    TRUE) ? 'Wirless'       : ''
		);

		$rate_title = 'Hotel';
	}

	// Bares y Restauratnes only
	if ('gc_bares_y_rests' == $post_type) {
		$facilidades = (object) array (
			//'crio'     => get_post_meta ($post_id, 'crio',     TRUE) ? 'Comida Criolla'       : '',
			//'inter'    => get_post_meta ($post_id, 'inter',    TRUE) ? 'Comida Internacional' : '',
			'tv'       => get_post_meta ($post_id, 'tv',       TRUE) ? 'Televisión'           : '',
			'wifi'     => get_post_meta ($post_id, 'wifi',     TRUE) ? 'Wireless'             : '',
			'delivery' => get_post_meta ($post_id, 'delivery', TRUE) ? 'Delivery'             : '',
			'bar'      => get_post_meta ($post_id, 'bar',      TRUE) ? 'Tragos'               : ''
		);

		$rate_title = 'Bar o Restaurante';
	}

	$address  = get_post_meta ($post_id, 'address',  TRUE);
	$phone    = get_post_meta ($post_id, 'phone',    TRUE);
	$fax      = get_post_meta ($post_id, 'fax',      TRUE);
	$email    = get_post_meta ($post_id, 'email',    TRUE);
	$website  = get_post_meta ($post_id, 'website',  TRUE);
	$geo_lat  = get_post_meta ($post_id, 'geo_lat',  TRUE);
	$geo_long = get_post_meta ($post_id, 'geo_long', TRUE);

?>
				<h1 id="subheader" class="wrap">
					<span><?php echo $category[0]->cat_name;?></span>
				</h1>

				<div id="container" class="wrap" role="main">
					<div id="main_content">
						<ul class="breadcrumbs">
							<li><a href="<?php echo home_url( '/' ); ?>">Inicio</a></li>
							<li><?php the_category(' '); ?></li>
							<li><?php the_title(); ?></li>
						</ul>
						<div id="details">
							<h2 class="fn org"><?php the_title(); ?></h2>
							<figure>
								<span>Cabañas Palofino</span>
								<img src="<?php bloginfo('template_url'); ?>/images/rancho.jpg" alt="Fotografia de unos locales en <?php echo the_title(); ?>" />
							</figure>

							<h3>Descripción</h3>
							<p><?php the_content(); ?></p>

							<h3>Facilidades</h3>
							<ul class="includes">
							<?php foreach ($facilidades as $item => $text): ?>
								<?php if (!empty ($text)): ?>
									<li class="<?php echo $item ?>"><?php echo $text ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
							</ul><!-- .includes -->

							<h3>Contacto</h3>
							<?php if (!empty ($address)): ?>
								<div id="adr"><?php echo $address; ?></div>
							<?php endif; ?>

							<ul class="clearfix">
								<?php if (!empty ($phone)): ?>
									<li id="tel" class="info"><?php echo $phone; ?></li>
								<?php endif; ?>

								<?php if (!empty ($fax)): ?>
									<li id="fax" class="info"><?php echo $fax; ?></li>
								<?php endif; ?>

								<?php if (!empty ($email)): ?>
									<li id="place-email" class="info"><?php echo $email; ?></li>
								<?php endif; ?>

								<?php if (!empty ($address)): ?>
									<li id="web" class="info">
										<a rel="external" class="url" href="<?php echo $website; ?>"><?php echo $website; ?></a>
									</li>
								<?php endif; ?>
							</ul>

						<?php if (!empty ($geo_lat) && !empty ($geo_long)): ?>
							<h3>Ubicación</h3>
							<div id="details_map" data-geo_lat="<?php echo $geo_lat; ?>" data-geo_long="<?php echo $geo_long; ?>"></div>
						<?php endif; ?>

						<section class="ratings">
							<h3>Calificar <?php echo $rate_title; ?></h3>
							<form>
								<h4>Calificación:</h4>
								<label for="excelente">
									<input name ="rating" id="excelente" type="radio" />
									<span>Excelente</span>
									<div class="rating_bar"><div style="width: 35%">&nbsp;</div></div>
									<strong>0 votos</strong>
								</label>
								<label for="masomenos">
									<input name="rating" id="masomenos" type="radio" />
									<span>Más o Menos</span>
									<div class="rating_bar"><div style="width: 35%">&nbsp;</div></div>
									<strong>0 votos</strong>
								</label>
								<label for="muybueno">
									<input name="rating" id="muybueno" type="radio" />
									<span>Muy Bueno</span>
									<div class="rating_bar"><div style="width: 35%">&nbsp;</div></div>
									<strong>0 votos</strong>
								</label>
								<label for="terrible">
									<input name="rating" id="terrible" type="radio" />
									<span>Terrible</span>
									<div class="rating_bar"><div style="width: 35%">&nbsp;</div></div>
									<strong>0 votos</strong>
								</label>
								<a href="#">Deja tu opinión</a>
							</form>
						</section>

						<?php comments_template( '', true ); ?>
					</div><!-- #details -->
				</div><!-- #main_content -->

				<div id="side_content">
					<aside class="sideinfo">
						<section class="box">
							<h3>Recomendamos</h3>

							<img src="img/generic_thumb.png" alt="" />
							<h4><a href="#">Nulla a tellus also magna imperdiet intomarte molestie vitae sed purus.</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magnanmui perdiet molestie vitae sed purus. Nulla a tellus ac mangnanmui perdiet molestie vitae sed purus.</p>
						</section>

						<section id="checkins" class="box" style="display:none">
							<h3>Check-ins Recientes</h3>
							<?php for($i=0;$i<3;$i++): ?>
							<div>
								<img src="<?php bloginfo('template_url') ?>/images/checkins_thumb.png" alt="" />
								<span class="name">Danilo Jimenez @ <a href="#">Rancho Guaraguao</a></span>
								<span class="origin">Santo Domingo - 2 days ago</span>
							</div>
							<?php endfor; ?>
						</section>

						<?php // Get "Atractivos" section
						get_sidebar( 'atractivos' ); ?>
					</aside>
				</div><!-- #side_content -->
	<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>
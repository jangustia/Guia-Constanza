<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<h1 id="subheader" class="wrap"><span><?php
					$category = get_the_category();
					echo $category[0]->cat_name;
				?></span></h1>
				<div id="content" class="wrap" role="main">
					<div id="details">
						<ul class="breadcrumbs">
							<li><a href="index.php">Inicio</a></li>
							<li><a href="hoteles.php">Hoteles</a></li>
							<li>Rancho Guaraguao</li>
						</ul>
						<h2 class="fn org">Rancho Guaraguao</h2>
						<figure>
							<span>Cabañas Palofino</span>
							<img src="<?php bloginfo('template_url') ?>/images/rancho.jpg" alt="Fotografia de unos locales en Rancho Guaraguao" />
						</figure>

						<h3>Descripción</h3>
						<p>Sed ut perspiciatis unde omnis iste natus error sit volupatetem accusantium doloremquede laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vita dicta sunt explicabo.</p>
			
						<h3>Facilidades</h3>
						<ul class="incluye">
							<li class="chim">Chimenea</li>
							<li class="pool">Piscina</li>
							<li class="juegos">Juegos</li>
							<li class="agua">Agua Caliente</li>
							<li class="rest">Restaurante</li>
							<li class="bar">Bar</li>
							<li class="tv">Televisión</li>
							<li class="wifi">Wireless</li>
						</ul>
			
						<h3>Contacto</h3>
						<div id="adr">
							Santo Domingo: Calle Guarocuya No. 461, El Millón, República Dominicana
						</div>
						<ul class="clearfix">
							<li id="tel" class="info">
								(809) 530-6192
							</li>
							<li id="fax" class="info">
								(809) 539-1553 / 1429
							</li>
							<li id="place-email" class="info">
								reservas@altocerro.com
							</li>
							<li id="web" class="info">
								<a rel="external" class="url" href="http://www.altocerro.com">www.altocerro.com</a>
							</li>
						</ul>
			
					<h3>Ubicación</h3>
					<div id="details_map"></div>
			
					<section class="ratings">
						<h3>Calificar Hotel</h3>
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

				<aside class="sideinfo">
					<section class="box">
						<h3>Recomendamos</h3>
		
						<img src="img/generic_thumb.png" alt="" />
						<h4><a href="#">Nulla a tellus also magna imperdiet intomarte molestie vitae sed purus.</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magnanmui perdiet molestie vitae sed purus. Nulla a tellus ac mangnanmui perdiet molestie vitae sed purus.</p>
					</section>
		
					<section id="checkins" class="box">
						<h3>Check-ins Recientes</h3>
						<?php for($i=0;$i<3;$i++): ?>
						<div>
							<img src="<?php bloginfo('template_url') ?>/images/checkins_thumb.png" alt="" />
							<span class="name">Danilo Jimenez @ <a href="#">Rancho Guaraguao</a></span>
							<span class="origin">Santo Domingo - 2 days ago</span>
						</div>
						<?php endfor; ?>
					</section>
		
					<section>
						<h2>Atractivos</h2>
						<?php for ($i=0;$i<6;$i++): ?>
						<article>
							<img src="img/smaller_thumb.png" alt="" />
							<h4><a href="#">Nunc convallis lectus elementum diam sodales in suscipit</a></h4>
						</article>
						<?php endfor; ?>
						<div class="skyscraper"></div>
					</section>
				</aside>

<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
<?php get_footer(); ?>
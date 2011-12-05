<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

				<h1 id="subheader" class="wrap"><span><?php
					printf( __( '%s', 'boilerplate' ), '' . single_cat_title( '', false ) . '' );
				?></span></h1>
				<div id="featured" class="wrap">
					<section id="featured_hotel">
						<h2>Hoteles Destacados</h2>
						<figure class="hotel_slide">
							<img src="<?php bloginfo('template_url') ?>/images/img_hoteles.jpg" alt="Rancho Guaraguao" />
							<figcaption>
								<h3>Rancho Guaraguao</h3>
								<p>El encanto y la magia del clima de montaña combinan armónicamente con un complejo turístico.</p>
							</figcaption>
						</figure>
					</section>
					<section id="featured_bars">
						<h2>Bares y Restaurantes</h2>
						<div class="slide">
							<h3><a href="#">Aguas Blancas Restaurant</a></h3>
							<img src="img/generic_thumb.png" alt="" />
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magna imperdiet molestie vitae sed purus.</p>
							<ul class="incluye">
								<li class="tv">Cable</li>
								<li class="wifi not-inc">Wi-Fi</li>
								<li class="delivery">Transporte</li>
								<li class="menu not-inc">Menu</li>
								<li class="drink">Tragos</li>
							</ul>
						</div>
					</section>
					<section id="featured_posts">
						<h2>Blog: La Suiza del Caribe</h2>
						<div class="slide">
							<h3><a href="#">Nulla a tellus also magna imperdiet intomarte molestie vitae sed purus</a></h3>
							<img src="img/generic_thumb.png" alt="" />
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magna imperdiet molestie vitae sed purus.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</div>
					</section>
				</div><!-- #featured -->
				<div id="content" class="wrap" role="main">
					<ul id="places-list">
						<?php while ( have_posts() ) : the_post(); ?>
							<li>
								<!-- Display the Title as a link to the Post's permalink. -->
								<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_excerpt() ?></p>
							</li>
						<?php endwhile ?>
					</ul>
					<div id="sidebar">
						<form id="adv_search">
							<h2>Busqueda Avanzada</h2>
							<input type="text" id="name" />
							<select id="type">
								<option selected="selected">Tipo</option>
								<option>Tipo 1</option>
								<option>Tipo 2</option>
								<option>Tipo 3</option>
								<option>Tipo 4</option>
								<option>Tipo 5</option>
							</select>
							<div>
								<label><input type="checkbox" />Desayuno</label>
								<label><input type="checkbox" />Wi-Fi</label>
								<label><input type="checkbox" />Piscina</label>
								<label><input type="checkbox" />Chimenea</label>
								<label><input type="checkbox" />Bar</label>
								<label><input type="checkbox" />TV</label>
								<label><input type="checkbox" />Restaurante</label>
								<label><input type="checkbox" />Area de Juego</label>
							</div>
							<input type="submit" value="Buscar" />
						</form>
						<section>
							<h2>Atractivos</h2>
							<?php for ($i=0;$i<4;$i++): ?>
							<article>
								<img src="img/generic_thumb.png" alt="" />
								<h3><a href="#">Nunc convallis lectus elementum diam sodales in suscipit</a></h3>
							</article>
							<?php endfor; ?>
							<div class="skyscraper"></div>
						</section>
					</div>
				</div>

<?php get_footer(); ?>
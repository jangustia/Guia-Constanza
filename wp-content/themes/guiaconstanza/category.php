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

				<?php // Get "Featured" section
				get_sidebar( 'featured' ); ?>

				<div id="adv_search">
					<form>
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
				</div>
				<div id="content" class="wrap" role="main">
				<?php if (have_posts()): ?>
					<div id="places-list">
						<h2><?php single_cat_title() ?></h2>
						<ul>
						<?php while ( have_posts() ) : the_post(); ?>
							<li>
								<!-- Display the Title as a link to the Post's permalink. -->
								<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p><?php the_excerpt() ?></p>
							</li>
						<?php endwhile ?>
						</ul>
					</div>
				<?php else : ?>
					<h2>No hay nah, bro</h2>
				<?php endif ?>
					<?php // Get "Atractivos" section
					get_sidebar( 'atractivos' ); ?>
				</div>

<?php get_footer(); ?>
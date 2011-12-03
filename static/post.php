<?php include('header.php'); ?>

<section id="blog">
	<h2 class="subheader wrap"><span>Blog: La Suiza del Caribe</span></h2>

	<div class="wrap content">
		<ul class="breadcrumbs">
			<li><a href="index.php">Inicio</a></li>
			<li>Blog: La Suiza del Caribe</li>
		</ul>
		<article>
			<header>
				<h1>Nunc convallis lectus elementum diam sodales in suscipit risus posuere</h1>
				<ul class="meta">
					<li>Fecha: 22 / 03 / 2011</li>
					<li>Categoría: <a href="#">Atractivos</a></li>
					<li>Etiquetas: <a href="#">Gente</a></li>
					<li>Comentarios: <a href="#">10</a></li>
				</ul>
			</header>
			<figure>
				<img src="img/blog_thumb.png" alt="" />
			</figure>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.</p>
			<p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
			<h2>Sed ut perspiciatis unde</h2>
			<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus. Mauris nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac urna. Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae, ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.</p>
			<p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper vehicula. Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada. Nunc sem lacus, accumsan quis, faucibus non, congue vel, arcu. Ut scelerisque hendrerit tellus. Integer sagittis. Vivamus a mauris eget arcu gravida tristique. Nunc iaculis mi in ante. Vivamus imperdiet nibh feugiat est.</p>
			<footer><!-- Facebook and Twitter share links --></footer>
		</article>
		<?php include('comments.php'); ?>

		<aside class="sideinfo">
			<section class="box">
				<h3>Categorias</h3>
				<ul class="categories">
					<li><a href="#">Gente</a></li>
					<li><a href="#">Gente</a></li>
					<li><a href="#">Historia</a></li>
					<li><a href="#">Historia</a></li>
					<li><a href="#">Carnaval</a></li>
					<li><a href="#">Carnaval</a></li>
					<li><a href="#">Personajes</a></li>
					<li><a href="#">Personajes</a></li>
					<li><a href="#">Clima</a></li>
					<li><a href="#">Clima</a></li>
					<li><a href="#">Monumentos</a></li>
					<li><a href="#">Monumentos</a></li>
				</ul>
			</section>

			<section class="box">
				<h3>Mas Comentadas</h3>
				<ul>
				<?php for($i=0;$i<4;$i++): ?>
					<li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing eliter</a></li>
				<?php endfor; ?>
				</ul>
			</section>
		</aside>
	<!-- Close .wrap .content in footer.php -->
<!-- Close #hotel in footer.php-->


<?php include('footer.php'); ?>
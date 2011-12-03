<?php include('header.php'); ?>

<section id="hotel">
	<h1 class="subheader wrap"><span>Hoteles</span></h1>

	<div class="wrap content">
		<section class="vcard">
			<ul class="breadcrumbs">
				<li><a href="index.php">Inicio</a></li>
				<li><a href="hoteles.php">Hoteles</a></li>
				<li>Rancho Guaraguao</li>
			</ul>
			<h2 class="fn org">Rancho Guaraguao</h2>

			<figure>
				<span>Cabañas Palofino</span>
				<img src="img/rancho.jpg" alt="Fotografia de unos locales en Rancho Guaraguao" />
			</figure>

			<h3>Descripción</h3>
			<p>Sed ut perspiciatis unde omnis iste natus error sit volupatetem accusantium doloremquede laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vita dicta sunt explicabo.</p>

			<h3>Incluye</h3>
			<ul class="incluye">
				<li class="tv">TV</li>
				<li class="wifi">Wi-Fi</li>
				<li class="delivery">Transporte</li>
				<li class="menu">Menu</li>
				<li class="drink">Drink</li>
			</ul>

			<h3>Contacto</h3>
			<div class="adr">
				<div class="street-address">Calle Guarocuya No. 461</div>
				<span class="locality">El Millon</span>, <span class="region">Santo Domingo</span>
				<div class="country-name">Republica Dominicana</div>
			</div>
			<div class="tel">
				<span class="type">Work</span> +1-809-530-6192
			</div>
			<div class="tel">
				<span class="type">Fax</span> +1-809-530-6192
			</div>
			<div class="tel">
				<span class="type">Constanza</span> +1-809-539-1553
			</div>
			<div>Email:
				<span class="email">reservas@altocerro.com</span>
			</div>
			<div>Web:
				<a rel="external" class="url" href="http://www.altocerro.com">Altocerro.com</a>
			</div>
		</section>

		<section class="map">
			<h3>Ubicación</h3>
			<figure>
				<img src="img/Hotel_Mapa.png" alt="" />
			</figure>
		</section>

		<section class="ratings">
			<h3>Calificar Hotel</h3>
			<form>
				<h4>Calificación:</h4>
				<label for="excelente"><input name ="rating" id="excelente" type="radio" /> Excelente</label>
				<label for="masomenos"><input name="rating" id="masomenos" type="radio" /> Más o Menos</label>
				<label for="muybueno"><input name="rating" id="muybueno" type="radio" /> Muy Bueno</label>
				<label for="terrible"><input name="rating" id="terrible" type="radio" /> Terrible</label>
				<a href="#">Deja tu opinión</a>
			</form>
		</section>

		<?php include('comments.php'); ?>

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
					<img src="img/checkins_thumb.png" alt="" />
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
	<!-- Close .wrap .content in footer.php -->
<!-- Close #hotel in footer.php-->

<?php include('footer.php'); ?>
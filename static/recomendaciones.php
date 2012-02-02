<?php include('header.php'); ?>

<section id="recommend">
	<h1 class="subheader wrap"><span>Recomendaciones</span></h1>

	<div class="wrap content">
		<section>
			<ul class="breadcrumbs">
				<li><a href="index.php">Inicio</a></li>
				<li>Recomendaciones</li>
			</ul>
			<h2>Conozca las recomendaciones de quienes ya han visitado Constanza. <strong>Animate a compartir tu experiencia!</strong></h2>
			<?php for($i=0;$i<8;$i++): ?>
			<article>
				<img src="<?php bloginfo('template_url') ?>/images/recomend_thumb.png" alt="" />
				<div class="box">
					<h3><a href="#">Julio Rodríguez</a></h3>
					<p>Nam sed erat. Nunc lorem risus, elementum mollis, suscipit quis, tempor ac, ante. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
					<span>Hace 5 días</span>
				</div>
			</article>
			<?php endfor; ?>
			<ul class="pagination">
				<li><a href="#">&laquo;</a></li>
				<li>1</li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li class="spacer">&#8230;</li>
				<li><a href="#">21</a></li>
				<li><a href="#">22</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
			<a class="button" href="#"><span>Añadir Recomendación</span></a>
		</section>

		<aside class="sideinfo">
			<section class="box">
				<h3>Hoteles Recomendados</h3>

				<img src="img/generic_thumb.png" alt="" />
				<h4><a href="#">Villa Pajon</a></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla a tellus ac magnanmui perdiet molestie vitae sed purus.</p>
				<ul class="incluye">
					<li class="tv">TV</li>
					<li class="wifi">Wi-Fi</li>
					<li class="delivery">Transporte</li>
					<li class="menu">Menu</li>
					<li class="drink">Drink</li>
				</ul>
			</section>

			<section>
				<h3>Atractivos</h3>
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
<!-- Close #recomend in footer.php-->
<?php include('footer.php') ?>
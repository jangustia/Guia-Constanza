<?php include('header.php'); ?>

<div id="home" class="page">
	<?php include('featured.php'); ?>

	<div class="wrap content">
		<section id="atractivos">
			<h2>Atractivos</h2>
			<?php for ($i=0;$i<4;$i++): ?>
			<article>
				<img src="img/constanza-agricultura.png" alt="" />
				<h3><a href="#">Nunc convallis lectus elementum diamadolrt sodales in suscipit risus posuere</a></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing eliter. Nulla a tellus magna imperdiet molestie vitae sepurus</p>
			</article>
			<?php endfor; ?>
			<div class="fullbanner"></div>
		</section><!-- #atractivos -->

		<section id="dondeir">
			<h2>Donde ir</h2>
			<img src="img/map_placeholder.png" alt="Mapa" />
			<div class="verticalbanner"></div>
			<div class="squarepopup"></div>
		</section>

<?php include('footer.php'); ?>

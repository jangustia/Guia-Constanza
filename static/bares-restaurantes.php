<?php include('header.php'); ?>

<section id="baresrest">
	<h1 class="subheader wrap"><span>Bares&amp;Restaurantes</span></h1>
	<?php include('featured.php'); ?>

	<div class="wrap content">
		<section>
			<h2>Hoteles</h2>
			<?php for ($i=0;$i<7;$i++): ?>
			<article>
				<img src="img/generic_thumb.png" alt="" />
				<h3><a href="#">Nunc convallis lectus elementum diamadolrt sodales in suscipit risus posuere</a></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing eliter. Nulla a tellus magna imperdiet molestie vitae sepurus</p>
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
		</section>
		<div id="adv_search">
			<form class="box">
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
					<label><input type="checkbox" />TV</label>
					<label><input type="checkbox" />Restaurante</label>
					<label><input type="checkbox" />Bar</label>
					<label><input type="checkbox" />Delivery</label>
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

<?php include('footer.php'); ?>

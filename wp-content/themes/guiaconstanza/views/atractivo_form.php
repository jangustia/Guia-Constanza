<!-- guiaconstanza/views/atractivo_form.php -->

<div class="atractivo_form">
	<h4>Ubicación</h4>
	<fieldset>
		<label>Latitud</label>
		<input type="text" name="geo_lat" value="<?php if (!empty ($geo_lat)) echo $geo_lat;?>"/>
		<label>Longitud</label>
		<input type="text" name="geo_long" value="<?php if (!empty ($geo_long)) echo $geo_long;?>"/>
	</fieldset>
</div>

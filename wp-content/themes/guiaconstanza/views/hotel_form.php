<div class="hotel_form">
	<h4>Imágenes</h4>
	<fieldset>
		<label>Imagen #1</label>
		<input type="text" name="image1" value="<?php if (!empty ($image1)) echo $image1;?>"/>
	</fieldset>
	
	<fieldset>
		<label>Imagen #2</label>
		<input type="text" name="image2" value="<?php if (!empty ($image2)) echo $image2;?>"/>
	</fieldset>
	
	<fieldset>
		<label>Imagen #3</label>
		<input type="text" name="image3" value="<?php if (!empty ($image3)) echo $image3;?>"/>
	</fieldset>
	
	<fieldset>
		<label>Imagen #4</label>
		<input type="text" name="image4" value="<?php if (!empty ($image4)) echo $image4;?>"/>
	</fieldset>
	
	<fieldset>
		<h4><label>Descripcion</label></h4>
		<textarea name="description"><?php if(!empty($description)) echo $description; ?></textarea>
	</fieldset>
	
	<h4>Incluye</h4>
	<ul>
		<li<?php if (!empty ($tv)) {?> class="selected"<?php }?>>
			<label>
				<input type="checkbox" name="tv"<?php if (!empty ($tv)) {?> checked<?php }?>/>
				Televisión
			</label>
		</li>
		<li<?php if (!empty ($wifi)) {?> class="selected"<?php }?>>
			<label>
				<input type="checkbox" name="wifi"<?php if (!empty ($wifi)) {?> checked<?php }?>/>
				Wireless
			</label>
		</li>
		<li<?php if (!empty ($delivery)) {?> class="selected"<?php }?>>
			<label>
				<input type="checkbox" name="delivery"<?php if (!empty ($delivery)) {?> checked<?php }?>/>
				Delivery
			</label>
		</li>
		<li<?php if (!empty ($menu)) {?> class="selected"<?php }?>>
			<label>
				<input type="checkbox" name="menu"<?php if (!empty ($menu)) {?> checked<?php }?>/>
				Menú
			</label>
		</li>
		<li<?php if (!empty ($tragos)) {?> class="selected"<?php }?>>
			<label>
				<input type="checkbox" name="tragos"<?php if (!empty ($tragos)) {?> checked<?php }?>/>
				Tragos
			</label>
		</li>
	</ul>
	
	<h4>Contacto</h4>
	<fieldset>
		<label>Dirección</label>
		<textarea name="address"><?php if (!empty ($address)) echo $address; ?></textarea>
	</fieldset>
	
	<fieldset>
		<label>Teléfono principal</label>
		<input type="text" name="phone" value="<?php if (!empty ($phone)) echo $phone;?>"/>
	</fieldset>
	
	<fieldset>
		<label>Fax</label>
		<input type="text" name="fax" value="<?php if (!empty ($fax)) echo $fax;?>"/>
	</fieldset>
	
	<fieldset>
		<label>Correo electrónico</label>
		<input type="text" name="email" value="<?php if (!empty ($email)) echo $email;?>"/>
	</fieldset>
	
	<fieldset>
		<label>Página Web</label>
		<input type="text" name="website" value="<?php if (!empty ($website)) echo $website;?>"/>
	</fieldset>
	
	<fieldset>
		<label>Latitud</label>
		<input type="text" name="geo_lat" value="<?php if (!empty ($geo_lat)) echo $geo_lat;?>"/>
		<label>Longitud</label>
		<input type="text" name="geo_long" value="<?php if (!empty ($geo_long)) echo $geo_long;?>"/>
	</fieldset>
</div>

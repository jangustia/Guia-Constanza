<?php
	$tipo     = isset ($_REQUEST['tipo'])     ? $_REQUEST['tipo']     : '';
	$crio     = isset ($_REQUEST['crio'])     ? $_REQUEST['crio']     : FALSE;
	$inter    = isset ($_REQUEST['inter'])    ? $_REQUEST['inter']    : FALSE;
	$tv       = isset ($_REQUEST['tv'])       ? $_REQUEST['tv']       : FALSE;
	$wifi     = isset ($_REQUEST['wifi'])     ? $_REQUEST['wifi']     : FALSE;
	$delivery = isset ($_REQUEST['delivery']) ? $_REQUEST['delivery'] : FALSE;
	$bar      = isset ($_REQUEST['bar'])      ? $_REQUEST['bar']      : FALSE;
?>
						<!-- guiaconstanza/search-bares-y-restaurantes.php -->
						
						<select id="type" name="tipo">
							<option value=""     <?php if (empty ($tipo))   {?>selected<?php }?>>Tipo</option>
							<option value="rest" <?php if ($tipo == 'rest') {?>selected<?php }?>>Restaurantes</option>
							<option value="bar"  <?php if ($tipo == 'bar')  {?>selected<?php }?>>Bares</option>
						</select>
						
						<div>
							<label><input type="checkbox" name="crio"     <?php if ($crio)     {?>checked<?php }?>/>Comida Criolla</label>
							<label><input type="checkbox" name="inter"    <?php if ($inter)    {?>checked<?php }?>/>Comida Inter.</label>
							<label><input type="checkbox" name="tv"       <?php if ($tv)       {?>checked<?php }?>/>TV</label>
							<label><input type="checkbox" name="wifi"     <?php if ($wifi)     {?>checked<?php }?>/>Wifi</label>
							<label><input type="checkbox" name="delivery" <?php if ($delivery) {?>checked<?php }?>/>Delivery</label>
							<label><input type="checkbox" name="bar"      <?php if ($bar)      {?>checked<?php }?>/>Tragos</label>
						</div>

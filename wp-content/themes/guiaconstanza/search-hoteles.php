<?php
	$tipo   = isset ($_REQUEST['tipo'])  ? $_REQUEST['tipo']  : '';
	$chim   = isset ($_REQUEST['chim'])  ? $_REQUEST['chim']  : FALSE;
	$pool   = isset ($_REQUEST['pool'])  ? $_REQUEST['pool']  : FALSE;
	$james  = isset ($_REQUEST['james']) ? $_REQUEST['james'] : FALSE;
	$heat   = isset ($_REQUEST['heat'])  ? $_REQUEST['heat']  : FALSE;
	$menu   = isset ($_REQUEST['menu'])  ? $_REQUEST['menu']  : FALSE;
	$bar    = isset ($_REQUEST['bar'])   ? $_REQUEST['bar']   : FALSE;
	$tv     = isset ($_REQUEST['tv'])    ? $_REQUEST['tv']    : FALSE;
	$wifi   = isset ($_REQUEST['wifi'])  ? $_REQUEST['wifi']  : FALSE;
?>
						<!-- guiaconstanza/search-hoteles.php -->
						
						<select id="type" name="tipo">
							<option value=""    <?php if (empty ($tipo))  {?>selected<?php }?>>Tipo</option>
							<option value="hot" <?php if ($tipo == 'hot') {?>selected<?php }?>>Hoteles</option>
							<option value="cab" <?php if ($tipo == 'cab') {?>selected<?php }?>>Cabañas</option>
							<option value="ap"  <?php if ($tipo == 'ap')  {?>selected<?php }?>>Apartamentos</option>
						</select>
						
						<div>
							<label><input type="checkbox" name="chim"  <?php if ($chim)  {?>checked<?php }?>/>Chimenea</label>
							<label><input type="checkbox" name="pool"  <?php if ($pool)  {?>checked<?php }?>/>Piscina</label>
							<label><input type="checkbox" name="james" <?php if ($james) {?>checked<?php }?>/>Juegos</label>
							<label><input type="checkbox" name="heat"  <?php if ($heat)  {?>checked<?php }?>/>Agua Caliente</label>
							<label><input type="checkbox" name="menu"  <?php if ($menu)  {?>checked<?php }?>/>Restaurante</label>
							<label><input type="checkbox" name="bar"   <?php if ($bar)   {?>checked<?php }?>/>Bar</label>
							<label><input type="checkbox" name="tv"    <?php if ($tv)    {?>checked<?php }?>/>TV</label>
							<label><input type="checkbox" name="wifi"  <?php if ($wifi)  {?>checked<?php }?>/>Wi-Fi</label>
						</div>

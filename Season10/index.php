<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WMO</title>
	<link rel="stylesheet" href="plugins/layerslider/css/layerslider.css" type="text/css">
	<script src="js/jquery.js"></script>
	<script src="js/jquery-migrate.min.js"></script>
	<!-- LAYER SLIDER -->
	<script src="plugins/layerslider/js/greensock.js" type="text/javascript"></script>
	<script src="plugins/layerslider/js/layerslider.transitions.js" type="text/javascript"></script>
	<script src="plugins/layerslider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>
	<script src="js/PIE_IE678.js" type="text/javascript"></script>
	<link rel="stylesheet" href="style.css">
</head>
<bgsound src="mp3/intro-barrack.mp3" loop="1">
<!--bgsound src="mp3/halloween.mp3" loop="1"-->
<body class="nobg"  unselectable="on" onselectstart="return false;" onmousedown="return false;">
	<div id="full-slider-wrapper">
		<div id="layerslider" style="width:100%;height:317px;">
			<div class="ls-slide" data-ls="transition2d:2;timeshift:-100;">
				<img src="images/back_bk.jpg" class="ls-bg"/>

				<!--img class="ls-l" style="top:15px;left:75%; width: 250px;" 
				data-ls="offsetxin:300;durationin:2000;offsetxout:-300;parallaxlevel:-1;" 
				src="images/halloween_ring.png" alt=""-->

				<img class="ls-l" style="top:10px;left:80%;white-space: nowrap; width:293px" 
				data-ls="offsetxin:600;durationin:1000;offsetxout:-600;parallaxlevel:4;" 
				src="images/logo_dark_shadow.png" alt="">

				<div class="ls-l big-title" style="top:220px;left:80%; white-space: nowrap; width:293px" 
				data-ls="offsetxin:400;durationin:1500;offsetxout:-600;parallaxlevel:-3;" 
				src="images/logo_dark_shadow.png" alt="">
				SEASON 10
				</div>
				<div class="ls-l intro" style="top:265px;left:80%; white-space: nowrap; width:293px" 
				data-ls="offsetxin:600;durationin:2000;offsetxout:-600;parallaxlevel:3;" 
				src="images/logo_dark_shadow.png" alt="">
				VERSION EN DESARROLLO
				</div>

				<div class="ls-l todo" style="top:20px;left:20%; white-space: nowrap; width:250px" 
				data-ls="offsetxin:600;durationin:4000;offsetxout:-600;parallaxlevel:0;" 
				src="images/logo_dark_shadow.png" alt="">
				<b>TAREAS RESTANTES</b>
				<ul>
					<li><span class="check">&#10004;</span><strike>Traducción mensajes globales</strike></li>
					<li class="progreso"><span class="notdo">X</span> [En progreso] Regalos al iniciar PJ nuevos</li>
					<li><span class="notdo">X</span> Reparar Items invisibles</li>
					<li><span class="notdo">X</span> Configurar premios de los Boss</li>
					<li><span class="notdo">X</span> Crear Spots para subir de Nive del</li>
					<li><span class="notdo">X</span> Seleccionar los horarios de cada evento</li>
					<li><span class="notdo">X</span> Configurar los premios de los eventos</li>
					<li><span class="notdo">X</span> Revisar configuracion BattleCore</li>
					<li><span class="notdo">X</span> Automatizar la migracion de cuentas antiguas</li>
					<li><span class="notdo">X</span> Habilitar la creacion de cuentas vinculadas</li>
					<li><span class="notdo">X</span> Habilitar la vinculacion de cuentas antiguas</li>
					<li><span class="notdo">X</span> Crear pagina para solicitar cuentas VIP</li>
					<li><span class="notdo">X</span> Habilitar tienda en linea</li>
					<li><span class="notdo">X</span> Permitir el canje de puntos a WMO Coins</li>
					<li><span class="notdo">X</span> Nivelar razas para PvP</li>
					<li><span class="notdo">X</span> Verficar Drop Items de QUEST's</li>
					<li><span class="notdo">X</span> Subir HP de los Mobs por Mapa</li>
					<li><span class="notdo">X</span> Configurar servidores VIP</li>

				</ul>
				</div>
			</div>
		</div>
	</div>
	<!--a href="launcher.php" style="position: absolute; left:0; top:0;"><font  size=1 color=black>.</font></a></div-->
	<script>
	jQuery( document ).ready(function() {
		jQuery("#layerslider").layerSlider({
			responsive: false,
			skin: 'noskin',
			hoverPrevNext: false,
			skinsPath: 'plugins/layerslider/skins/'
		});
	});
	</script>
	<script src="js/main.js"></script>
</body>
</html>
<pre>
<?php
require_once("sql.class.php");
$db = new mssql();
$db->open_connection();
$db->open_mysql();

$cantidad = 0;
$mes_anterior  = date('m', strtotime('now - 1 month'));
$este_mes = date("m");
$server_info = array();

//Cantidad de Usuarios en Línea
$servers_query= mssql_query("SELECT ServerName, COUNT(ConnectStat) as Cantidad FROM MEMB_STAT WHERE ConnectStat=1 GROUP BY ServerName");
while ($row = mssql_fetch_array($servers_query)) {
   if($row['ServerName'] == "Fast-Regular") {  mysql_query("UPDATE `wmo_serverinfo` SET `Value`=".$row['Cantidad']." WHERE `Key`='Midgard' "); }
   if($row['ServerName'] == "Low-Regular")  {  mysql_query("UPDATE `wmo_serverinfo` SET `Value`=".$row['Cantidad']." WHERE `Key`='Helheim' "); }
   $cantidad = $cantidad + $row['Cantidad'];
}


//VALORES DESDE MYSQL
$select_wmo_info =  mysql_query("SELECT `Key`,`Value` FROM `wmo_serverinfo` WHERE 1");
while( $row = mysql_fetch_assoc($select_wmo_info)){
    $server_info[$row['Key']] = $row['Value']; 
}

//TOTAL ONLINE MENSUAL
if($este_mes == $server_info['Mes_Actual']) {
	if($server_info['Month_Online'] < $cantidad) {
		mysql_query("UPDATE `wmo_serverinfo` SET `Value`=".$cantidad." WHERE `Key`='Month_Online' ");
	}
	mysql_query("UPDATE `wmo_serverinfo` SET `Value`=".$este_mes." WHERE `Key`='Mes_Actual' ");
}

//CASTLE SIEGE
$siege_fast = mssql_fetch_row(mssql_query("SELECT FORMAT(SIEGE_END_DATE,'yyyy/MM/dd', 'en-us'), OWNER_GUILD FROM S10_Fast_MuOnline.dbo.MuCastle_DATA"));
$siege_low = mssql_fetch_row(mssql_query("SELECT FORMAT(SIEGE_END_DATE,'yyyy/MM/dd', 'en-us'), OWNER_GUILD FROM S10_Low_MuOnline.dbo.MuCastle_DATA"));

if($siege_fast[1] != $server_info['Midgard_Siege']) { mysql_query("UPDATE `wmo_serverinfo` SET `Value`='".$siege_fast[1]."' WHERE `Key`='Midgard_Siege' "); }
if($siege_low[1] != $server_info['Helheim_Siege']) 	{ mysql_query("UPDATE `wmo_serverinfo` SET `Value`='".$siege_low[1]."' WHERE `Key`='Helheim_Siege' "); }
if($siege_fast[0] != $server_info['Siege_Date']) 	{ mysql_query("UPDATE `wmo_serverinfo` SET `Value`='".$siege_fast[0]."' WHERE `Key`='Siege_Date' "); }


$db->close_mysql();
$db->close_connection();
?>
</pre>
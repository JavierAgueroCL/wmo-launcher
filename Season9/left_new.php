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
<bgsound src="mp3/navidad.mp3" loop="1">
<!--bgsound src="mp3/halloween.mp3" loop="1"-->
<body class="nobg"  unselectable="on" onselectstart="return false;" onmousedown="return false;">
	<div id="full-slider-wrapper">
		<div id="layerslider" style="width:100%;height:317px;">
			<div class="ls-slide" data-ls="transition2d:2;timeshift:-100;">
				<img src="images/back_navidad.jpg" class="ls-bg"/>

				<!--img class="ls-l" style="top:15px;left:75%; width: 250px;" 
				data-ls="offsetxin:300;durationin:2000;offsetxout:-300;parallaxlevel:-1;" 
				src="images/halloween_ring.png" alt=""-->

				<img class="ls-l" style="top:0px;left:20%;white-space: nowrap; width:180px" 
				data-ls="offsetxin:600;durationin:500;offsetxout:-600;parallaxlevel:4;" 
				src="images/logo_dark_shadow.png" alt="">

				<img class="ls-l" style="top:90px;left:20%;white-space: nowrap; width:127px" 
				data-ls="offsetxin:600;durationin:1000;offsetxout:-600;parallaxlevel:-3;" 
				src="images/texto_feliz.png" alt="">

				<img class="ls-l" style="top:130px;left:28%;white-space: nowrap; width:221px" 
				data-ls="offsetxin:600;durationin:1500;offsetxout:-600;parallaxlevel:2;" 
				src="images/texto_navidad.png" alt="">

				<a class="ls-l button" style="top:200px;left:20%;white-space: nowrap; width:221px" 
				data-ls="offsetxin:300;durationin:2000;offsetxout:-600;parallaxlevel:-4;" 
				href="https://s9.worldmuonline.com/eventos/eventos-de-navidad/" target="_blank">
				VER EVENTO
				</a>

				
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
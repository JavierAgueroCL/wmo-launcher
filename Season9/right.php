<link rel="stylesheet" href="style.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<div class=notices>
<h3>&Uacute;LTIMAS NOTICIAS</h3>
<ul>
<?php
include("../wp-config.php");
$auto = utf8_encode("Borrador automático");
$datare = mysql_query("SELECT post_date, post_title, post_name FROM wp_posts where post_type='post' and post_title!='$auto' and post_status='publish' order by id Desc limit 0,9");

		for($i = 0; $i < 8; ++$i)
		{
				$data = mysql_fetch_row($datare);
				$actentos = utf8_decode("$data[1]");
				$texto = substr($actentos, 0, 31);
				echo "<li><a target='_blank' href='https://s9.worldmuonline.com/noticias/$data[2]/'>".$texto."</a></li>
				";

		}
		
		
		?>
</ul>
</div>
<div class=botright>
<span class=juga>Jugadores en l&iacute;nea: <span class=on>
	<?php 
		$actual = file_get_contents("http://s9p.worldmuonline.com/remote.php?g=4&u=none"); 
		$total = $actual + 21;
		echo $total;
	?>
</span>
&nbsp;&nbsp;
<!--b><a href="https://s9.worldmuonline.com/login.php" target=_blank><font color=orange>INICIAR SESI&Oacute;N</a></b--></span>
</div>
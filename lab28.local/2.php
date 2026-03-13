<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		if(!isset($_COOKIE['counter'])){
			setcookie('counter',0);
			setcookie('timeCookie',time());
			$timeDoc = "Вы зашли на страницу ".date("Y-m-d")." в
			".date("H:i:s");
			setcookie('timeDoc',$timeDoctime);
			echo $timeDoc;
		}
		else{
			setcookie('counter', ++$_COOKIE['counter']);
			$timeCookie = time()-$_COOKIE['timeCookie'];
			echo $_COOKIE['timeDoc'];
			echo "<br><br> Вы обновили страницу
			".$_COOKIE['counter']." раз,";
			echo " последнее обновление через ". $timeCookie.
			"секунд после открытия страницы";
		}
	?>
</body>
</html>
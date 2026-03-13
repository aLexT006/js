<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		session_start();
		if(!session_is_registered('hits'))
		session_register('hits');
		$hits++;
		print "Вы посетили эту страницу $hits раз";
	?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
	$data = $_SERVER['REMOTE_ADDR'];
		$file = "10-2.txt";
		if (file_exists($file)){
			$fh = fopen($file,"r");
			fclose($fh);
		}
		else print "Файл $file не найден!";
	?>
</body>
</html>

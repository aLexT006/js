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
		$filename = "somefile.txt";
		if(is_writeable($filename)){
			$fh = fopen($filename,"a+");
			$success = fwritefopen($fh,$data);
			fclose($fh);
		}
		else print "Файл $filename недоступен для записи";
	?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
		
		$filename = "somefile.txt";
		if(is_writeable($filename)){
			$fh = fopen($filename,"r");
		}
		else print "Файл $filename недоступен для чтения";
	?>
</body>
</html>
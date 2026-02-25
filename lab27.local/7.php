<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
<?php
$filename = 'f11.txt';
$fh = fopen($filename, "r") or die("Нет доступа к файлу!");
$file = fread($fh, filesize($filename));
print $file;
fclose($fh);
?>
</body>
</html>
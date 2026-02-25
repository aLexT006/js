<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$fh = fopen("f11.txt", "r");
while(! feof($fh)) {
$char = fgetc($fh);
print $char; }
fclose($fh);
?>
</body>
</html>
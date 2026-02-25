<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$fh = fopen("f12.html", "r");
$tag_temp = "<br>";
while(!feof($fh)) print fgetss($fh,2048,$tag_temp);
fclose($fh);
?>
</body>
</html>
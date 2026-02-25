<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$access = "count.txt";
$visits = @file($access); 
$k = $visits[0]; 
++$k; 
$fh = fopen($access, "w"); 
@fwrite($fh, $k);
fclose($fh); 
?>
</body>
</html>
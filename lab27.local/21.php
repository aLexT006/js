<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$ip = $_SERVER['REMOTE_ADDR'];
file_put_contents("ips.txt", $ip . "\n", FILE_APPEND);
echo "IP $ip сохранен";
?>
</body>
</html>
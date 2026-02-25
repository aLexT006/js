<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php 
date_default_timezone_set('Europe/Minsk');
echo "1 января 2024 - это " . date("l", mktime(0, 0, 0, 1, 1, 2024)); 
?>
</body>
</html>
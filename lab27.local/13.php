<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	
<?php
$data_file = "old.txt";
rename($data_file, $data_file.'old1.txt') or die("He мory
переименовать $data_file");
?>
</body>
</html>
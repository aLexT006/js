<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$a = 15;
$b = 7;
$c = 22;
$d = 18;

$max = $a;

if ($b > $max) {
    $max = $b;
}
if ($c > $max) {
    $max = $c;
}
if ($d > $max) {
    $max = $d;
}

echo "Числа: $a, $b, $c, $d<br>";
echo "Максимальное число: $max";
?>
</body>
</html>
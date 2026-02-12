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

if ($a >= $b && $a >= $c) {
    $max = $a;
} elseif ($b >= $a && $b >= $c) {
    $max = $b;
} else {
    $max = $c;
}

if ($a <= $b && $a <= $c) {
    $min = $a;
} elseif ($b <= $a && $b <= $c) {
    $min = $b;
} else {
    $min = $c;
}

$sum = $max + $min;
echo "Числа: $a, $b, $c<br>";
echo "Максимум: $max<br>";
echo "Минимум: $min<br>";
echo "Сумма max + min = $sum";
?>
</body>
</html>
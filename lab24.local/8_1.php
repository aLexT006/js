<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$x = 6; 
echo "<div style='font-size: 20px; font-weight: bold; ";
if ($x > 0) {
    echo "color: green;'>$x - положительное число (зеленый)";
} elseif ($x == 0) {
    echo "color: yellow; background-color: black;'>$x - ноль (желтый)";
} else {
    echo "color: red;'>$x - отрицательное число (красный)";
}
echo "</div>";
?>
</body>
</html>
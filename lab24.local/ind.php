<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php

// ==== НАСТРОЙКИ ====
$k = 15;           // количество строк
$n = 3;            // количество столбцов (для варианта б)
$mode = 2;         // 1 = один столбец, 2 = n столбцов

$colors = ["#ff4d4d", "#ffff66", "#66cc66"]; // 3 цвета фона

echo "<table border='1' cellpadding='8' cellspacing='0' style='border-collapse: collapse; text-align:center;'>";

// Заголовок
echo "<tr><th>Номер</th>";

if ($mode == 1) {
    echo "<th>Число</th></tr>";
} else {
    for ($j = 1; $j <= $n; $j++) {
        echo "<th>Число $j</th>";
    }
    echo "</tr>";
}

// Генерация строк
for ($i = 1; $i <= $k; $i++) {

    // Цвет фона (чередование 3 цветов)
    $bgColor = $colors[($i - 1) % 3];

    // Плавный переход цвета шрифта (от черного к белому)
    $gray = intval(255 * ($i - 1) / ($k - 1));
    $fontColor = "rgb($gray, $gray, $gray)";

    echo "<tr style='background:$bgColor; color:$fontColor;'>";

    echo "<td>$i</td>";

    if ($mode == 1) {
        echo "<td>" . rand(1, 100) . "</td>";
    } else {
        for ($j = 1; $j <= $n; $j++) {
            echo "<td>" . rand(1, 100) . "</td>";
        }
    }

    echo "</tr>";
}

echo "</table>";
?>
</body>
</html>
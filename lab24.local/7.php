<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$d=4;
switch ($d)
{
    case 1:
        echo "Понедельник\n";
        break;
    case 2:
        echo "Вторник\n";
        break;
    case 3:
        echo "Среда\n";
        break;
    case 4:
        echo "Четверг\n";
        break;
    case 5:
        echo "Пятница\n";
        break;
    case 6:
        echo "Суббота\n";
        break;
    case 7:
        echo "Воскресенье\n";
        break;
    default:
        echo "Нет такого дня\n";
}
?>
</body>
</html>
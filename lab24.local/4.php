<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$s1='тридцать восемь попугаев';
$s2='38 попугаев';
$n1=(integer)$s1;
$n2=(integer)$s2;
echo '<p>преобразование в целое число:</p>';
echo "<p>$s1--> $n1</p>";
echo '<p>'.$s2.'--> '.$n2.'</p>';
$r1=(int)$s1+5; 
$r2=(int)$s2+5; 
echo '<p>сумма:</p>';
echo "<p>$s1 + 5 = $r1</p>";
echo "<p>{$s2} + 5 = {$r2}</p>";
?>
</body>
</html>
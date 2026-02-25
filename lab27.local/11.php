<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$file_array = file("f11.txt");
foreach($file_array as $line_num => $line) {
    print "<b>Line $line_num:</b> " . htmlspecialchars($line) . "<br>";
}
?>
</body>
</html>
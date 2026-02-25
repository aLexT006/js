<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<?php
$data = $_SERVER['REMOTE_ADDR'];
$filename = "somefile.txt";

// Проверка на чтение
if(is_readable($filename)) {
    echo "Файл $filename доступен для чтения<br>";
    
    // Проверка на запись
    if(is_writeable($filename)) {
        $fh = fopen($filename, "a+");
        fwrite($fh, $data . "\n");
        fclose($fh);
        echo "IP-адрес $data записан в файл";
    } else {
        print "Файл $filename недоступен для записи";
    }
} else {
    print "Файл $filename недоступен для чтения";
}
?>
</body>
</html>
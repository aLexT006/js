<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
try {
mysqli_report(MYSQLI_REPORT_ERROR | 
MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", 
"my_db");
$sql = 'SELECT COUNT(*) FROM message';
$result = $mysqli->query($sql);
$n = $result->fetch_row()[0];
echo "$n строк<br>";
$k = 0;
$m = 5;
$sql = "SELECT id, user, message_text, messege_time
FROM message ORDER BY id DESC LIMIT $k, $m";
$result = $mysqli->query($sql);
$data = $result->fetch_all(MYSQLI_ASSOC);
foreach ($data as $row) {
echo $row['id'] . '. ' . $row['user'] . ' - ' .
$row['message_text'] . ' (' . 
$row['messege_time'] . ')<br>';
}
} catch(Throwable $e) {
echo $e->getMessage();
}
    ?>
</body>
</html>
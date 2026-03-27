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
$mysqli = new mysqli("localhost", "root", "", 
"my_db");
if ($mysqli->connect_errno) {
throw new Exception($mysqli->connect_error);
}
$sql = 'SELECT * FROM message';
if (!($result = $mysqli->query($sql))) {
throw new Exception($mysqli->error);
}
$data = $result->fetch_all(MYSQLI_ASSOC);
$result->free();
foreach ($data as $row) {
echo $row['id'] . '. ' . $row['user'] . ' - ' . 
$row['message_text'] . ' (' . 
$row['messege_time'] . ')<br/>';
}
$mysqli->close();
} catch(Exception $e) {
echo $e->getMessage();
}
    ?>
</body>
</html>
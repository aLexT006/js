<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга</title>
</head>
<body>
    <h1>Сообщения</h1>
    
    <?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    try {

        $mysqli = new mysqli("localhost", "root", "12345", "guestbook");
        

        $result = $mysqli->query("SELECT id, user, message, message_time FROM message ORDER BY id DESC");
        
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<strong>" . $row['user'] . "</strong> ";
            echo "<small>(" . $row['message_time'] . ")</small><br>";
            echo "<p>" . $row['message'] . "</p>";
            echo "</div><hr>";
        }
        
        // Закрываем соединение
        $mysqli->close();
        
    } catch (mysqli_sql_exception $e) {
        echo "Ошибка: " . $e->getMessage();
    }
    ?>
</body>
</html>
<?php
    if ($_POST["username"] == "php" && $_POST["password"] == "php") {
        session_start();
        $_SESSION["Login"] = "YES";
        echo "<h1>Вы зашли корректно</h1>";
        echo "<p><a href='7.3.php'>Ссылка на защищенный файл</a></p>"; 
    }
    else {
        session_start();
        $_SESSION["Login"] = "NO";
        echo "<h1>Вы зашли НЕкорректно </h1>";
        echo "<p><a href='7.3.php'>Ссылка на защищенный файл</a></p>"; 
    }
?>
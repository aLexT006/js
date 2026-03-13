<?php
    session_start();
    if ($_SESSION["Login"] != "YES") {
        header("Location: 7.3.php");
    } 
?>
<html>
    <head>
        <title>Логин</title>
    </head>
    <body>
        <h1>Этот документ защищен</h1>
        <p>Вы получили доступ к файлу, так как вошли в систему.</p>
    </body>
</html>
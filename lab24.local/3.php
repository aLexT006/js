<!-- book_example.php -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пример из книги</title>
</head>
<body>

<?php
// Определение переменных (со стр. 387)
$tit = "Внедрение PHP в HTML";
// CSS стили в переменной
$CSS = "a {text-decoration: none;}
        td {width: 20%;}";

// Функция вывода заголовка (со стр. 387)
function display_head($tit, $CSS) {
    echo "<html><head><meta charset='UTF-8'><title> $tit </title>";
    echo "<style type='text/css'> $CSS </style></head><body>";
    echo "<h3>" . $tit . "</h3>"; // Добавил вывод заголовка для наглядности
}

// Функция вывода тела страницы (со стр. 387-388)
function display_body() {
    echo "<table border='1' width='100%'>
          <tr align='center'>";
    
    // Ссылки из таблицы на стр. 388
    echo "<td><a href='history.html'>История</a></td>";
    echo "<td><a href='admin.html'>Администрация</a></td>";
    echo "<td><a href='process.html'>Дневное отделение</a></td>";
    echo "<td><a href='otherspec.html'>Заочное отделение</a></td>";
    echo "<td><a href='educational.html'>Воспитательная работа</a></td>";
    
    echo "</tr>
          </table>";
    echo "</body></html>";
}

// Основной вызов (со стр. 388)
display_head($tit, $CSS);
display_body();
?>

</body>
</html>
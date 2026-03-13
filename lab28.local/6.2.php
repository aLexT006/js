<?php
    // session_start();
    // if(!session_is_registered('hits'))
    // session_register('hits');
    // $hits++;
    // print "Вы посетили эту страницу $hits раз";
    
    session_start();
    if (!isset($_SESSION['hits'])) {  
        $_SESSION['hits'] = 0;
    }
    $_SESSION['hits']++;
    echo "Вы посетили эту страницу " . $_SESSION['hits'] . " раз";
?>
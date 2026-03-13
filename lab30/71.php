<?php 
$to = 'PSSIP@gmail.com';
$subject = "Test";
$message = '<html><head>
    <title>Тест рассылка</title>
    </head></html>';

$headers = 'From: milenapavlovihc14@gmail.com'."\r\n";
            'X-Mailer: PHP/' . phpversion();
            'MIME-Version: 1.0'."\r\n";
if (mail($to, $subject, $message, $headers)) 
    echo "Письмо с темой ".$subject." на адрес ".$to." отправленно";
?>
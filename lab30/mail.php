<?php 
$to = 'PSSIP@gmail.com';
$subject = "Test";
$message = "Здравствуйте!\r\n Вы подписались на рассылку\r\n по ПССИП";
$message = wordwrap($message, 70, "\r\n");
$headers = 'From: milenapavlovihc14@gmail.com'."\r\n".
'X-Mailer: PHP/' . phpversion();
if (mail($to, $subject, $message, $headers)) 
    echo "Письмо с темой ".$subject." на адрес ".$to." отправленно";
?>
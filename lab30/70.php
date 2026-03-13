<?php 
$to = 'aleksandra@tut.by';
$subject = "Test";
$message = "Здравствуйте!\r\n Вы подписались на рассылку\r\n по ПССИП";
$message = wordwrap($message, 70, "\r\n");  // исправлено: wordwrap вместо wordrap
$headers = 'From: PSSIP@tut.by' . "\r\n" . 'X-Mailer: PHP/' . phpversion();  // исправлено: From вместо Form
if(mail($to, $subject, $message, $headers))
    echo "Письмо с темой ".$subject." на адрес ".$to." отправлено";
?>

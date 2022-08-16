<?php
 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
 
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/PHPMailer.php";

$mail = new PHPMailer(true); /* Создаем объект MAIL */

$mail->CharSet = "UTF-8"; /* Задаем кодировку UTF-8 */
$mail->IsHTML(true); /* Разрешаем работу с HTML */
 
$name = $_POST["name"]; /* Принимаем имя пользователя с формы .. */
$email = $_POST["email"]; /* Почту */
$message = $_POST["message"]; /* Сообщение с формы */
$email_template = "template_mail.html"; /* Считываем файл разметки */

$body = file_get_contents($email_template); /* Сохраняем данные в $body */
$body = str_replace('%name%', $name, $body); /* Заменяем строку %name% на имя */
$body = str_replace('%email%', $email, $body); /* строку %email% на почту */
$body = str_replace('%message%', $message, $body); /* строку %message% на сообщение*/

$mail->addAddress("thetop2022rating@outlook.com"); /* Здесь введите Email, куда отправлять */
$mail->setFrom($email);
$mail->Subject = "[Contac Us - Hotstarburstslots.com/DK]"; /* Тема письма */
$mail->MsgHTML($body);
 
/* Проверяем отправлено ли сообщение */
if (!$mail->send()) {
  $message = "Error. Please try later";
  echo $message;
} else {
    $message = "Thank you!";
    header('location: index.html');
}

?>
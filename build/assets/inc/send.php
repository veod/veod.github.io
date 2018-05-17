<?php
header("HTTP/1.1 403 Forbidden" );
require_once 'vars.php';
// Проверяем значения, полученные при проверке скриптом формы
if (trim($_POST['norobot'])!='norobot_true') {
	echo 'false';
}
else {
	$txtname = trim($_POST['txtname']);

	$txtNameValue = trim($_POST['name_class_value']);
	
	$txtphone = trim($_POST['txtphone']);

	// от кого
	$fromMail = "example@example.com";
	$fromName = "{$manufacturer}";

	// Сюда введите Ваш email
	$emailTo = "{$email}";

	$subject = 'Заявка на звонок с сайта: ' . $_SERVER['HTTP_REFERER'];
	$subject = '=?utf-8?b?'. base64_encode($subject) .'?=';
	$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
	$headers .= "From: ". $fromName ." <". $fromMail ."> \r\n";

	// тело письма
	$body = "Получено письмо с сайта " . $_SERVER['HTTP_REFERER'] . "\n\nИмя: $txtname\nТелефон: $txtphone";
	$mail = mail($emailTo, $subject, $body, $headers, '-f'. $fromMail );
	echo 'ok';
}
?>
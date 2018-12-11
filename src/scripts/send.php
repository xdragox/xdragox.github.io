<?php
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	
header('Content-Type: text/html; charset=UTF-8');

mb_internal_encoding('UTF-8'); 
mb_http_output('UTF-8'); 
mb_http_input('UTF-8'); 
mb_regex_encoding('UTF-8'); 

sleep(2);

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {

  if(trim($_POST['name']) == '') {
  $hasError = true;
  } else {
  $name = trim($_POST['name']);
  }
  
  if(trim($_POST['email']) == '')  {
  $hasError = true;
  } else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
  $hasError = true;
	echo "Ошибка, адрес электронной почты введен не правильно";
  } else {
  $email = trim($_POST['email']);
  }

  if(trim($_POST['message']) == '') {
  $hasError = true;
  } else {
  if(function_exists('stripslashes')) {
  $message = stripslashes(trim($_POST['message']));
  } else {
  $message = trim($_POST['message']);
  }
  }

  if(!isset($hasError)) {
    $to = "a@web-testing24.ru";
    $subject= "Message from truebook";
    $header="From: truebook@web-testing24.ru";
    $header.="\nContent-type: text/plain; charset=\"utf-8\"";
	
    $message = "BHTML \r\nEmail: $email \nИмя: $name \n\nТекс сообщения:\n$message";
	
    //mail($to, $subject, $message, $header);

    $emailSent = true;
    echo "* Сообщение отправлено";
  }
}else {
    echo "* Ошибка, письмо не отправлено";
}

}
?>
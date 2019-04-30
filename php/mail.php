<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="onlyzoran@gmail.com"; //"yourmail@yoursite.com";
  $emailTo1 ="nikitantonenko@gmail.com";
  $emailTo2 ="bs@beznal-srazy.ru";


  //from email adress
  $emailFrom ="bs@beznal-srazy.ru"; //"contact@yoursite.com";

  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $siteurl = $_POST["siteurl"];

  //email subject
  $emailSubject = "Заявка с сайта $siteurl";

  if($name == "")
   $data['success'] = false;

   if($phone == "")
   $data['success'] = false;

 if($data['success'] == true){
  $message = "<b>Сайт:</b> $siteurl<br>
  <b>Фамилия, имя:</b> $name<br>
  <b>Телефон:</b> $phone";

  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);
  mail($emailTo1, $emailSubject, $message, $headers);
  mail($emailTo2, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}
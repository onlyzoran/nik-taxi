<?php

include 'functions.php';

if (!empty($_POST)){

  $data['success'] = true;
  $_POST  = multiDimensionalArrayMap('cleanEvilTags', $_POST);
  $_POST  = multiDimensionalArrayMap('cleanData', $_POST);

  //your email adress 
  $emailTo ="onlyzoran@gmail.com"; //"yourmail@yoursite.com";
  $emailTo1 ="ds@dsotnikov.ru"; //"yourmail@yoursite.com";


  //from email adress
  $emailFrom ="mail@beznal-srazy.ru"; //"contact@yoursite.com";

  //email subject
  $emailSubject = "Заявка с сайта";

  $name = $_POST["name"];
  $phone = $_POST["phone"];
  $siteurl = $_POST["siteurl"];

  if($name == "")
   $data['success'] = false;

   if($phone == "")
   $data['success'] = false;

 if($data['success'] == true){
  $message = "Фамилия, имя: $name<br>
  Телефон: $phone<br>
  $siteurl<br>ss";


  $headers = "MIME-Version: 1.0" . "\r\n"; 
  $headers .= "Content-type:text/html; charset=utf-8" . "\r\n"; 
  $headers .= "From: <$emailFrom>" . "\r\n";
  mail($emailTo, $emailSubject, $message, $headers);
  mail($emailTo1, $emailSubject, $message, $headers);

  $data['success'] = true;
  echo json_encode($data);
}
}
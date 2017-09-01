<?php
  
$radio = hsc($_POST['radio']);
if(empty($radio)){
  //エラーだったらメッセージを配列に入れる
  $error['radio'] = "選択されていません!!!";
}else{
	switch($radio){
    case "contact":
      $radio_text = "お問い合わせ";
      break;
    
    case "document":
      $radio_text = "資料請求";
      break;
    
    default:
      $radio_text = "";
      //エラーだったらメッセージを配列に入れる
      $error['radio'] = "不正な値です!!!";
      break;
  }
}

$checkbox = $_POST['checkbox'];
if(empty($checkbox)){
  //エラーだったらメッセージを配列に入れる
  $error['checkbox'] = "選択されていません!!!";
}

$name = hsc($_POST['name']);
if(empty($name)){
  //エラーだったらメッセージを配列に入れる
  $error['name'] = "値が空です!!!";
}

$mail = hsc($_POST['mail']);
if(empty($mail)){
  //エラーだったらメッセージを配列に入れる
  $error['mail'] = "値が空です!!!";
  			
}else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+\.([a-zA-Z]{2,3})$/", $mail)){
  //エラーだったらメッセージを配列に入れる
  $error['mail'] = "メールの形式が正しくありません!!!";
}

$tel = hsc($_POST['tel']);
if(empty($tel)){
  //エラーだったらメッセージを配列に入れる
  $error['tel'] = "値が空です!!!";
}else if(!preg_match("/^(0{1}\d{1,4}-{0,1}\d{1,4}-{0,1}\d{4})$/", $tel)){
	$error['tel'] = "電話番号の形式が正しくありません!!!";
}

$company = hsc($_POST['company']);
if(empty($company)){
  //エラーだったらメッセージを配列に入れる
  $error['company'] = "値が空です!!!";
}

$textarea = hsc($_POST['textarea']);
if(empty($textarea)){
  //エラーだったらメッセージを配列に入れる
  $error['textarea'] = "値が空です!!!";
}
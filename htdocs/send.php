<?php
  
  function hsc($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	}
	
	$error = array();
	
	if(!$_POST){
    header("location: err.php");
    exit();
	}else{
  	//値の取得とバリデーション
  	
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
  	if(empty($name)){
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
		
    if(count($error) === 0){
      //エラーがなければ送信
      
      //メール送信
      mb_language("Japanese");
      mb_internal_encoding("UTF-8");
      
      //送信内容
      $to = 'inoue@codecodeweb.com';
      $subject = 'お問い合わせ';
      
      $body = <<< EOF
{$name}様からお問い合わせがありました。

------------------------------------
お名前：{$name}
メールアドレス：{$mail}
電話番号：{$tel}
会社名：{$company}
メッセージ：
{$textarea}
------------------------------------
EOF;
    
    $headers = 'From: example@example.com' . "\r\n";
    
    //送信
    mb_send_mail($to, $subject, $body, $headers);
    
    
    
    //自動送信メール
      $auto_to = $mail;
      $auto_subject = 'お問い合わせありがとうございます。';
      
      $auto_body = <<< EOF
お問い合わせ内容の確認です。

------------------------------------
お名前：{$name}
メールアドレス：{$mail}
電話番号：{$tel}
会社名：{$company}
メッセージ：
{$textarea}
------------------------------------
EOF;
    
      $auto_headers = 'From: example@example.com' . "\r\n";
      
      //送信
      mb_send_mail($auto_to, $auto_subject, $auto_body, $auto_headers);
      
      //サンクスページに移動
      header("location: thanks.php");
    }else{
      //エラーがあればエラーページにリダイレクト
      header("location: err.php");
      exit();
    }
    
    
	}
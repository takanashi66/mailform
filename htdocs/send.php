<?php
  
  function hsc($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	}
	
	$error = array();
	
	if(!$_POST){
    header("location: err.php");
    exit();
	}else{
  	
  	//バリデーション呼び出し
		require_once '_validation.php';
		
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
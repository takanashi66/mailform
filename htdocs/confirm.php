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
		
		$flg = hsc($_POST['flg']);
		
		//連想配列のキーを変数にして、値を入れる
/*
    foreach ($_POST as $key => $val){
      //$keyの前に$をつけると配列のkeyを変数として宣言できる
      $$key = $val;
    }
*/
    if($flg == 1){
      require_once 'index.php';
    }else{
      if(count($error) === 0){
        //エラーがなければ確認画面(confirmation_view.php)を表示
        require_once 'confirm_view.php';
      }else{
        //エラーがあればフォーム(index.php)に戻る
        require_once 'index.php';
      }
    }
    
    
	}
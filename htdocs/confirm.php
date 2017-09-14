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
  	
		
		$flg = hsc($_POST['flg']);
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
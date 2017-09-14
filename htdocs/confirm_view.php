<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="common/css/style.css">
  <title>確認画面 | お問い合わせ</title>
</head>
<body>
  <div class="form">
    <table class="confirm_view">
      <tr>
        <th>お問い合わせ内容</th>
        <td><?php echo $radio_text; ?></td>
      </tr>
      <tr>
        <th>お問い合わせ種別</th>
        <td>
          <?php
            $tmp = $checkbox;
            foreach($checkbox as $checkbox_val){
              switch($checkbox_val){
                case "estimate":
                  echo "お見積もり";
                  break;
                
                case "question":
                  echo  "質問";
                  break;
                  
                case "other":
                  echo  "その他";
                  break;
                
                default:
                  $radio_text = "";
                  //エラーだったらメッセージを配列に入れる
                  $error['radio'] = "不正な値です!!!";
                  break;
              }
              
              if(next($tmp)){
                echo ", "; //最後以外出力
              }
            }
          ?>
        </td>
      </tr>
      <tr>
        <th>名前</th>
        <td><?php echo $name; ?></td>
      </tr>
      <tr>
        <th>メールアドレス</th>
        <td><?php echo $mail; ?></td>
      </tr>
      <tr>
        <th>電話番号</th>
        <td><?php echo $tel; ?></td>
      </tr>
      <tr>
        <th>会社名</th>
        <td><?php echo $company; ?></td>
      </tr>
      <tr>
        <th>メッセージ</th>
        <td><?php echo $textarea; ?></td>
      </tr>
    </table>
    <form action="confirm.php" method="post">
      <input type="hidden" name="flg" value="1">
      <input type="hidden" name="radio" value="<? echo $radio; ?>">
      <input type="hidden" name="checkbox_arry" value='<? echo serialize($checkbox); ?>'>
      <input type="hidden" name="name" value="<? echo $name; ?>">
      <input type="hidden" name="mail" value="<? echo $mail; ?>">
      <input type="hidden" name="tel" value="<? echo $tel; ?>">
      <input type="hidden" name="company" value="<? echo $company; ?>">
      <input type="hidden" name="textarea" value="<? echo $textarea; ?>">
      <input type="submit" value="戻って修正">
    </form>
    
    <form action="send.php" method="post">
      <input type="hidden" name="name" value="<? echo $name; ?>">
      <input type="hidden" name="mail" value="<? echo $mail; ?>">
      <input type="hidden" name="tel" value="<? echo $tel; ?>">
      <input type="hidden" name="company" value="<? echo $company; ?>">
      <input type="hidden" name="textarea" value="<? echo $textarea; ?>">
      <input type="submit" value="送信">
    </form>
  </div>
  <!-- /.form -->
</body>
</html>
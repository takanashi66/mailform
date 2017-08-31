<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="common/css/style.css">
  <title>お問い合わせ</title>
</head>
<body>
  <div class="form">
    
    <form action="confirm.php" method="post">
      
      <input type="text" name="name" placeholder="名前" value="<? echo isset($name) ? $name : ''; ?>">
      <?php
        if(isset($error) && !empty($error['name'])){
          echo'<p class="err">'.$error['name'].'</p>';
        }
      ?>
      
      <input type="email" name="mail" placeholder="メールアドレス" value="<? echo isset($mail) ? $mail : ''; ?>">
      <?php
        if(isset($error) && !empty($error['mail'])){
          echo'<p class="err">'.$error['mail'].'</p>';
        }
      ?>
      
      <input type="tel" name="tel" placeholder="電話番号" value="<? echo isset($tel) ? $tel : ''; ?>">
      <?php
        if(isset($error) && !empty($error['tel'])){
          echo'<p class="err">'.$error['tel'].'</p>';
        }
      ?>
      
      <input type="text" name="company" placeholder="会社名" value="<? echo isset($company) ? $company : ''; ?>">
      <?php
        if(isset($error) && !empty($error['company'])){
          echo'<p class="err">'.$error['company'].'</p>';
        }
      ?>
      
      <textarea name="textarea" id="" cols="30" rows="10" placeholder="メッセージ"><? echo isset($textarea) ? $textarea : ''; ?></textarea>
      <?php
        if(isset($error) && !empty($error['textarea'])){
          echo'<p class="err">'.$error['textarea'].'</p>';
        }
      ?>
      
      <input type="submit" value="送信">
      
    </form>
  </div>
  <!-- /.form -->
</body>
</html>
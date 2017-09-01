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
      
      <div class="radio">
        <input type="radio" id="contact" name="radio" value="contact" 
        <?php
          if(isset($radio) && $radio == "contact"){
            echo "checked";
          }
        ?>
        ><label for="contact">お問い合わせ</label>
        <input type="radio" id="document" name="radio" value="document" 
        <?php
          if(isset($radio) && $radio == "document"){
            echo "checked";
          }
        ?>
        ><label for="document">資料請求</label>
      </div>
      
      <?php
        if(isset($error) && !empty($error['radio'])){
          echo'<p class="err">'.$error['radio'].'</p>';
        }
      ?>
      
      <div class="checkbox">
        <input type="checkbox" id="checkbox1" name="checkbox[]" value="estimate" <?php if(!empty($_POST['checkbox_array']) && in_array("estimate", unserialize($_POST['checkbox_array']))) echo "checked" ?>><label for="checkbox1">見積もり</label>
        <input type="checkbox" id="checkbox2" name="checkbox[]" value="question" <?php if(!empty($_POST['checkbox_array']) && in_array("question", unserialize($_POST['checkbox_array']))) echo "checked" ?>><label for="checkbox2">質問</label>
        <input type="checkbox" id="checkbox3" name="checkbox[]" value="other" <?php if(!empty($_POST['checkbox_array']) && in_array("other", unserialize($_POST['checkbox_array']))) echo "checked" ?>><label for="checkbox3">その他</label>
      </div>
      <?php
        if(isset($error) && !empty($error['checkbox'])){
          echo'<p class="err">'.$error['checkbox'].'</p>';
        }
      ?>
      
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
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
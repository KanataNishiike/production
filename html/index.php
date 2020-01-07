<?php
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "utf-8");
}
/* sessionを利用 */
session_start();
/* 空文字を入れておく */
  $name = '';
  $email = '';
  $message = '';
  $name_error = '';
  $email_error = '';
  $message_error = '';
/* 初回はsessionの値が無い⇒undefinedなので@でエラー回避する(応急策) */
  $name = @$_SESSION['name'];
  $email = @$_SESSION['email'];
  $message = @$_SESSION['message'];
/* エラー */
  $name_error = @$_SESSION['name_error'];
  $email_error = @$_SESSION['email_error'];
  $message_error = @$_SESSION['message_error'];
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>お問合せフォーム</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
<h1>メールフォーム</h1>
<form action="check.php" method="post">
<table>
  <tr>
    <th><label for="name">お名前</label><br><small>(20文字以内)</small></th>
    <td><input type="text" name="name" id="name" value=<?php echo($name); ?>><?php if(!empty($name_error)){echo "<span>{$name_error}</span>";}?></td>
  </tr>
  <tr>
    <th><label for="email">Eメール</label><br><small>(50文字以内)</small></th>
    <td><input type="text" name="email" id="email" value=<?php echo ($email); ?>><?php if(!empty($email_error)){ echo '<span>',$email_error,'<span>';}?>
    </td>
  </tr>
  <tr>
    <th><label for="message">お問合せ</label><br><small>(150文字以内)</small></th>
    <td><textarea name="message" id="message"><?php echo($message); ?></textarea><?php if(!empty($message_error)){ echo '<span>',$message_error,'<span>';}?>
    </td>
  </tr>
</table>
<input type="submit" value="確認" id="submit">
</form>
</div>
</body>
</html>

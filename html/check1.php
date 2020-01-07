<?php
/* htmlspecialcharsを使いやすくするために自作関数化 */
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "utf-8");
}
/* フォーム情報がない場合index.phpにリダイレクト */
if( !(isset($_POST['name'])) || !(isset($_POST['email'])) || !(isset($_POST['message']))){
  header('Location:index.php');
  exit;
}
/* 変数に格納 */
  $name = ($_POST["name"]);
  $email = ($_POST["email"]);
  $message = ($_POST["message"]);

/* エラー時のフラグと表示する文言を格納する変数 */
  $success = true;
  $name_error = '';
  $email_error = '';
  $message_error = '';
/* メールアドレスに@が入っているか */
  if(strpos($email,'@') === false){
    $email_error = '@マークが入力されていません';
    $success = false;
}
/* メールアドレスが全角文字 */
  if(strlen($email) != mb_strlen($email,'utf-8')){
    $email_error = 'メールアドレスに全角文字が含まれています';
    $success = false;
}
/*文字数チェック*/
  if(mb_strlen($name,'utf-8') > 20){ $name_error =  'お名前が長すぎます';  $success = false;}
  if(mb_strlen($email,'utf-8') > 50){ $email_error =  'メッセージが長すぎます';  $success = false;}
  if(mb_strlen($message,'utf-8') > 150){ $message_error =  'お問い合わせ内容が長すぎます';  $success = false;}
/* もし変数の中身が空なら */
  if(empty($name)){ $name_error = '名前が入力されていません';  $success = false;}
  if(empty($email)){ $email_error = 'メールアドレスが入力されていません';  $success = false;}
  if(empty($message)){ $message_error = 'お問合せ内容が入力されていません';  $success = false;}
/* セッションを使う⇒入力内容 */
session_start();
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['message'] = $_POST['message'];
  $_SESSION['success'] = $success;
/* セッションを使う⇒エラー内容 */
  $_SESSION['name_error'] = $name_error;
  $_SESSION['email_error'] = $email_error;
  $_SESSION['message_error'] = $message_error;
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>入力内容の確認</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="container">
<h1>入力内容の確認</h1>
<table>
<tr><th>お名前</th><td><?php echo h($name); echo '<span>',h($name_error),'</span>'; ?></td></tr>
<tr><th>Eメール</th><td><?php echo h($email); echo '<span>',h($email_error),'</span>'; ?></td></tr>
<tr><th>お問合せ</th><td><?php echo nl2br(h($message)); echo '<span>',h($message_error),'</span>'; ?></td></tr>
</table>
<div id="lastBtn">
<p><a href="index.php" >戻る</a></p>
<?php
  if($success){
    echo '<p><a href="send.php">送信</a></p>';
  }
?>
</div>
</div>
</body>
</html>

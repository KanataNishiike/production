<?php
/* セッションを利用 */
  session_start();
/* 直接アクセスされたときindex.phpにリダイレクト */
  $success = $_SESSION['success'];
    if( !$success ){
        header('Location:index.php');
        exit;
  }
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $message = $_SESSION['message'];
/* サーバからメールを送信 */
  mb_send_mail('k_nakanishi@queserser.co.jp', 'お問い合わせメール', $name.$email.$message);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>無題ドキュメント</title>
</head>
<body>
<h1>お問合せメールを送信しました</h1>
<p>お問合せありがとうございました。</p>
<p><a href="index.php" >トップへ戻る</a></p>
</body>
</html>

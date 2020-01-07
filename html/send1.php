<html>
<head>
  <meta charset="utf-8" />
  <title>Complete!</title>
  <link rel="stylesheet" type="text/css" href="css/send.css">
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui.js"></script>

<script>
  setTimeout(function(){
 window.location.href = 'https://nakanishi.qss-system.net';
}, 3*1000);
</script>

</head>
<body>
  <?php
  $message = "名前：" . $_POST["name"] . "\n本文：" . $_POST["message"];
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");
  if (!mb_send_mail("@queserser.co.jp", $_POST["subject"], $message, "From:
  " . $_POST["mail"])) {
  exit("error");
  }
  ?>
  <div class="text" style="text-align:center; margin-top:300px;">
    <p>Your e-mail has been sent!</p>
  </div>
</body>
</html>

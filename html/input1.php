<?php
if ($_POST["mode"] !== "") {$mode = $_POST["mode"];}
// データ書き込み
if ($mode == "write") {
	$write_text = $_POST["write_text"];
	$write_text = mb_convert_encoding ($write_text, "UTF-8", all);
	$write_text = preg_replace("/\n/", "<br />", $write_text);

	$fo = fopen ("../topics_data.php", "w") or die ("ファイル書き込めないンゴ...\n");
	flock ($fo, LOCK_EX);
	fwrite ($fo, $write_text);
	flock ($fo, LOCK_UN);
	fclose ($fo);
}

// データ読み込み
$fr = fopen ("../topics_data.php", "r") or die ("ファイル読み込めないンゴ...\n");
$read_text = stream_get_contents ($fr);
fclose ($fr);
$read_text = mb_convert_encoding ($read_text, "UTF-8", all);
$read_text = preg_replace("/<br \/>/", "", $read_text);
?>

<html lang="ja">
<head>
<meta charset="UTF-8">
<title>入力入力ッ！</title>
</head>
<body>
<form name="inputForm" action="input.php" method="post">
<input type="hidden" name="mode" value="write">
<h1>●入力フォーーーム</h1>
  <textarea id="editor" name="write_text"><?php echo $read_text;?></textarea>
  <input type="submit" value="送信ッ！">
</form>
<script src="ckeditor/ckeditor.js"></script>
  <script>
    // エディタへの設定を適用する
    CKEDITOR.replace('editor', {
      uiColor: '#EEEEEE',
      height: 500,
    });
  </script>
</body>
</html>

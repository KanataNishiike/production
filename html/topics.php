<html>
<head>
<meta http-equiv="Content-Type" charset="UTF-8">
<title>表示部分</title>
<style type="text/css">

html{
  border-style:none;
}
body{
  border-style:none;
}

</style>
</head>
<body scroll="no" topmargin="0" leftmargin="0">
<span style="font-size:12px; line-height:1.3; color:#666;">
<?php
$read_text = file_get_contents ("topics_data.php") or die ("read file error...\n");
echo $read_text;
?>
</span>
</body>
</html>

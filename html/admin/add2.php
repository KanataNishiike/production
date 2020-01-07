<?php
session_start();

include_once('../includes/connection.php');

if (isset($_SESSION[logged_in])){
  if (isset($_POST['title'],$_POST['word'],$_POST['content'])){
      $title = $_POST['title'];
      $word = $_POST['word'];
      $content = $_POST['content'];

      if (empty($title) or empty($word) or empty($content)){
        $error = '未入力があるお！';
      } else {
        $query =$pdo->prepare('INSERT INTO articles (article_title,article_word,article_content,article_timestamp) VALUES (?,?,?,?)');

        $query->bindValue(1,$title);
        $query->bindValue(2,$word);
        $query->bindValue(3,$content);
        $query->bindValue(4,time());

        $query->execute();

        header('Location:index.php');
      }
  }

  ?>

  <html>
    <head>
      <title>製作所</title>
      <link rel="stylesheet" href="add.css">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="//cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    </head>

    <body>
      <div class="container">
        <h4>記事の投稿</h4>
        <?php if (isset($error)){ ?>
          <small style="color:#aa0000; padding-left:50px;"><?php echo $error; ?></small>
        <?php } ?>

        <form action="add.php" method="post" autocomplete="off">
          <div class="input">
            <label class="title">
              <input type="text" name="title" placeholder="たいとる！" /><br />
            </label>
          </div>
          <div class="input">
            <label class="word">
              <input type="text" name="word" placeholder="みだし！" /><br />
            </label>
          </div>
          <textarea id="editor" placeholder="ないよう！" name="content" style="margin-bottom:30px;"></textarea>
          <br/>
          <input type="submit" class="btn" value="押！" />
        </form>
        <script src="ckfinder/ckfinder.js"></script>
        <script type="text/javascript">
        CKFinder.setupCKEditor();
          CKEDITOR.replace('editor', {
            uiColor: '#EEEEEE',
            height: 500,
            width:1077,
            filebrowserBrowseUrl: '/admin/ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: '/admin/ckfinder/ckfinder.html?Type=Images',
            filebrowserUploadUrl: '/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserWindowWidth : '1000',
            filebrowserWindowHeight : '700'
          });
        </script>
          <br />
          <br />
    <p
    style="
      padding-bottom: 26px;
      right: 30px;
      position: fixed;
      bottom: 10px;">
    <a href="index.php" class="btn1">＞機能一覧</a></p>
    <a href="add1.php">＞裏ステージZ</a>

      </div>
    </body>
  <html>

  <?php
} else {
    header('Location: index.php');
}
 ?>

<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/article.php');

$article = new Article;

if (isset($_SESSION['logged_in'])){
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM articles WHERE article_id = ? ');
    $query->bindValue(1,$id);
    $query->execute();
    $row = $query->fetch();
    if(empty($row)) {
      // エラー処理
      exit;
    }

    $title = $row['article_title'];
    $content = $row['article_content'];
}

    if (isset($_POST['id'])){
        $id = $_POST['id'];
        $query = $pdo->prepare('DELETE FROM articles WHERE article_id = ?');
        $query->bindValue(1,$id);
        $query->execute();
        header('Location: delete.php');
    }

    $articles = $article->fetch_all();
?>

    <html>
      <head>
        <title>削除</title>
        <link rel="stylesheet" href="delete.css">

      </head>

      <body style="margin:0;">
        <div class="list">
          <br />

          <h4>削除したい記事を選んでください:</h4>
          <form action="delete.php" method="get">
            <select name="id">
              <?php foreach ($articles as $article) { ?>
                <option value="<?php echo $article['article_id'];?>">
                    <?php echo $article['article_title']; ?>
                </option>
              <?php } ?>
            </select>
            <input type="submit" value="表示">
          </form>

          <form action="delete.php" method="post" autocomplete="off">
            <input type="text" name="id" value="<?php echo $id; ?>"  style="visibility:hidden;"/><br />
            <p>タイトル：<?php echo $title; ?></p>
            <textarea id="editor" name="content" style="margin-bottom:30px;"><?php echo $content; ?></textarea>
            <br/>
            <input type="submit" class="btn1" value="削除" style="background-color:#000; border:#000; margin-top:40px; margin-bottom:70px;" />
          </form>
          <script src="ckeditor/ckeditor.js"></script>
          <script src="ckfinder/ckfinder.js"></script>
          <script type="text/javascript">
          CKFinder.setupCKEditor();
            CKEDITOR.replace('editor', {
              uiColor: '#EEEEEE',
              height: 500,
              width:'80%',
              filebrowserBrowseUrl: '/admin/ckfinder/ckfinder.html',
              filebrowserImageBrowseUrl: '/admin/ckfinder/ckfinder.html?Type=Images',
              filebrowserUploadUrl: '/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
              filebrowserImageUploadUrl: '/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
              filebrowserWindowWidth : '1000',
              filebrowserWindowHeight : '700'
            });
          </script>
        <a href="index.php" class="btn">＞機能一覧</a>
      </div>
    </body>
  <html>

    <?php
} else {
  header('Location: index.php');
}

 ?>

<?php
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Aritcle;

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $data = $article->fetch_data($id);
}

 ?>


<!doctype html>
<html lang="ja" dir="ltr">
 <head>
   <meta charset="utf-8">
   <title>ラーメンの話</title>
   <meta mame="description" content="Blogページです">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BootstrapのCSS読み込み -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/blog-article.css" type="text/css">
 </head>

<body>
  <main>
    <div class="container">
      <div clas="row">
        <div class="col-xs-12 csl-sm-9" style="width:70%;">
          <div class="col-xs-12 wrap">


            <div class="photo pen">
              <h4><?php echo date('l jS',$data['article_timestamp']) ?></h4>
              <p><?php echo $data['article_title']; ?></p>
            </div>


            <div class="text">
              <h4><?php echo date('l jS',$data['article_timestamp']) ?></h4>
              <h3><?php echo $data['article_title']; ?></h3>

              <p><?php  echo $data['article_content']; ?></p>

            </div>
          </div>

          <div class="col-xs-12 new-article">
            <h4>新着記事</h4>
            <a href="">
              <div class="new-article-photo">
              <p>4/23<br>
              旅行に行った話２</p>
              </div>
            </a>
          </div><br />
          <a href="blog1.php">&larr; Back</a>
          </div>
        </div>
        <div id="title-logo" class="top col-xs-12 csl-sm-3" style="width:30%;">
          <img src="image/title.png" style="width: 80%;">
        </div>
        <div id="sidebar" class="col-xs-12 csl-sm-3">
          <div class="pull-right">
            <h5>あーかいぶ</h5>
              <ul style="list-style:none;">
                <li><a href="">2019年4月(3)</a></li>
                <li><a href="">2019年3月(12)</a></li>
                <li><a href="">2019年2月(10)</a></li>
              </ul>
          </div>
        </div>
        <div class="back-list col-xs-12 csl-sm-3">
          <a href="blog.html"><p><img src="image/yellow-star.png" width="50px" height="50px"
            style="padding-bottom:5px;">一覧に戻る</p></a>
        </div>
      </div>
  </main>
</body>
</html>

  <?php
} else {
  header('Location:blog1.php');
  exit();
}

   ?>

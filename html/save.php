<?php
  $mysqli = new mysqli("localhost","nakanishi","kinniku0407","test");
  if($mysqli->connect_error)
    die("Database connection failed".$mysql->connect_error);

  $query = "insert into person(name) values('".$_POST['name']."')";
  if($mysqli->query($query){
      $id = $mysqli->insert_id;
      $query = "select into shirt(pid,style,color) values(".$id.",'".$_POST['style']."','aaa')";
      $count = count($_POST['style']);
      if($mysqli->query($query){
        echo "Record Saved";
      else
        echo "Shirts details saved to failed";
    }
  else{
    echo "Person details saved to failed";
  }

 ?>

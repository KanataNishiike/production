<?php

  try {
    $pdo = new PDO('mysql:host=localhost;dbname=article;charset=utf8','nakanishi','kinniku0407');
  } catch (Expception $e){
    exit('Database error.');
  }

 ?>

<?php
require_once('connect.php');;
require_once('../../lib/Account.php');
require_once('../../lib/Rating.php');

session_start();
global $pdo;
  $query='INSERT INTO "ratings"("rating","user","img", "userPubl") VALUES (:R , :U, :I, :UP)';
  $request=$pdo->prepare($query);
  $request->bindParam(':R', $_POST['rating']);
  $request->bindParam(':U', $_SESSION['user']->email);
  $request->bindParam(':I', $_POST['img']);
  $request->bindParam(':UP', $_POST['PublUser']);
  $request->execute();
  //средняя оценка  
  setAverageRating($_POST['PublUser'],$_POST['img'], $_SESSION['user']->email );
  if($_SESSION['loadPublications']=="Another_user") {
    header('Location: ../loadUserPub.php');
  } else {
    header('Location: ../index.php');
  }
?>
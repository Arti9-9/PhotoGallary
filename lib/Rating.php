<?php
function getRating($email, $img) {
  global $pdo;
    $query = 'SELECT "rating" FROM "ratings" WHERE "user" = :email AND "img" = :Img';
    $request=$pdo->prepare($query);
    $request->bindParam(':email', $email);
    $request->bindParam(':Img', $img);
    $request->execute();
    $data=$request->fetch();
    return $data[0];
}
function setCountRating($email, $img) {
  global $pdo;
    $query = 'SELECT Count(*) FROM "ratings" WHERE "userPubl" = :email AND "img" = :Img';
    $request=$pdo->prepare($query);
    $request->bindParam(':email', $email);
    $request->bindParam(':Img', $img);
    $request->execute();
    $data=$request->fetch();
    return $data[0];
  }
  function GetAverage($email, $img) {
    global $pdo;
    $query = 'SELECT "averageRating" FROM "publications" WHERE "Email" = :email AND "image" = :Img';
    $request=$pdo->prepare($query);
    $request->bindParam(':email', $email);
    $request->bindParam(':Img', $img);
    $request->execute();
    $data=$request->fetch();
    if($data[0] == null) {
      return 0;
    } else {
      return $data[0];
    }
  }
  function setAverageRating($email, $img, $user) {
    $OldAverage = GetAverage($email, $img);
    $count = setCountRating($email, $img);
    $rating = getRating($user, $img);
    $newAverage = round((($OldAverage * ($count - 1) + $rating)/$count),2);
    global $pdo;
    $query='UPDATE"publications" SET "averageRating" = :average WHERE "Email" = :email AND "image" = :Img';
    $request=$pdo->prepare($query);
    $request->bindParam(':average', $newAverage);
    $request->bindParam(':Img', $img);
    $request->bindParam(':email', $email);
    $request->execute();
  }
?>
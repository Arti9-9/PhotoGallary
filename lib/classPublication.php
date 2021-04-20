<?php
class Publication
  {
      public $comment;
      public $image;
      public $email;

      function setPublication( $array, $i) {
        $this->comment=$array[$i]['comment'];
        $this->image=$array[$i]['image'];
        $this->email=$array[$i]['Email'];
      }     
}
      function getCountPubl() {
        global $pdo; 
        $query = 'SELECT Count(*) FROM "publications"';
        $request=$pdo->prepare($query);
        $request->execute();
        return $request->fetch();
      }
      function getUserCountPubl($email) {
        global $pdo; 
        $query = 'SELECT Count(*) FROM "publications" WHERE "Email" = :email';
        $request=$pdo->prepare($query);
        $request->bindParam(':email', $email);
        $request->execute();
        return $request->fetch();
      }
      function getPublications() {
        global $pdo;
        $query = 'SELECT * FROM "publications"';
        $request=$pdo->prepare($query);
        $request->execute();
        return $request->fetchAll();
      }
      function getUserPublications($email) {
        global $pdo;
        $query = 'SELECT * FROM "publications" WHERE "Email" = :email';
        $request=$pdo->prepare($query);
        $request->bindParam(':email', $email);
        $request->execute();
        return $request->fetchAll();
      }
      function findFile($email, $file) {
        global $pdo;
        $query = 'SELECT * FROM "publications" WHERE "Email" = :email AND "image" = :Img';
        $request=$pdo->prepare($query);
        $request->bindParam(':email', $email);
        $request->bindParam(':Img', $file);
        $request->execute();
      }
    
      function addPubl($comment, $img, $UserEmail) {
        global $pdo;
        $query='INSERT INTO "publications"("comment","image", "Email", "averageRating") VALUES (:comm , :Img, :email, 0)';  
        $request=$pdo->prepare($query);
        $request->bindParam(':comm', $comment);
        $request->bindParam(':Img', $img);
        $request->bindParam(':email', $UserEmail);
        $request->execute();
      }
      
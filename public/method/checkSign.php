<?php
require('method/connect.php');
function checkEmail($email) {
    global $pdo; 
    $query = 'SELECT "Email" FROM "users" WHERE "Email" = :email';
    $request=$pdo->prepare($query);
    $request->bindParam(':email', $email);
    $request->execute();
    $data=$request->fetchObject();
    return $data;
}
function checkPassword($password, $email) {
    global $pdo;
    $query = 'SELECT "password" FROM "users" WHERE "Email" = :email';
    $request=$pdo->prepare($query);
    $request->bindParam(':email', $email);
    $request->execute();
    $hashPassword=$request->fetch();
    return password_verify($password,$hashPassword[0] );
}
function getName ($email){
    global $pdo;
    $query = 'SELECT "Name" FROM "users" WHERE "Email" = :email';
    $request=$pdo->prepare($query);
    $request->bindParam(':email', $email);
    $request->execute();
    $name=$request->fetch();
    return $name[0];
}
?>
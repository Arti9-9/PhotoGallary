<?php
function addNewUser ($userName, $userEmail, $userPassword) {
    try {
        global $pdo;
        $query='INSERT INTO "users"("Name","Email","password") VALUES (:FIO , :Email, :Pas)';
        $parameters = [
            ':FIO'=> $userName,
            ':Email'=> $userEmail,
            ':Pas'=> password_hash($userPassword, PASSWORD_DEFAULT)
        ];
        $request=$pdo->prepare($query);
        $request->execute($parameters);
    } catch (\Throwable $th) {
                print($th->getMessage());
      }
}
?>
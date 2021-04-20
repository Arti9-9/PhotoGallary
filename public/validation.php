<?php
    require_once("../lib/Account.php");
    require_once('method/connect.php');
    require("method/newUser.php");
    session_start();
      $user = new Account();
      $user->SetAccountValueReg();
      $_SESSION['IncompleteUser'] = $user;
      try {
        if (!empty($user->email) && !empty($user->password) && !empty($user->name)) {
          if (!preg_match("/^[а-яА-я_\-%\s]+$/iu", $user->name)) {
              throw new Exception(' В имени допустимы только русские буквы, пробелы и дефисы!');
          }
          if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
              throw new Exception('Введите корректный email!');
          }
          if (strlen($user->password) < 6) {
              throw new Exception('Минимальная длина пароля - 6 символов!');
          } else if (!preg_match("/[^0-9]/", $user->password)) {
              throw new Exception('Пароль не может состоять только из одних цифр!');
                  }
          if (strcasecmp($_POST['password2'], $user->password) != 0) {
              throw new Exception('Пароли не совпадают!');
          }
        unset($_SESSION['IncompleteUser']);
        $_SESSION['user'] = $user;
        addNewUser($user->name, $user->email, $user->password);
        header('Location: index.php');
        die();
        } 
    } catch(Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        header('Location: registration.php');
        unset($user);
        die();
    }  
?>

<?php
session_start();
require_once('method/checkSign.php');
require('./../lib/Account.php');
$user=new Account();
$user->email=trim($_POST['email']);
$user->password=trim($_POST['password']);
try {
    if(!checkEmail($user->email)) {
        throw new Exception('Пользователь с такой почтой не найден');
    } else if(!checkPassword($user->password, $user->email)) {
        throw new Exception('Неправильно введен пароль');
    }
    $user->name=getName($user->email);
    $user->checkProf=false;
    $_SESSION['user']=$user;
    header('Location: index.php');
} catch(Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    header('Location: SignIn.php');
    unset($user);
    die();
}
?>
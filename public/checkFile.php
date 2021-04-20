<?php
require_once('../lib/Account.php');
require_once('../lib/classPublication.php');
require_once('../lib/Rating.php');
session_start();
try {
  
    if($_FILES['file']['size']==0 || $_FILES['file']['size']>3145728) {
        throw new Exception ('Размер файла не соответсвует стандартам');
    } 
    if($_FILES['file']['type']!='image/jpeg') {
        throw new Exception ('неверный тип файла');
    }
    move_uploaded_file($_FILES['file']['tmp_name'],'temp/'. $_FILES['file']['name']);
    addPubl($_POST['comment'], 'temp/'. $_FILES['file']['name'], $_SESSION['user']->email);
    header('Location: profile.php');
} catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    header('Location: method/addPhoto.php');
    die();
}
?>
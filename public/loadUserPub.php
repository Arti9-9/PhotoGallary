<?php
require_once('method/connect.php');;
require_once('./../lib/classPublication.php');
require_once('./../lib/Account.php');
require_once('./../lib/Rating.php');
//загрузка постов другого пользователя
if(!$_SESSION['user']) {
    session_start();
    $_SESSION['loadPublications']="Another_user";
    include_once('elements/headerOtherAccount.php');
    include_once('HomePage.php');
    $CountPubl=getUserCountPubl($_POST['user']);
    $publications=getUserPublications($_POST['user']);
    $_SESSION['user']->checkProf=false;

} else {//загрузка постов авторизованого пользователя
    $CountPubl=getUserCountPubl($_SESSION['user']->email);
    $publications=getUserPublications($_SESSION['user']->email);
    $_SESSION['user']->checkProf=true;
}

include_once("elements/contayner.php");  
for($i=0; $i<$CountPubl[0];$i++) {
    $Publ = new Publication();
    $Publ->setPublication($publications, $i);
    $_SESSION['publication']=$Publ;
    
    include('elements/publication.php');

}
?>
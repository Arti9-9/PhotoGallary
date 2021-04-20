<?php
include_once('./HomePage.php');
$_SESSION['pageUser']=true;
$CountPubl=getCountPubl();
$Count=0;
if($CountPubl[0]<20) {
    $Count=$CountPubl[0];
} else {
    $Count = 20;
}
$publications=getPublications();  
for($i=0; $i<$Count;$i++) {
    $Publ = new Publication();
    $Publ->setPublication($publications, $i);
    $_SESSION['publication']=$Publ;
    if($_SESSION['user']) {
        if(strcasecmp($_SESSION['user']->email, $_SESSION['publication']->email)==0) {
        $_SESSION['user']->checkProf=true;
        } else {
        $_SESSION['user']->checkProf=false;
        } 
    }
    include('./elements/publication.php');
}
?>
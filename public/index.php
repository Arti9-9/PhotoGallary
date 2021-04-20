<?php
require_once('../lib/Account.php');
require_once('../lib/classPublication.php');
require_once('../lib/Rating.php');
require_once('method/checkSign.php');
session_start();
$_SESSION['loadPublications']="All_publications";
include_once('HomePage.php');
if(!$_SESSION['user']) {
  include_once('elements/headerHome.php');
} else {
  include_once('elements/headerAuthorization.php');
 
}
?>
    <!-- описание -->
    <div class="container ">
    <div class="col h1 text-light">Фотогалерея
    <div class ="description ">Сервис позволяет не только размещать фотографии, но и получать оценки пользователей сети - профессионалов и любителей фотографии.</div>
    <div class ="description ">Загружайте фотографии, делитесь ими с друзьями.</div>
    <div class ="description ">Получайте обратную связь в виде оценок от профессионалов и единомышленников.</div>
    <div class ="description ">Повышайте мастерство, смотрите лучшие фотографии.</div>
    </div>
  </div>
</div>
  <!-- последние загруженные фотографии   -->
<div class="container-foto">
<?php
include_once('method/loadPublications.php');
?>
</div>


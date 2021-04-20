<div class="col">
<form action="./method/addRating.php" method="post">
    <div class="card">
  <div class="block bg-dark bg-gradient" >
    <a href=<?php echo $_SESSION['publication']->image ?> data-lightbox="image-1" >
  <img src=<?php echo $_SESSION['publication']->image ?> class="card-img-top img2lightbox rounded-top"></img>
  <input type ="text"  name="img" value=<?php echo $_SESSION['publication']->image ?> class=" d-none"></input>
  <input type ="text"  name="PublUser" value=<?php echo $_SESSION['publication']->email ?> class=" d-none"></input>
  </a>
</div>
  <div class="card-body bg-secondary bg-gradient">
    <h5 class="card-title ">Описание</h5>
    <p class="card-text"><?php echo $_SESSION['publication']->comment ?></p>
    <div class="container px-0">
  <div class="row gx-2 mb-1">
    <div class="col">
     <div class="p-2  bg-dark bg-gradient text-light"> Кол-во оценок: 
     <?php echo setCountRating($_SESSION['publication']->email, $_SESSION['publication']->image)?>
     </div>
    </div>
    <div class="col">
      <div class="p-2 bg-dark bg-gradient text-light">Рейтинг: 
      <?php echo(GetAverage($_SESSION['publication']->email, $_SESSION['publication']->image))?>
      </div>
    </div>
  </div>
</div>
<?php
    if($_SESSION['user'] && (($_SESSION['user']->checkProf == false) || $_SESSION['user']->checkProf == NULL)) {
      if(getRating($_SESSION['user']->email, $_SESSION['publication']->image)) {
        include('./elements/ratingUser.php');
      } else {
          include('estimate.php');  
      }
    }
    ?>
  </div>
</div>
</div>
<?php
unset($_SESSION['publication']);
?>
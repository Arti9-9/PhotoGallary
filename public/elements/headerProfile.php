<nav class="navbar navbar-expand-lg bg-dark bg-gradient">
  <a class="navbar-brand me-md-auto ps-5 d-flex" href="#">
    <img src="./img/gallary.png" width="50 " height="50" class="d-inline-block align-top" alt="">
    <p class="my-auto ">PhotoGallary</p>
  </a>
  <div class="text mx-3">Приветствую, <?php echo(getName($_SESSION['user']->email)) ?></div>
  <a class="btn  btn-outline-primary text mx-3" href="../index.php" role="button">Главная</a>
  <a class="btn btn-outline-primary text mx-3" href="../method/addPhoto.php" role="button">Добавить фото</a>
  <a class="btn btn-outline-primary text mx-3" href="../method/exit.php" role="button">Выход</a>
</nav>

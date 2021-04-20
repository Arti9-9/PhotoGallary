<?php
require_once("../lib/Account.php");
session_start();
include_once('HomePage.php');
include_once('./elements/headerRegistr.php');
?>
<div class="container-xxl mt-5">
<form action="validation.php" method="post">
  <div class="row mb-3">
    <label for="inputName3" class="col-sm-2 col-form-label text-light">Имя</label>
    <div class="col-sm-10">
      <input type="name" class="form-control"    name="inputName3" placeholder="Name" value="<?= $_SESSION['IncompleteUser']->name ?>" required />>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label text-light">Электронная почта</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name ="email" id="inputEmail3" placeholder="Email address" value="<?= $_SESSION['IncompleteUser']->email ?>" required />>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-light">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  name="password" id="inputPassword3" placeholder="Password" value="<?= $_SESSION['IncompleteUser']->password ?>" required />>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPasswordReplay3" class="col-sm-2 col-form-label text-light">Повторите пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password2" id="inputPasswordReplay3" placeholder="Repeat the password" required />>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="consent" id="gridCheck1" required>
        <label class="form-check-label text-light" for="gridCheck1">
          Согласие на обработку данных
        </label>
      </div>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="col-sm-10">
      <p><input name="submit" class="btn-outline-primary" type="submit" value="Передать"></p>
      <?php
      if ($_SESSION['message']) {
        echo '<p class="text-danger"> ' . $_SESSION['message'] . '</p>';
      }
  unset($_SESSION['message']);
  unset($_SESSION['IncompleteUser']);
  ?>
      </div>
    </div>
  </div>
</div>

</form>
</div>


<?php
session_start();
include_once('HomePage.php');
include_once('elements/headerSign.php');
?>
    <div class="container-xxl mt-5">
<form action="allowance.php" method="post">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label  text-light">Электронная почта</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name ="email" id="inputEmail3" placeholder="Введите электронную почту" required />>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-light ">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control"  name="password" id="inputPassword3" placeholder="Введите пароль" value="<?= $_SESSION['IncompleteUser']->password ?>" required />>
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
      <div class="col-sm-10">
      <p><input name="submit" type="submit" value="Войти"></p>
      <?php
      if ($_SESSION['message']) {
        echo '<p class="text-danger">' . $_SESSION['message'] . '</p>';
      }
      unset($_SESSION['message']);
      ?>
      </div>
    </div>
  </div>
</div>
</form>
</div>
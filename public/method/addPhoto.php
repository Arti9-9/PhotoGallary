<?php
session_start();
include_once('../HomePage.php');
include_once('../elements/headerAddPhoto.php');
?>

	<div class="container content mt-5 ">
<form class="form-horizontal ml-5" method="post" enctype="multipart/form-data" action="../checkFile.php">
	<div class="form-group">
		<p  class="col-sm-2 control-label  text-white">Файл</p>
		<div class="col-sm-8 text-white">
			<input type="file" name="file" accept="" id="file">
		</div>
	</div>
	<p  class="col-sm-2 control-label  text-white mt-2">Комментарий</p>
	<input type="text" name="comment" class="form-control mb-4" placeholder="Введите текст">
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-8">
			<button type="submit" id="submit" class="btn btn-outline-primary gy-5">Отправить</button>
		</div>
	</div>
</form>
	<?php
	if($_SESSION['message']) {
		echo '<p  class="col-sm-5 control-label text-danger mt-3">'. $_SESSION['message'].'</p>';
		unset($_SESSION['message']);
	}
	?>


<div class="p-2  bg-dark bg-gradient text-light mt-4 mb-4">Вы поставили оценку: (<? echo(getRating($_SESSION['user']->email, $_SESSION['publication']->image))?>)
</div>
<?php
include('linkUser.php');
?>
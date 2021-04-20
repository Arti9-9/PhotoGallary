<?php
require_once("../lib/Account.php");
require_once('method/checkSign.php');
session_start();
include_once('HomePage.php');
include_once('elements/headerProfile.php');

?>
<div class="container-foto">
<?php
include_once('loadUserPub.php');
?>
</div>
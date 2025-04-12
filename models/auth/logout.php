<?php
require_once "authFunctions.php";
logoutUser();
header("Location: ../../public/login.php");
exit();
?>

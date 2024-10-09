<?php
require_once ('pripojenie.php');
$_SESSION = [];
session_unset();
session_destroy();
header("Location: Login.php");

?>
<?php
require_once ('pripojenie.php');
$user_id = $_GET['id'];
$task = $_GET['input-text'];
$isCompleted = 0;

$query = "INSERT INTO list VALUES(null,'$task',$isCompleted,$user_id)";
$sql = mysqli_query($con, $query);

if (!$sql) {
    die("Chyba pri vykonavaní SQL dotazu!");
} else {
    header("Location: todo.php");
}


?>
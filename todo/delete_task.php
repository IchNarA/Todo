<?php
require_once ('pripojenie.php');
$task_id = $_GET['id'];
$query = "DELETE FROM list WHERE id=$task_id";
$sql = mysqli_query($con, $query);
if (!$sql) {
    die("Chyba pri vykonaní SQL dotazu!");
} else {
    header("Location: todo.php");
}

?>
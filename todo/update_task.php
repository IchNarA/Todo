<?php
require_once ('pripojenie.php');
if (!empty($_GET['id']) && isset($_GET['isCompleted'])) {
    $taskId = $_GET['id'];
    $isCompleted = $_GET['isCompleted'];

    $query = "UPDATE list SET isCompleted = '$isCompleted' WHERE id = '$taskId'";
    if (mysqli_query($con, $query)) {
        header("Location: todo.php"); // Zmeniť na správnu stránku
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    header("Location: todo.php"); // Zmeniť na správnu stránku
    exit();
}
?>
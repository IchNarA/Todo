<?php
require_once ('pripojenie.php');
if (!empty($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users WHERE id = '$id'";
    $sql = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($sql);
} else {
    header("Location: Login.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <a href="logout.php">Odhlásiť</a>
        <div class="list">
            <h2>To-Do List používateľa <?php echo $row['username']; ?></h2>
            <div class="list-body">
                <form method="get" action="ins.php">
                    <input type="text" id="input-text" placeholder="Zadaj text" name="input-text">
                    <input type="submit" id="submit" name="submit" value="Pridať">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                </form>
            </div>
            <ul id="list-tasks">
                <?php
                $query = "SELECT * FROM list WHERE user_id = '$id'";
                $sql = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($sql)) {
                    $task = $row['text'];
                    $isCompleted = $row['isCompleted'];
                    $completedClass = $isCompleted ? 'class="checked"' : '';
                    echo "
                    <li $completedClass onclick='toggleComplete({$row['id']}, $isCompleted)'>
                        $task
                        <span onclick='event.stopPropagation(); deleteTask({$row['id']})'>&#10005;</span>
                    </li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <script>
        function toggleComplete(id, currentStatus) {
            const newStatus = currentStatus ? 0 : 1;
            window.location.href = `update_task.php?id=${id}&isCompleted=${newStatus}`;
        }
        function deleteTask(id) {
            if (confirm('Naozaj chcete túto úlohu vymazať?')) {
                window.location.href = `delete_task.php?id=${id}`;
            }
        }
    </script>
</body>

</html>
<?php
require_once ('pripojenie.php');
if (!empty($_SESSION['id'])) {
    header("Location: todo.php");
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $duplicate = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($duplicate);
    if (mysqli_num_rows($duplicate) == 0) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                let errorMsg = document.getElementById('errorMsg');
                errorMsg.innerHTML = 'Tento používateľský účet ešte neexistuje!';
                errorMsg.style.display = 'block';
            });
          </script>";
    } else {
        if ($password == $confirm_password) {

            if ($password == $row['password']) {

                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['id'];
                header('Location: todo.php');

            } else {
                echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                let errorMsg = document.getElementById('errorMsg');
                                errorMsg.innerHTML = 'Nesprávne heslo';
                                errorMsg.style.display = 'block';
                            });
                     </script>";
            }


        } else {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        let errorMsg = document.getElementById('errorMsg');
                        errorMsg.innerHTML = 'Heslá sa nezhodujú!';
                        errorMsg.style.display = 'block';
                    });
                </script>";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="list">
            <h2>Login</h2>
            <div class="register-body">
                <form method="post" action="">
                    <p id='errorMsg'style='font-size: 18px; color:red; display:none; font-weight:bold; margin-bottom:10px;'>Chyba:</p>
                    <input type="text" id="username" placeholder="Name" required name="username">
                    <input type="password" id="password" placeholder="Heslo" required name="password">
                    <input type="password" id="confirm-password" placeholder="Potvrd heslo" required
                        name="confirm-password">
                    <input type="submit" value="Prihlásiť" name="submit">
            </div>
            </form>
            <a href="Register.php">Ešte nemáš účet? Klikni sem</a>
        </div>
    </div>
</body>

</html>
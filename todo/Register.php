<?php
require_once ('pripojenie.php');
if (!empty($_SESSION['id'])) {
    header("Location: todo.php");
}


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

    $query = "SELECT * from users WHERE username='$username' OR email='$email'";
    $duplicate = mysqli_query($con, $query);
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                let errorMsg = document.getElementById('errorMsg');
                errorMsg.innerHTML = 'Tento používateľský účet alebo email je už používáný.';
                errorMsg.style.display = 'block';
            });
          </script>";
    } else {
        if ($password == $confirm_password) {

            $querry = "INSERT INTO users VALUES(null,'$username','$email','$password')";
            $sql = mysqli_query($con, $querry);

            if (!$sql) {
                echo "Došlo k chybe pri vykonávaní SQL dotazu";
            } else {
                echo "<script>alert('Úspešne zaregistrovaný!)'</script>";
                header('Location: todo.php');
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
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="list">
            <h2>Register</h2>
            <div class="register-body">
                <form method="post" action="">
                    <p id='errorMsg'style='font-size: 18px; color:red; display:none; font-weight:bold; margin-bottom:10px;'>Chyba:</p>
                    <input type="text" id="username" placeholder="Username" name="username" required>
                    <input type="email" id="email" placeholder="Email" name="email" required>
                    <input type="password" id="password" placeholder="Heslo" name="password" required>
                    <input type="password" id="confirm-password" placeholder="Potvrd heslo" name="confirm-password"
                        required>
                    <input type="submit" value="Registrovať" name="submit">
            </div>
            </form>
            <a href="Login.php">Už máš vytvorený účet? Klikni sem</a>
        </div>
    </div>
</body>

</html>
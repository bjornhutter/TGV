<?php
session_start();

if (isset($_POST['login_submit'])) {

    //include('includes/db_connect.inc');

    $user = $_POST['user'];
    $password = $_POST['password'];

    $dbUser = "admin";
    $dbPassword = "admin123";

    if ($user == $dbUser) {

        if ($user == $dbUser && $password == $dbPassword) {

            $_SESSION['user'] = $user;

            header('Location: dashboard.php');

        } else {
            echo "Fel lösenord";
        }

    } else {
        echo "Fel användarnamn";
    }




    /*$result = mysqli_query($link, "SELECT * FROM ui_users WHERE email = '$email'");

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        if ($pw == $row['pw'] && $email == $row['email']) {

            $_SESSION['email'] = $email;
            header('Location: index.php');
        } else {
            echo '<p>Wrong Password</p>';
        }

    } else {
        echo '<p>Wrong Email</p>';
    }
    */

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<link rel="stylesheet" type="text/css" href="css/css-reset.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css/master.css">-->
    <!--<link rel="stylesheet" type="text/css" href="css/dashboard.css">-->
    <title>Admin Login | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>
<header>
    <h1>Admin Login</h1>
</header>
<main>
    <form action="" method="post">
        <ul>
            <li>
                <p>Användarnamn: </p>
                <input type="text" name="user" title="Användarnamn" class="login-input-text" required>
            </li>
            <li>
                <p>Lösenord: </p>
                <input type="password" name="password" title="Lösenord" class="login-input-password" required>
            </li>
            <li>
                <input type="submit" name="login_submit" value="Logga in" class="login-input-submit">
            </li>
        </ul>
    </form>
</main>

</body>
</html>
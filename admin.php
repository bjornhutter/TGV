<?php
session_start();
$userCorrect = "";
$userErr = "";
$passwordErr = "";
$userErrField = "";
$passwordErrField = "";

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
            $userCorrect = "$user";
            $passwordErr = "Fel lösenord";
            $passwordErrField = "* Fel lösenord";
            echo '<style type="text/css">
            #password {
                border: 1px solid rgba(255, 35, 50, 1);
                -webkit-box-shadow: 0 0 2px rgba(255, 35, 50, 1);
                -moz-box-shadow: 0 0 2px rgba(255, 35, 50, 1);
                box-shadow: 0 0 2px rgba(255, 35, 50, 1);
            }
            </style>';
        }

    } else {
        $userErr = "Fel användarnamn";
        $userErrField = "* Fel användarnamn";
        echo '<style type="text/css">
        #user {
            border: 1px solid rgba(255, 35, 50, 1);
            -webkit-box-shadow: 0 0 2px rgba(255, 35, 50, 1);
            -moz-box-shadow: 0 0 2px rgba(255, 35, 50, 1);
            box-shadow: 0 0 2px rgba(255, 35, 50, 1);
        }
        </style>';
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <!--<link rel="stylesheet" type="text/css" href="css/master.css">-->
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
    <title>Admin Inloggning | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="plugins/noty-2.3.8/js/noty/packaged/jquery.noty.packaged.min.js"></script>
</head>
<body class="admin-body">
<main class="admin-main">
    <div class="login-form-wrapper">
        <form action="" method="post" class="login-form">
            <h1 class="login-title">Admin Inloggning</h1>
            <ul class="login-ul">
                <li class="login-li">
                    <input type="text" id="user" name="user" title="Användarnamn" class="login-input-text"
                           placeholder="Användarnamn" value="<?php echo $userCorrect ?>" required><span
                        class="error-field"><?php echo $userErrField ?></span>
                </li>
                <li class="login-li">
                    <input type="password" id="password" name="password" title="Lösenord" class="login-input-password"
                           placeholder="Lösenord" required><span
                        class="error-field"><?php echo $passwordErrField ?></span>
                </li>
                <li class="login-li-submit">
                    <input type="submit" name="login_submit" value="Logga in" class="login-input-submit">
                </li>
            </ul>
        </form>
    </div>
</main>
</body>
</html>
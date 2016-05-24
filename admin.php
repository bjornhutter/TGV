<?php
if (!isset($_SESSION)) {
    session_start();
}
$userCorrect = "";
$userErr = "";
$passwordErr = "";
$userErrField = "";
$passwordErrField = "";
/*
 * FUNKTION FÖR ATT GENERERA INLOGGNINGSUPPGIFTER
 *
 *

$user = 'admin';
$password = 'wDD7qC11xO4P6R';

function generate_hash($password, $cost = 11)
{

    $salt = substr(base64_encode(openssl_random_pseudo_bytes(17)), 0, 22);

    $salt = str_replace("+", ".", $salt);

    $param = '$' . implode('$', array("2y", str_pad($cost, 2, "0", STR_PAD_LEFT), $salt));

    return crypt($password, $param);
}

$password_hash = generate_hash($password);

require ('includes/db_connect.inc');

mysqli_query($link, "INSERT INTO tgv_admin (user, password) VALUES ('$user', '$password_hash')") or die(mysqli_error($link));


echo "Tillagt i databasen";

*/
if (isset($_POST['login_submit'])) {

    include('includes/db_connect.inc');

    $user = $_POST['user'];
    $password = $_POST['password'];

    $user = mysqli_real_escape_string($link, $user);
    $password = mysqli_real_escape_string($link, $password);

    $result = mysqli_query($link, "SELECT * FROM tgv_admin WHERE user = '$user'");

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result);

        $hash = $row['password'];

        if (password_verify($password, $hash) && $user == $row['user']) {

            $_SESSION['user'] = $user;
            $_SESSION['timeout'] = time();

            header('Location: dashboard.php');

        } else {
            $userCorrect = "$user";
            $passwordErr = "Fel lösenord";
            $passwordErrField = "* Fel lösenord";
            echo '<style type="text/css">
            #password {
                border: 1px solid rgba(250, 70, 80, 1);
                -webkit-box-shadow: 0 0 2px rgba(250, 70, 80, 1);
                -moz-box-shadow: 0 0 2px rgba(250, 70, 80, 1);
                box-shadow: 0 0 2px rgba(250, 70, 80, 1);
            }
            #logout {
                display: none;
            }
            #logout-inactive {
                display: none;
            }
            </style>';
        }

    } else {
        $userErr = "Fel användarnamn";
        $userErrField = "* Fel användarnamn";
        echo '<style type="text/css">
        #user {
            border: 1px solid rgba(250, 70, 80, 1);
            -webkit-box-shadow: 0 0 2px rgba(250, 70, 80, 1);
            -moz-box-shadow: 0 0 2px rgba(250, 70, 80, 1);
            box-shadow: 0 0 2px rgba(250, 70, 80, 1);
        }
        #logout {
            display: none;
        }
        #logout-inactive {
            display: none;
        }
        </style>';
    }
    /*
     * PHP VERSION = 5.6.18
     */
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
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet'
          type='text/css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body class="admin-body">
<main class="admin-main">
    <?php
    if (($_GET['logout']) == 1) {
        echo "<div class='logout-inactive' id='logout-inactive'>Du har blivit utloggad för att du var inaktiv i 20 minuter.</div>";
    } elseif (($_GET['logout']) == 2) {
        echo "<div class='logout' id='logout'>Du har loggats ut.</div>";
    }
    ?>
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
<script src="js/hide_notification.js"></script>
</body>
</html>
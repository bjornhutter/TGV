<?php
//require('includes/auth.php');

if (!isset($_GET['id'])) {
    header("Location: contact.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM contact WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$title = $row['title'];
$adress = $row['adress'];
$phone = $row['phone'];
$email = $row['email'];
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Redigera kontakt | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>

<body>
<p>Redigera kontaktinformation</p>
<form action="contact_edit_process.php" method="post">
    <ul>
        <li>
            <textarea name="contacttitle" id="contacttitle"><?php echo $title ?></textarea>
        </li>
        <li>
            <textarea name="contactadress" id="contactadress"><?php echo $adress ?></textarea>
        </li>
        <li>
            <textarea name="contactphone" id="contactphone"><?php echo $phone ?></textarea>
        </li>
        <li>
            <textarea name="contactemail" id="contactemail"><?php echo $email ?></textarea>
        </li>
        <li>
            <input type="submit" name="contactsave" value="Spara ändringar">
        </li>
    </ul>
    <input type="hidden" value="<?php echo $id ?>" name="id">
</form>

</body>
</html>


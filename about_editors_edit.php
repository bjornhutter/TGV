<?php
//require('includes/auth.php');

if (!isset($_GET['id'])) {
    header("Location: about.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_about_editors WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$content = $row['content'];
$fname = $row['fname'];
$lname = $row['lname'];
$imgName = $row['image'];

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Redigera redaktörer | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>
<p>Redigera redaktör</p>
<form action="about_editors_edit_process.php" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <input type="text" name="fname" id="fname" value="<?php echo $fname ?>">
        </li>
        <li>
            <input type="text" name="lname" id="lname" value="<?php echo $lname ?>">
        </li>
        <li>
            <textarea name="content" id="content"><?php echo $content ?></textarea>
        </li>
        <li>
            <p>Ladda upp en ny bild (välj ingen fil, om du önskar ha kvar samma): </p>
            <input type="file" name="newfileToUpload" id="newfileToUpload">
        </li>
        <li>
            <input type="submit" name="save" value="Spara ändringar">
        </li>
        <li>
            <input type="submit" name="delete" value="Radera inlägget" onClick="return confirm('Radera. Är du säker?')">
        </li>
    </ul>
    <input type="hidden" value="<?php echo $id ?>" name="id">
</form>

</body>
</html>


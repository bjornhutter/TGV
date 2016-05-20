<?php
//require('includes/auth.php');

if (!isset($_GET['id'])) {
    header("Location: about.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_about_staff WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$title = $row['title'];
$content = $row['content'];
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Redigera redaktion | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({
            selector: 'textarea',
            toolbar: 'undo redo | bold italic | bullist numlist | link code',
            menubar: 'file edit view insert tools',
            plugins: 'link code'
        });</script>
</head>

<body>
<p>Redigera redaktion</p>
<form action="about_staff_edit_process.php" method="post">
    <ul>
        <li>
            <textarea name="title" id="title"><?php echo $title ?></textarea>
        </li>
        <li>
            <textarea name="content" id="content"><?php echo $content ?></textarea>
        </li>
        <li>
            <input type="submit" name="save" value="Spara ändringar">
        </li>
    </ul>
    <input type="hidden" value="<?php echo $id ?>" name="id">
</form>

</body>
</html>


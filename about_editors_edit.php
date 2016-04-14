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

</head>

<body>
<p>Redigera redaktör</p>
<form action="about_editors_edit_process.php" method="post">
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
            <input type="submit" name="save" value="Spara ändringar">
        </li>
    </ul>
    <input type="hidden" value="<?php echo $id ?>" name="id">
</form>

</body>
</html>


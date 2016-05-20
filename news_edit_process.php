
<?php
require('includes/auth.inc');
include('includes/db_connect.inc');

$id = $_POST['id'];

if (isset($_POST['newsSubmit'])) {
    $newsTitle = $_POST['title'];
    $newsContent = $_POST['content'];

    mysqli_query($link, "UPDATE tgv_news SET title = '$newsTitle', content = '$newsContent' WHERE id = '$id'");
}

header("Location: dashboard.php"); 
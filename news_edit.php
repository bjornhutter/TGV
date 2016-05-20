<?php
//require('includes/auth.php');
if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_news WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$newsTitle = $row['title'];
$newsContent = $row['content'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<main id="main">

    <form action="dashboard_process.php" method="post" class="dashboard-form">
        <h2 class="dashboard-sub-title">Nyhetsflöde</h2>
        <ul>
            <li>
                <p class="dashboard-first-form-title">Titel: </p>
                <input type="text" name="newsTitle" title="Nyhetsflöde Titel" value="<?php echo $newsTitle ?>">
            </li>
            <li>
                <p class="dashboard-form-title">Beskrivning: </p>
                <textarea name="newsContent" title="Nyhetsflöde Beskrivning"
                          rows="10"><?php echo $newsContent ?></textarea>
            </li>
            <li>
                <input type="submit" name="newsSubmit" value="Spara ändringar"
                       class="form-input-submit">
            </li>
        </ul>
    </form>
</main>
</body>
</html>
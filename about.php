<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Information om Tidskrift för genusvetenskap, Nordens största referee-granskade tidskrift för aktuell tvärvetenskaplig genusforskning, och om redaktionen.">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Om TGV | Tidskrift för genusvetenskap</title>
    <link rel="icon" href="img/tgv_favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700,600italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/active_nav.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/nav_mobile_toggle.js"></script>
</head>
<body>

<header class="header-other">
    <div class="header-logo">
        <img src="img/tgv_logo.png" class="logo">
    </div>
</header>

<?php include('includes/navigation_mobile.inc') ?>
<?php include('includes/navigation.inc') ?>

<main>
    <?php
    include('includes/db_connect.inc');

    $aboutResult = mysqli_query($link, "SELECT * FROM tgv_about") or die(mysqli_error($link));

    echo '<section class="about-staff">';
    while ($aboutRow = mysqli_fetch_array($aboutResult)) {

        $aboutId = $aboutRow['id'];
        $aboutTitle = $aboutRow['title'];
        $aboutContent = $aboutRow['content'];

        echo '<h1 class="about-staff-main-title">' . $aboutTitle . '</h1>';
        echo '<p>' . $aboutContent . '</p>';

        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_about.php#1" class="edit" target="_blank">Redigera</a></p>';

        }
        echo '</section>';
    }
    ?>

    <ul class="staff-wrapper">
        <h1 class="staff-main-title">Om redaktionen</h1>
        <?php
        include('includes/db_connect.inc');
        $staffResult = mysqli_query($link, "SELECT * FROM tgv_staff") or die(mysqli_error($link));
        while ($staffRow = mysqli_fetch_array($staffResult)) {
            $staffId = $staffRow['id'];
            $staffContent = $staffRow['content'];
            $staffFname = $staffRow['fname'];
            $staffLname = $staffRow['lname'];
            $staffTitle = $staffRow['title'];
            $staffImgName = $staffRow['image'];

            echo '<li class="staff">';
            echo '<img src="uploads/' . $staffImgName . '" class="staff-img">';
            echo '<h1 class="staff-title">' . $staffFname . ' ' . $staffLname . '</h1>';
            echo '<p class="staffWorktitle">' . $staffTitle . '</p>';
            echo '<div class="staff-linebreak"></div>';
            echo '<p class="staff-content">' . $staffContent . '</p>';
            if (isset($_SESSION['user'])) {
            echo '<p><a href="about_editors_edit.php?id=' . $staffId . '" class="edit"  target="_blank">Redigera</a></p>';
            }
            echo '</li>';
        }
        ?>
    </ul>
</main>


<?php include('includes/footer.inc') ?>
</body>
</html>
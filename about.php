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
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Om oss | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/active_nav.js"></script>
</head>
<body>

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
            //echo '<p><a href="about_staff_edit.php?id=' . $aboutId . '">Redigera</a></p>';

            echo '<p><a href="dashboard_about.php" class="edit">Redigera</a></p>';

        }
        echo '</section>';
    }
    ?>
    <!--kanske lägga till section för staff här under? -->
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
            $staffImgName = $staffRow['image'];

            echo '<li class="staff">';
            echo '<img src="uploads/' . $staffImgName . '" class="staff-img">';
            echo '<h1 class="staff-title">' . $staffFname . ' ' . $staffLname . '</h1>';
            echo '<div class="staff-linebreak"></div>';
            echo '<p class="staff-content">' . $staffContent . '</p>';
            // Lägg in rätt länk till dashboarden här under
            if (isset($_SESSION['user'])) {
            echo '<p><a href="about_editors_edit.php?id=' . $staffId . '" class="edit">Redigera</a></p>';
            }
            echo '</li>';
        }
        ?>
    </ul>
</main>


<?php include('includes/footer.inc') ?>
</body>
</html>
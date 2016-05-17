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
    <script src="js/stickynav.js"></script>
    <script src="js/active_nav.js"></script>
</head>
<body>

<header>

</header>
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

            echo '<p><a href="dashboard_about.php">Redigera</a></p>';

        }
        echo '</section>';
    }
    ?>
    <!--kanske lägga till section för staff här under? -->
    <h1 class="staff-main-title">Om oss</h1>
    <ul class="staff-wrapper">
<!--
        <li class="staff">
            <img src="http://tegeve.se/wp-content/uploads/2012/06/tgv_miljo_stor.jpg" class="staff-img">
            <h1 class="staff-title">Här ligger en title</h1>
            <p class="staff-content">Här ligger en personal begravd</p>
        </li>
        <li class="staff">
            <img src="http://tegeve.se/wp-content/uploads/2012/06/tgv_miljo_stor.jpg" class="staff-img">
            <h1 class="staff-title">Här ligger en title</h1>
            <p class="staff-content">Här ligger en personal begravd</p>
        </li>
        <li class="staff">
            <img src="http://tegeve.se/wp-content/uploads/2012/06/tgv_miljo_stor.jpg" class="staff-img">
            <h1 class="staff-title">Här ligger en title</h1>
            <p class="staff-content">Här ligger en personal begravd</p>
        </li>
-->
        <h1 class="staff-main-title">Om oss</h1>
        <?php
        include('includes/db_connect.inc');
        $result = mysqli_query($link, "SELECT * FROM tgv_about_editors") or die(mysqli_error($link));
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $content = $row['content'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $imgName = $row['image'];
            
            echo '<li class="staff">';
            echo '<img src="uploads/'.$imgName.'" class="staff-img">';
            echo '<h1 class="staff-title">' . $fname . ' ' . $lname . '</h1>';
            echo '<p class="staff-content">' . $content . '</p>';
            //if (isset($_SESSION['user'])) {
            echo '<p><a href="about_editors_edit.php?id=' . $id . '">Redigera</a></p>';
            //}
            echo '</li>';
        }
        ?>
    </ul>
</main>


<?php include('includes/footer.inc') ?>
</body>
</html>
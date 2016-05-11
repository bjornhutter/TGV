<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Om oss | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>

<header>

</header>
<?php include('includes/navigation.inc') ?>
<?php include('includes/db_connect.inc') ?>

<main>
    <?php
    $result = mysqli_query($link, "SELECT * FROM tgv_about_staff") or die(mysqli_error());

    echo '<section class="about-staff">';
    while ($row = mysqli_fetch_array($result)) {

        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];

        echo '<h1 class="about-staff-main-title">' . $title . '</h1>';
        echo '<p>' . $content . '</p>';

        //if (isset($_SESSION['user'])) {
        echo '<p><a href="about_staff_edit.php?id=' . $id . '">Redigera</a></p>';
        //}
    }
    ?>
    </section>
    <!--kanske lägga till section för staff här under? -->
    <ul class="staff-wrapper">
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
<?php
//require('includes/auth.php');
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Lägg till redaktör | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>

<body>
<p>Lägg till redaktör</p>
<form action="about_editors_process.php" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <input type="text" name="fname" id="fname" placeholder="Förnamn">
        </li>
        <li>
            <input type="text" name="lname" id="lname" placeholder="Efternamn">
        </li>
        <li>
            <textarea name="content" id="content" placeholder=""></textarea>
        </li>
        <li>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </li>
        <li>
            <input type="submit" value="Ladda upp" name="submit">
        </li>
    </ul>
</form>
</body>
</html>

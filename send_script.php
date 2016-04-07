<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Skicka manus | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
</head>
<body>

<header>

</header>
<?php include('includes/navigation.inc') ?>

<main>
    <!--TABBAR-->
</main>
<section class="script-form-wrapper">
    <div class="script-form-inner-wrapper">
        <form action="" method="post" class="script-form">
            <ul class="script-form-ul">
                <li class="script-form-li">
                    <p>Förnamn: </p>
                    <input type="text" name="fname" placeholder="Förnamn" class="script-form-input" required>
                </li>
                <li class="script-form-li">
                    <p>Efternamn: </p>
                    <input type="text" name="lname" placeholder="Efternamn" class="script-form-input" required>
                </li>
                <li class="script-form-li">
                    <p>Din emailaddress: </p>
                    <input type="email" name="email" title="Email" placeholder="Din Email" class="script-form-input"
                           required>
                </li>
                <li class="script-form-li">
                    <p>Ämne: </p>
                    <input type="text" name="topic" title="Ämne" placeholder="Ämne" class="script-form-input" required>
                </li>
                <li class="script-form-li">
                    <p>Meddelande: </p>
                    <textarea name="message" title="Meddelande" rows="10" cols="50"
                              class="script-form-input"></textarea>
                </li>
                <li class="script-form-li">
                    <input type="submit" name="submit" value="Skicka Manus" class="script-form-input-submit">
                </li>
                <!--LÄGG TILL BIFOGA FIL FÖR MANUS -->
            </ul>
        </form>
    </div>
</section>

<?php include('includes/footer.inc') ?>
</body>
</html>
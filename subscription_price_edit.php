<?php
//require('includes/auth.php');

if (!isset($_GET['id'])) {
    header("Location: subscription.php");
}

include('includes/db_connect.inc');
$id = $_GET['id'];
$result = mysqli_query($link, "SELECT * FROM tgv_subscription_price WHERE id = '$id'");
$row = mysqli_fetch_array($result);

$item = $row['item'];
$price = $row['price'];
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css-reset.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <title>Redigera prenumeration | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>

<body>
<p>Redigera prenumerationspriser</p>
<form action="subscription_price_edit_process.php" method="post">
    <ul>
        <li>
            <textarea name="subpriceitem" id="subpriceitem"><?php echo $item ?></textarea>
        </li>
        <li>
            <textarea name="subpriceprice" id="subpriceprice"><?php echo $price ?></textarea>
        </li>
        <li>
            <input type="submit" name="subpricesave" value="Spara ändringar">
        </li>
        <li>
            <input type="submit" name="subpricedelete" value="Radera" onClick="return confirm('Radera. Är du säker?')">
        </li>
    </ul>
    <input type="hidden" value="<?php echo $id ?>" name="id">
</form>

</body>
</html>


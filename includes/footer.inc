<?php

include('db_connect.inc');

$footerResult = mysqli_query($link, "SELECT * FROM tgv_footer") or die(mysqli_error($link));

$footerRow = mysqli_fetch_array($footerResult);

$footerId = $footerRow['id'];
$footerTitle = $footerRow['title'];
$footerContent = $footerRow['content'];

echo '<footer>';
echo '<p>' . $footerTitle . '<p/>';
echo '<p>' . $footerContent . '<p/>';
if (isset($_SESSION['user'])) {
    echo '<p><a href="dashboard_contact.php">Redigera</a></p>';
}
echo '</footer>';
?>
<!--<footer><p>Tel 054-7001000 (vx) | tegeve@oru.se | För beställning/köp av tidigare nummer/artiklar –vänd er till
    ekonomitjanst@natverkstan.net</p>
</footer>-->
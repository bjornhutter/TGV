<footer>
    <div class="footer-block-about">
        <?php

        include('db_connect.inc');

        $footerResult = mysqli_query($link, "SELECT * FROM tgv_footer") or die(mysqli_error($link));

        $footerRow = mysqli_fetch_array($footerResult);

        $footerId = $footerRow['id'];
        $footerTitle = $footerRow['title'];
        $footerContent = $footerRow['content'];

        echo '<h2 class="footer-title">' . $footerTitle . '</h2>';
        echo '<p>' . $footerContent . '<p/>';
        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_contact.php" target="_blank">Redigera</a></p>';
        }
        ?>
    </div>
    <div class="footer-block">
        <h2 class="footer-title">Site map</h2>
        <p><a href="../about.php">Om TGV</a></p>
        <p><a href="../subscription.php">Prenumerera</a></p>
        <p><a href="http://ojs.ub.gu.se/ojs/index.php/tgv">Tidigare nummer</a></p>
        <p><a href="../send_script.php">Skicka manus</a></p>
    </div>
    <div class="footer-block">
        <h2 class="footer-title">Kontakt</h2>
        <p>054-7001000</p>
        <p>tegeve@oru.se</p>
        <p>Universitetsgatan 2</p>
        <p>651 88 Karlstad</p>
    </div>
</footer> 

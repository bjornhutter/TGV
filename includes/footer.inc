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
            echo '<p><a href="dashboard_contact.php#3" target="_blank" class="edit">Redigera</a></p>';
        }
        ?>
    </div>
    <div class="footer-block">
        <h2 class="footer-title">Sidkarta</h2>
        <p><a href="about.php">Om TGV</a></p>
        <p><a href="subscription.php">Prenumerera</a></p>
        <p><a href="old_articles.php">Tidigare nummer</a></p>
        <p><a href="send_script.php">Skicka manus</a></p>
    </div>
    <div class="footer-block">
        <?php
        include('includes/db_connect.inc');
        $contactResult = mysqli_query($link, "SELECT * FROM tgv_contact") or die(mysqli_error($link));
        $contactRow = mysqli_fetch_array($contactResult);

        $contactId = $contactRow['id'];
        $contactTitle = $contactRow['title'];
        $contactAddress = $contactRow['address'];
        $contactPhone = $contactRow['phone'];
        $contactEmail = $contactRow['email'];

        echo '<h2 class="footer-title">' . $contactTitle . '</h2>';
        echo '<p>' . $contactPhone . '</p>';
        echo '<p>' . $contactEmail . '</p>';
        echo '<p>' . $contactAddress . '</p>';


        if (isset($_SESSION['user'])) {
            echo '<p><a href="dashboard_contact.php#1" target="_blank" class="edit">Redigera</a></p>';

        }
        ?>
    </div>
</footer> 

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
    <title>Skicka manus | Tidskrift för genusvetenskap</title>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="js/stickynav.js"></script>
    <script src="js/active_nav.js"></script>
</head>
<body>
<?php include('includes/db_connect.inc') ?>

<?php include('includes/navigation.inc') ?>

<main class="script-wrapper">
    <section class="script-info">
        <h1 class="script-info-main-title">Anvisningar för artikelskribenter</h1>
        <p>Tidskrift för genusvetenskap(TGV) kommer ut med fyra nummer per år. En förutsättning för publicering i TGV är
            att artikeln inte redan är publicerad av annan tidskrift eller annat förlag. För tidskriften intressanta
            artikelförslag referee-granskas. Om en artikel samtidigt är under bedömning någon annanstans bör detta
            tydligt anges.</p>
    </section>
    <?php

    /*
     * GENERELLA RIKTLINJER
     */
    $guidelinesResult = mysqli_query($link, "SELECT * FROM tgv_guidelines") or die(mysqli_error($link));

    $guidelinesRow = mysqli_fetch_array($guidelinesResult);

    $guidelinesId = $guidelinesRow['id'];
    $guidelinesTitle = $guidelinesRow['title'];
    $guidelinesContent = $guidelinesRow['content'];

    /*
     * FORM
     */
    $formResult = mysqli_query($link, "SELECT * FROM tgv_form") or die(mysqli_error($link));

    $formRow = mysqli_fetch_array($formResult);

    $formId = $formRow['id'];
    $formTitle = $formRow['title'];
    $formContent = $formRow['content'];

    /*
     * Rubriker
     */
    $titlesResult = mysqli_query($link, "SELECT * FROM tgv_titles") or die(mysqli_error($link));

    $titlesRow = mysqli_fetch_array($titlesResult);

    $titlesId = $titlesRow['id'];
    $titlesTitle = $titlesRow['title'];
    $titlesContent = $titlesRow['content'];

    /*
     * Citat
     */
    $quotesResult = mysqli_query($link, "SELECT * FROM tgv_quotes") or die(mysqli_error($link));

    $quotesRow = mysqli_fetch_array($quotesResult);

    $quotesId = $quotesRow['id'];
    $quotesTitle = $quotesRow['title'];
    $quotesContent = $quotesRow['content'];

    /*
     * Referenser
     */
    $refResult = mysqli_query($link, "SELECT * FROM tgv_ref") or die(mysqli_error($link));

    $refRow = mysqli_fetch_array($refResult);

    $refId = $refRow['id'];
    $refTitle = $refRow['title'];
    $refContent = $refRow['content'];


    ?>
    <section id="tabs">
        <ul>
            <li>
                <a href="#tabs-1"><?php echo $guidelinesTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-2"><?php echo $formTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-3"><?php echo $titlesTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-4"><?php echo $quotesTitle; ?></a>
            </li>
            <li>
                <a href="#tabs-5"><?php echo $refTitle; ?></a>
            </li>
        </ul>
        <div id="tabs-1">
            <!--<ol>
                <li>
                    <p>Sänd in ditt manuskript till tidskriftens redaktion.</p>
                </li>
                <li>
                    <p>Manuset i sin helhet får inte överstiga 8000 ord. Detta inkluderar referenslista och
                        sammanfattning.</p>
                </li>
                <li>
                    <p>Inskickat manus ska ha följande sammansättning: titelsida, abstract på engelska, artikel,
                        eventuella tack, referenser.</p>
                </li>
                <li>
                    <p>Titelsida ska innehålla: a. Samtliga författarnamn
                        b. Universitetstillhörighet, eller dylik ”tillhörighet”
                        c. Postadress och e-postadress
                        d.Biografi (100 ord) med titel, ämnesområde, eventuella verk och/eller aktiviteter som har
                        betydelse för sammanhanget.</p>
                </li>
                <li>
                    <p>Ange artikelns titel, författarnamn samt adress på titelsidan och ingen annanstans.</p>
                </li>
                <li>
                    <p>Abstract på engelska ska vara högst 300 ord.</p>
                </li>
                <li>
                    <p>Om inte annat avtalats med redaktionen ska artikeln vara skriven på svenska.</p>
                </li>
                <li>
                    <p>Fotnoter ska undvikas.</p>
                </li>
                <li>
                    <p>Eventuella bilder, tabeller och figurer bifogas på separat blad. Ange i texten var de ska
                        placeras. Författare är ansvariga för copyrightfrågor samt layout på tabeller och figurer.</p>
                </li>
                <li>
                    <p>Bilder som bifogas ska vara högupplösta, det vill säga 300dpi.</p>
                </li>
            </ol>-->

            <?php

            /*
             * @TODO TO HTML OR NOT TO HTML?
             *
             */

            echo $guidelinesContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php" class="edit">Redigera</a></p>';
            }
            ?>
        </div>
        <div id="tabs-2">
            <!--<ol>
                <li>
                    <p>Det fullständiga manuskriptet ska skrivas med 1.5 radavstånd, Times New Roman storlek 12.</p>
                </li>
                <li>
                    <p>Accentueringar görs med hjälp av kursivt, aldrig med fet stil.</p>
                </li>
                <li>
                    <p>Ny paragraf markeras genom retur (entertangenten), inte med mjuk retur eller tab.</p>
                </li>
                <li>
                    <p>I den löpande texten kursiveras titlar på böcker, tidskrifter, tidningar eller filmer. Rubriker
                        på artiklar eller kapitel sätts inom citationstecken.</p>
                </li>
                <li>
                    <p>Använd dubbla citationstecken (”xxx”) för citat och enkla (’xxx’) för citat inne i citat.</p>
                </li>
                <li>
                    <p>Förkortningar skrivs ut (bland annat, med flera, till exempel, och så vidare).</p>
                </li>
                <li>
                    <p>Citat på andra språk än svenska eller engelska ska översättas till svenska.</p>
                </li>
                <li>
                    <p>Manus och abstrakt levereras som bifogat word-dokument via e-post och ska vara så rena som
                        möjligt och utan onödiga formateringar. Det innebär:
                        inga onödiga formateringar
                        inga indrag (bortsett från vid citat, se nedan).</p>
                </li>
            </ol>-->

            <?php

            echo $formContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php" class="edit">Redigera</a></p>';
            }
            ?>

        </div>
        <div id="tabs-3">
            <!--<ol>
                <li>
                    <p>Rubriker och underrubriker skrivs med fet stil och vänsterjusteras.</p>
                </li>
                <li>
                    <p>Rubriker skrivs utan versaler eller kursiveringar.</p>
                </li>
                <li>
                    <p>Använd max två rubriknivåer.</p>
                </li>
                <li>
                    <p>Numrera inte sektioner/paragrafer/rubriker.</p>
                </li>
                <li>
                    <p>Brödtexten ska inte inledas med en mellanrubrik (”Inledning”).
                        Det ska se ut så här på sidan:</p>
                </li>
            </ol>-->
            <?php

            echo $titlesContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php" class="edit">Redigera</a></p>';
            }
            ?>
        </div>
        <div id="tabs-4">
            <!--<ol>
                <li>
                    <p>Citat skrivs med samma typsnitt, storlek och form som övrig text.</p>
                </li>
                <li>
                    <p>Korta citat skrivs inne i löpande text med dubbla citationstecken.</p>
                </li>
                <li>
                    <p>Citat längre än två rader skrivs med samma typsnitt och textstorlek som övrig text, men som ett
                        nytt stycke med en blankrad före och med indrag på båda sidor. Citatet ska skrivas med vanlig
                        stil, inga citationstecken, inget kursivt. Vid citatets slut skrivs referensen efter punkt.
                        (Åsberg 2009: 23) Mellan citatet och fortsättningen av texten ska det vara en blankrad.</p>
                </li>
            </ol>-->

            <?php

            echo $quotesContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php" class="edit">Redigera</a></p>';
            }
            ?>
        </div>
        <div id="tabs-5">
            <!--<ol>
                <li>
                    <p>Använd Harvardsystemet för referenser i texten (observera kronologisk ordning):
                        (Verloo 2011: 24).
                        (Verloo 2009, 2011).
                        (Verloo och Lombardo 2010).
                        (Verloo med flera 2009).
                        (Lombardo 2009; Verloo 2011; Ask, Behrn och Svens 2013).</p>
                </li>
                <li>
                    <p>Referenslista ska utformas enligt följande:  (Notera att tidskriftsnamn och förlag skrivs som det
                        står i verket, exempelvis med inledande versal om så är fallet.)
                        a. Bok, enskild författare 
                        Ahmed, Sara (2006) Queer phenomenology: orientations, objects, others. New York: Duke University
                        Press.

                        b. Bok, flera författare
                        Andersson, Susanne, Amundsdotter, Eva och Svensson, Marita (2009) Mellanchefen en maktpotential.
                        Hudiksvall: Fiber Optic Valley.

                        c. Antologi 
                        McRobbie, Angela och Nava, Mica (red) (1991) Feminism and youth culture: from Jackie to just
                        seventeen. London: MacMillan.

                        d. Artikel i tidskrift, enskild författare 
                        Holm, Birgitta (1993) Edith Södergran och den nya kvinnan. NORA: Nordic Journal of Feminist and
                        Gender Research 4(1): 17-31.

                        e. Artikel i tidskrift, flera författare
                        Hearn, Jeff, Nordberg, Marie, Andersson, Kjerstin, Balkmar, Dag, Gottzén, Lucas, Klinth, Roger,
                        Pringle, Keith, Sandberg, Linn (2012) Hegemonic masculinity and beyond: 40 years of research in
                        Sweden. Men and Masculinities 15(1): 31-55.

                        f. Artikel i antologi 
                        Kristeva, Julia (1990) The adolescent novel. Fletcher, John och Benjamin, Andree (red)
                        Abjection, melancholia and love: the work of Julia Kristeva. New York: Routledge.

                        g. Artikel i tidning 
                        Folkesson, Fredrik (1920) Bort med religionen ur skolorna. Folkets Dagblad Politiken 22 januari
                        1920.

                        h. Rapport publicerad online
                        Kvist, Elin (2008) Intersectionality in gender equality policies. Wien: Institut für die
                        Wissenschaften vom Menschen. http://www.quing.eu/files/results/ir_sweden.pdf [22 januari 2014].

                        Fürst Hörte, Gunilla (2009) Behovet av genusperspektiv: om innovation, hållbar tillväxt och
                        jämställdhet. Vinnova rapport VR 2009:16. www.vinnova.se/upload/EPiStorePDF/vr-09-16.pdf [4
                        januari 2014].</p>
                </li>
            </ol>-->
            <?php

            echo $refContent;
            if (isset($_SESSION['user'])) {
                echo '<p><a href="dashboard_send_script.php" class="edit">Redigera</a></p>';
            }
            ?>
        </div>
    </section>
    <?php
    $scriptRevResult = mysqli_query($link, "SELECT * FROM tgv_script_reviewers") or die(mysqli_error($link));

    echo '<section class="script-reviewers">';
    while ($scriptRevRow = mysqli_fetch_array($scriptRevResult)) {

        $scriptRevId = $scriptRevRow['id'];
        $scriptRevTitle = $scriptRevRow['title'];
        $scriptRevContent = $scriptRevRow['content'];

        echo '<h1 class="script-reviewers-main-title">' . $scriptRevTitle . '</h1>';
        echo '<p>' . $scriptRevContent . '</p>';

        if (isset($_SESSION['user'])) {
            //echo '<p><a href="script_reviewers_edit.php?id=' . $scriptRevId . '">Redigera</a></p>';

            echo '<p><a href="dashboard_send_script.php" class="edit">Redigera</a></p>';

        }
        echo '</section>';
    }
    ?>
    <?php
    $scriptExaminerResult = mysqli_query($link, "SELECT * FROM tgv_script_examiners") or die(mysqli_error($link));

    echo '<section class="script-examiner">';
    while ($scriptExaminerRow = mysqli_fetch_array($scriptExaminerResult)) {

        $scriptExaminerId = $scriptExaminerRow['id'];
        $scriptExaminerTitle = $scriptExaminerRow['title'];
        $scriptExaminerContent = $scriptExaminerRow['content'];

        echo '<h1 class="script-examiner-main-title">' . $scriptExaminerTitle . '</h1>';
        echo '<p>' . nl2br($scriptExaminerContent) . '</p>';

        if (isset($_SESSION['user'])) {
            //echo '<p><a href="script_examiner_edit.php?id=' . $scriptExaminerId . '">Redigera</a></p>';
            echo '<p><a href="dashboard_send_script.php" class="edit">Redigera</a></p>';
        }

        echo '</section>';
    }
    ?>
</main>

<section class="script-form-wrapper">
    <div class="script-form-inner-wrapper">
        <form enctype="multipart/form-data" action="send_script_process.php" method="post" class="script-form">
        <h1 class="send-script-main-title">Skicka in manus</h1>
            <ul class="script-form-ul">
                <li class="script-form-li">
                    <p>Förnamn: </p>
                    <input type="text" name="fname" class="script-form-input" title="Förnamn" required>
                </li>
                <li class="script-form-li">
                    <p>Efternamn: </p>
                    <input type="text" name="lname" class="script-form-input" title="Efternamn" required>
                </li>
                <li class="script-form-li">
                    <p>Din emailaddress: </p>
                    <input type="email" name="from" title="Emailaddress" placeholder="exempel@adress.com" class="script-form-input"
                           required>
                </li>
                <li class="script-form-li">
                    <p>Ämne: </p>
                    <input type="text" name="topic" title="Ämne" class="script-form-input" required>
                </li>
                <li class="script-form-li">
                    <input type="file" name="attachFile" class="scripts-form-input-attach">
                </li>
                <li class="script-form-li">
                    <p>Meddelande: </p>
                    <textarea name="emailMessage" title="Meddelande" rows="7" cols="50"
                              class="script-form-input"></textarea>
                </li>
                <li class="script-form-li">
                    <input type="submit" name="submit" value="Skicka manus" class="script-form-input-submit">
                </li>
            </ul>
        </form>
    </div>
</section>

<?php include('includes/footer.inc') ?>
<script src="js/send_script_tabs.js"></script>
</body>
</html>
<form action="dashboard_process.php" method="post">
    <h1>Kontakt</h1>
    <h2>Redigera Kontaktuppgifter</h2>
    <ul>
        <li>
            <p>Titel: </p>
            <input type="text" name="contactTitle" title="Kontaktuppgifter Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="contactContent" title="Kontaktuppgifter Beskrivning" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" name="contactSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
<form action="dashboard_process.php" method="post">
    <h2>Redigera Footer</h2>
    <ul>
        <li>
            <p>Titel: </p>
            <input type="text" name="footerTitle" title="Footer Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="footerContent" title="Footer Beskrivning" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" name="footerSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
<form action="dashboard_process.php" method="post">
    <h1>Prenumerera</h1>
    <h2>Redigera Prislista</h2>
    <ul>
        <li>
            <p>Titel: </p>
            <input type="text" name="priceTitle" title="Prislista Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="priceContent" title="Prislista Beskrivning" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" name="priceSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
<form action="dashboard_process.php" method="post">
    <h2>Redigera Prenumereringsinfo</h2>
    <ul>
        <li>
            <p>Titel: </p>
            <input type="text" name="subscriptionInfoTitle" title="Prenumereringsinfo Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="subscriptionInfoContent" title="Prenumereringsinfo Beskrivning" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" name="subscriptionInfoSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
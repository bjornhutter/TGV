<form action="dashboard_process.php" method="post">
    <h1>Om oss</h1>
    <h2>Redigera Info om TGV</h2>
    <ul>
        <li>
            <p>Titel: </p>
            <input type="text" name="aboutTitle" title="Om oss Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="aboutContent" title="Om oss Beskrivning" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" name="aboutSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
<form action="dashboard_process.php" method="post">
    <h2>Redigera Om redaktionen</h2>
    <ul>
        <li>
            <p>Titel: </p>
            <input type="text" name="staffTitle" title="Redaktion Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="staffContent" title="Redaktion Beskrivning" rows="10"></textarea>
        </li>
        <li>
            <input type="submit" name="staffSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
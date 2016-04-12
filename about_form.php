<form action="" method="post">
    <h1>Om oss</h1>
    <h2>Redigera Info om TGV</h2>
    <ul>
        <li>
            <p>Titel: </p>
            <input type="text" name="aboutTitle" title="Om oss Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="aboutContent" title="Om oss Beskrivning"></textarea>
        </li>
        <li>
            <input type="submit" name="aboutSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
<form action="" method="post">
    <h2>Redigera Om redaktionen</h2>
    <ul>
        <!--todo göra så man kan lägga till eller ta bort personal, generera fälten från en databas? t.ex. namn, bild etc.-->
        <li>
            <p>Titel: </p>
            <input type="text" name="staffTitle" title="Redaktion Titel">
        </li>
        <li>
            <p>Beskrivning: </p>
            <textarea name="staffContent" title="Redaktion Beskrivning"></textarea>
        </li>
        <li>
            <input type="submit" name="staffSubmit" value="Spara Ändringar">
        </li>
    </ul>
</form>
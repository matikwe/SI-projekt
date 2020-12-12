<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Strona główna</title>
</head>
<body>
<?php
include 'topMenu.php';
?>
<div class="headercontact">
    <br><br><br><br><br>
    <h1>ZAWSZE CHĘTNIE ODPOWIEMY NA TWOJE PYTANIA </h1>
    <br><br><br>
    <h2>JAK MOŻESZ SIĘ Z NAMI SKONTAKTOWAĆ?</h2>
    <br>
<div class="call">
    <h3>ZADZWOŃ</h3>
    785678087
</div>
<div class="write">
    <br>
    <h3>LUB NAPISZ</h3>

    <form action="" method="post">
        <label for="name">Imię:</label><br><br>
        <input type="text" id="name" name="name"><br><br>
        <label for="surname">Nazwisko:</label><br><br>
        <input type="text" id="surname" name="surname"><br><br>
        <label for="mail">Adres email:</label><br><br>
        <input type="text" id="mail" name="mail"><br><br>
        <label for="text">Co chcesz do nas napisać?</label><br><br>
        <textarea name="text" id="text" rows="20" cows="150">
        </textarea><br><br>
        <input type="submit" name="button" value="Wyślij" />
    </form>
</div>
</div>

</body>
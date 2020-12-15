<html lang="pl-PL" xmlns="http://www.w3.org/1999/html">
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
</div>
</div>
<div class="mail">
    <div class="form">
    <form action="mail.php" method="post">
        <h3>NAPISZ DO NAS</h3><br>
        <input type="text" placeholder="Imię" id="name" name="name"><br><br>
        <input type="text" placeholder="Nazwisko" id="surname" name="surname"><br><br>
        <input type="text" placeholder="Mail" id="mail" name="mail"><br><br>
        <textarea> </textarea>


        <input type="submit" class="submit" name="button" value="Wyślij" />
    </form>
    </div>

</div>

</body>
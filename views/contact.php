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
    <form action="index.php?action=contact" method="post">
        <h3>NAPISZ DO NAS</h3><br>
        <input type="text" placeholder="Imię" id="name" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>"><br><br>
        <input type="text" placeholder="Nazwisko" id="surname" name="surname" value="<?php if(!empty($_POST['surname'])) echo $_POST['surname']; ?>"><br><br>
        <input type="text" placeholder="Mail" id="mail" name="mail" value="<?php if(!empty($_POST['mail'])) echo $_POST['mail']; ?>"><br><br>
        <textarea name="info"><?php if(!empty($_POST['info'])) echo $_POST['info']; ?></textarea>
        <div id="error">
            <?php
                if (!empty($_SESSION['error'])) {
                    echo $_SESSION['error'];
                }
                if (!empty($_SESSION['eFormatMail'])) {
                    echo $_SESSION['eFormatMail'];
                }
            ?>
        </div>
        <input type="submit" class="submit" name="button" value="Wyślij" />
    </form>
    </div>

</div>

</body>
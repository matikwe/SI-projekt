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

<h1>Kontakt</h1>
<main>
    <form action="index.php?action=contact" class="test2" method="post">
        <input type="text" placeholder="Imię" id="name" name="name" value="<?php if(!empty($_POST['name'])) echo $_POST['name']; ?>">
        <input type="text" placeholder="Nazwisko" id="surname" name="surname" value="<?php if(!empty($_POST['surname'])) echo $_POST['surname']; ?>">
        <input type="text" placeholder="Mail" id="mail" name="mail" value="<?php if(!empty($_POST['mail'])) echo $_POST['mail']; ?>">
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
</main>

</body>
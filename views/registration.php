<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Rejestracja</title>
</head>
<body>

<?php
include 'topMenu.php';
?>

<h1>Rejestracja</h1>

<main>
    <form action="index.php?action=registration" class="test2" method="POST">
        <label>
            <input type="text" placeholder="Wpisz login" name="login" value="<?php if(!empty($_POST['login'])) echo $_POST['login']; ?>">
            <input type="password" placeholder="Wpisz hasło" name="passwordA">
            <input type="password" placeholder="Powtórz hasło" name="passwordB">
            <input type="text" placeholder="Wpisz mail" name="mailA" value="<?php if(!empty($_POST['mailA'])) echo $_POST['mailA']; ?>">
            <input type="text" placeholder="Powtórz mail" name="mailB" value="<?php if(!empty($_POST['mailB'])) echo $_POST['mailB']; ?>">
            <div id="error">
                <?php
                    if(!empty($_SESSION['emptyRegistration']))
                        echo"<p>".$_SESSION['emptyRegistration']."</p>";

                    if(!empty($_SESSION['ePassword']))
                        echo"<p>".$_SESSION['ePassword']."</p>";

                    if(!empty($_SESSION['eMail']))
                        echo"<p>".$_SESSION['eMail']."</p>";

                    if(!empty($_SESSION['eFormatMail']))
                        echo"<p>".$_SESSION['eFormatMail']."</p>";

                    if(!empty($_SESSION['eMailDB']))
                        echo"<p>".$_SESSION['eMailDB']."</p>";

                    if(!empty($_SESSION['eLoginDB']))
                        echo"<p>".$_SESSION['eLoginDB']."</p>";
                ?>
            </div>
            <input type="submit" value="Zarejestruj" class="submit" name="action">
    </form>
</main>
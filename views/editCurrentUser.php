<html lang="pl-PL" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Dodaj artykuł</title>
</head>
<body>
<?php
include 'topMenu.php';
?>
<h1>Edytuj moje dane</h1>
<main>
    <?php
        $user = unserialize($_SESSION['editCurrentUser']);
    ?>
    <form action="index.php?action=editCurrentUser" class="test2" method="post">
        <label>
            <input type="password" placeholder="Wpisz aktualne hasło" name="passwordCurr">
            <input type="password" placeholder="Wpisz nowe hasło" name="passwordA">
            <input type="password" placeholder="Powtórz nowe hasło" name="passwordB">
            <input type="text" placeholder="Wpisz link do zdjęcia awatara" name="url" value="<?php echo $user->getProfilePicture();?>">
            <div id="error">
                <?php
                    if(!empty($_SESSION['ePassword']))
                        echo"<p>".$_SESSION['ePassword']."</p>";
                ?>
            </div>
            <input type="submit" value="Edytuj moje dane" class="submit" name="edit">
        </label>
    </form>
</main>
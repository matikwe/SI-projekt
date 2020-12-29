<html lang="pl-PL">
    <head>
        <link rel="stylesheet" href="./style/style.css">
        <link rel="stylesheet" href="./style/fontello.css">
        <title>Logowanie</title>
    </head>
    <body>
    <?php
    include 'topMenu.php';
    ?>
    <h1>Login</h1>
        <div class="login">
            <div class="form">
                <form action="index.php?action=login" method="POST">
                    <label>
                        <input type="text" placeholder="Login" name="login" value="<?php if(!empty($_POST['login'])) echo $_POST['login']; ?>">
                        <input type="password" placeholder="Hasło" name="password">
                        <div id="error">
                        <?php
                            if(!empty($_SESSION['emptyLogin']))
                                echo"<p>".$_SESSION['emptyLogin']."</p>";

                            if(!empty($_SESSION['eLogin']))
                                echo"<p>".$_SESSION['eLogin']."</p>";
                            ?>
                        </div>
                        <a href="index.php?action=registration" class="info">Nie masz konta? Zarejestruj się...</a>
                        <input type="submit" value="Zaloguj" class="submit" name="buttonLogin">
                    </label>
                </form>
            </div>
        </div>
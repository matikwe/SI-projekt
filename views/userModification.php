<html lang="pl-PL" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Strona główna</title>
</head>
<body>
<?php
    include "topMenu.php";
    ?>

    <div class="login">
        <div class="form">
        <form action="index.php?action=userModification&name=edit&id=<?php echo $_GET['id']?>" method="POST">
            <label>
                <?php
                $user = unserialize($_SESSION['userDisplay'][($_GET['id']-1)]);

                echo '<input type="text" placeholder="Wpisz login" name="login" value="'.$user->getLogin().'">';
                echo '<input type="text" placeholder="Wpisz mail" name="mail" value="'.$user->getEmail().'">';
                ?>
                <select name="role">
                    <option value="admin">Admin</option>
                    <option value="redaktor">Redaktor</option>
                    <option value="czytelnik">Czytelnik</option>
                </select>
                <?php
                    echo '<div id="error">';

                    if (!empty($_SESSION['error'])) {
                        echo $_SESSION['error'];
                    }
                    if (!empty($_SESSION['eFormatMail'])) {
                        echo $_SESSION['eFormatMail'];
                    }
                    echo '</div>';
                ?>
            <input type="submit" value="Modyfikuj" class="submit">

            </label>
            </form>
        </div>
    </div>





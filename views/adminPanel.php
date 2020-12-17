<html lang="pl-PL" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Strona główna</title>
</head>
<body>
<?php
    include "topMenu.php";
    echo '<table border="2">';
    echo '<div class="tmp">';
    echo "<tr>";
    echo "<td>Lp.</td>";
    echo "<td>Login</td>";
    echo "<td>Mail</td>";
    echo "<td>Rola</td>";
    echo "<td>Modyfikacja</td>";
    echo "</tr>";
        for($i = 0; $i < $_SESSION['count']; $i++){
            $user = unserialize($_SESSION['users'][$i]);

            echo "<tr>";
            echo "<td>".$user->getUserId()."</td>";
            echo "<td>".$user->getLogin()."</td>";
            echo "<td>".$user->getEmail()."</td>";
            echo "<td>".$user->getRole()."</td>";
            echo "<td><a href='index.php?action=adminPanel&name=edit&id=".$user->getUserId()."'>Edytuj</a> <a href='index.php?action=adminPanel&name=delete&id=".$user->getUserId()."'>Usuń</a></td>";
            echo "</tr>";
        }
    echo '</div>';
    echo "</table>";

    if(!empty($_SESSION['editShow'] || !empty($_GET['name']))){

        if($_SESSION['editShow'] == true || $_GET['name'] == 'editNow'){

        ?>
        <div class="login">
            <div class="form">
            <form action="index.php?action=adminPanel&name=editNow&id=<?php echo $_SESSION['idEdit'] ?>" method="POST">
                <label>
                    <?php
                    $user = unserialize($_SESSION['users'][($_SESSION['idEdit']-1)]);

                    echo '<input type="text" placeholder="Wpisz login" name="login" value="'.$user->getLogin().'">';
                    echo '<input type="text" placeholder="Wpisz mail" name="mail" value="'.$user->getEmail().'">';
                    ?>
                    <select name="role" id="cars">
                        <option value="admin">Admin</option>
                        <option value="redaktor">Redaktor</option>
                        <option value="czytelnik">Czytelnik</option>
                    </select>
                    <?php
                    if($_GET['name'] == 'editNow') {
                        echo '<div id="error">';

                        if (!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                        }
                        if (!empty($_SESSION['eFormatMail'])) {
                            echo $_SESSION['eFormatMail'];
                        }
                        echo '</div>';
                    }
                    ?>
                <input type="submit" value="Modyfikuj" class="submit" name="action">

                </label>
                </form>
            </div>
        </div>

        <?php
        }
    }
?>




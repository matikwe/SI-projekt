<?php
include 'Database.php';
include 'User.php';

$_SESSION['error'] = "";
$_SESSION['eFormatMail'] = "";


if(isset($_POST['action'])) {

    $database = new Database('blog');
    $query = $database->getHandle()->query("SELECT * FROM user");

    if (!empty($_GET['name'])) {
        if ($_GET['name'] == "delete") {
            $delete = $database->getHandle()->query('DELETE FROM user WHERE user_id=' . $_GET['id'] . ';');
            $count = $database->count('user');
            for ($i = $_GET['id']; $i <= $count; $i++) {
                $update = $database->getHandle()->query('UPDATE user SET user_id="' . $i . '" WHERE user_id="' . ($i + 1) . '"');
            }
            header("Location: index.php?action=about");
        }

        if ($_GET['name'] == "editNow") {
            if ((empty($_POST['login']) || empty($_POST['mail']))) {
                $_SESSION['error'] = "Wypełnij dane";
            } else {
                if ((filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))) {

                    $idCurrent = $_SESSION['idEdit'];
                    $update = $database->getHandle()->query('UPDATE user SET user_id="' . $idCurrent . '", login="' . $_POST['login'] . '", email="' . $_POST['mail'] . '", role="' . $_POST['role'] . '"  WHERE user_id="' . $idCurrent . '"');

                    header("Location: index.php?action=about");
                } else {
                    $_SESSION['eFormatMail'] = "Zły format maila";
                }
            }
        }
    }
}




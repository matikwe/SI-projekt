<?php
include 'Database.php';
include 'User.php';

$_SESSION['error'] = "";
$_SESSION['eFormatMail'] = "";


//nie chce usunac
if(!empty($_GET['name'])) {
    $database = new Database('blog');
    if ($_GET['name'] == "delete") {
        $id = $_GET['id'];
        $delete = $database->getHandle()->query('DELETE FROM user WHERE user_id='.$id);
        $count = $database->count('user');
        for ($i = $_GET['id']; $i <= $count; $i++) {
            $update = $database->getHandle()->query('UPDATE user SET user_id="' . $i . '" WHERE user_id="' . ($i + 1) . '"');
        }
        header("Location: index.php?action=userList");
    }


    if ($_GET['name'] == "edit") {
        if ((empty($_POST['login']) || empty($_POST['mail']))) {
            $_SESSION['error'] = "Wypełnij dane";
        } else {
            if ((filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))) {

                $idCurrent = $_GET['id'];
                $update = $database->getHandle()->query('UPDATE user SET user_id="' . $idCurrent . '", login="' . $_POST['login'] . '", email="' . $_POST['mail'] . '", role="' . $_POST['role'] . '"  WHERE user_id="' . $idCurrent . '"');

                header("Location: index.php?action=userList");
            } else {
                $_SESSION['eFormatMail'] = "Zły format maila";
            }
        }
    }
}




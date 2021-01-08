<?php
include 'Database.php';

$_SESSION['emptyRegistration'] = "";
$_SESSION['ePassword'] = "";
$_SESSION['eMail'] = "";
$_SESSION['eFormatMail'] = "";
$_SESSION['eMailDB'] = "";
$_SESSION['eLoginDB'] = "";
$_SESSION['errorExtension'] = "";

if(isset($_POST['action'])) {
    $login = $_POST['login'];
    $passwordA = $_POST['passwordA'];
    $passwordB = $_POST['passwordB'];
    $mailA = $_POST['mailA'];
    $mailB = $_POST['mailB'];
    $correct = true;

    if(empty($login) || empty($passwordA) || empty($passwordB) || empty($mailA) || empty($mailB)){
        $_SESSION['emptyRegistration'] = "Uzupełnij dane";
    }else{
        if($passwordA == $passwordB){
            if(strlen($passwordA) < 7){
                $_SESSION['ePassword'] = "Hasło musi mieć 8 znaków";
                $correct = false;
            }
        }else{
            $_SESSION['ePassword'] = "Hasła się różnią";
            $correct = false;
        }

        if ((filter_var($mailA, FILTER_VALIDATE_EMAIL))) {
            if ($mailA != $mailB) {
                $_SESSION['eMail'] = "Maile różnią się";
                $correct = false;
            }
        }else{
            $_SESSION['eFormatMail'] = "Zły format maila";
            $correct = false;
        }
        if(!empty($_POST['url'])){

            $extension = substr($_POST['url'],strlen($_POST['url'])-3,3);
            if($extension == "gif" || $extension == "jpg" || $extension == "png"){

            }else{
                $_SESSION['errorExtension'] = "Wklej linka z rozszerzeniem jpg, gif lub png";
                $correct = false;
            }
        }
        //poprawne dane
        if($correct == true){

            $passHash = password_hash($passwordA, PASSWORD_DEFAULT);

            //operacje na bazie
            $database = new Database("blog");
            $count = $database->count('user') + 1;
            $role = "user";

            if(empty($_POST['url'])){
                $url = "";
            }else{
                $url = $_POST['url'];
            }

            $addDB = true;

            $sameMail = $database->getHandle()->query('SELECT count(user_id) FROM user WHERE email = "'.$mailA.'"');
            if($sameMail->fetchColumn() >= 1){
                $addDB = false;
                $_SESSION['eMailDB'] = "Użytkownik o podanym mail istnieje";
            }

            $sameLogin = $database->getHandle()->query('SELECT count(user_id) FROM user WHERE login = "'.$login.'"');
            if($sameLogin->fetchColumn() >= 1) {
                $addDB = false;
                $_SESSION['eLoginDB'] = "Użytkownik o podanym loginie istnieje";
            }

            if($addDB == true) {

                $addUser = $database->getHandle()->query('INSERT INTO user(user_id, login, password, email, role, zdjęcie_profilowe) VALUES ("' . $count . '","' . $login . '","' . $passHash . '","' . $mailA . '","' . $role . '", "'.$url.'")');
                header("Location: index.php?action=login");
            }
        }
    }
}




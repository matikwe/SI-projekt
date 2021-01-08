<?php

include 'Database.php';
include 'User.php';

$_SESSION['ePassword'] = "";

$database = new Database('blog');

$currID = $_SESSION['currentUserID'];

$query = $database->getHandle()->query('SELECT * FROM user WHERE user_id='.$currID);

foreach ($query as $item){
    $user = new User($item['user_id'], $item['login'], $item['password'], $item['email'], $item['role'], $item['opis'], $item['zdjęcie_profilowe']);
    $_SESSION['editCurrentUser'] = serialize($user);
}

if(isset($_POST['edit'])){
    $user = unserialize($_SESSION['editCurrentUser']);

    $correctPass = false;
    $correct = true;
    if(password_verify($_POST['passwordCurr'], $user->getPassword())){
        $correctPass = true;
    }else{
        $_SESSION['ePassword'] = "Złe hasło nie możesz nic zmieć! Wpisz poprawne hasło...";
    }

    if($correctPass == true){

        $passwordA = $_POST['passwordA'];
        $passwordB = $_POST['passwordB'];

        if ($passwordA == $passwordB) {
            if (strlen($passwordA) < 7) {
                $_SESSION['ePassword'] = "Hasło musi mieć 8 znaków";
                $correct = false;
            }
        } else {
            $_SESSION['ePassword'] = "Hasła się różnią";
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

        if($correct == true){

            $url = $_POST['url'];
            $hashPassword = password_hash($passwordA, PASSWORD_DEFAULT);

            $updateData = $database->getHandle()->query('UPDATE user SET password="'.$hashPassword.'", zdjęcie_profilowe="'.$url.'" WHERE user_id='.$currID);

            header('Location: index.php?action=userPanel');
        }
    }
}

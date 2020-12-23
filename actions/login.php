<?php
include 'Database.php';
$_SESSION['emptyLogin'] = "";
$_SESSION['eLogin'] = "";
$correctLogin = false;

if(isset($_POST['buttonLogin'])){

    if(empty($_POST['login']) || empty($_POST['password'])){
        $_SESSION['emptyLogin'] = "Uzupełnij dane logowania";
        $correctLogin = true;
    }else{
        $database = new Database('blog');
        $query = $database->getHandle()->query(sprintf("SELECT user_id, login, password, role FROM user WHERE login=\"%s\"", $_POST['login']));

        foreach($query as $row){
            if(password_verify($_POST['password'], $row['password']) == true){
                $_SESSION['currentUserID'] = $row['user_id'];
                $_SESSION['currentLogin'] = $_POST['login'];
                $_SESSION['currentRole'] = $row['role'];
                header("Location: index.php?action=home");
                $correctLogin = true;
            }
        }
        if($correctLogin == false){
            $_SESSION['eLogin'] = "Podaj prawidłowe dane logowania";
        }
    }
}

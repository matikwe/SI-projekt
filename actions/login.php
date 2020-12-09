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
        $query = $database->getHandle()->query('SELECT login, password FROM user WHERE login="'.$_POST['login'].'"');

        foreach($query as $row){
            if(password_verify($_POST['password'], $row['password']) == true){
                $_SESSION['currentLogin'] = $_POST['login'];
                header("Location: index.php?action=home");
                $correctLogin = true;
            }
        }
        if($correctLogin == false){
            $_SESSION['eLogin'] = "Podaj prawidłowe dane logowania";
        }
    }
}

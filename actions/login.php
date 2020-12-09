<?php
include 'Database.php';

if(isset($_POST['buttonLogin'])){

    if(empty($_POST['login']) || empty($_POST['password'])){
        echo "Uzupełnij dane logowania";
    }else{
        $database = new Database('blog');
        $query = $database->getHandle()->query('SELECT login, password FROM user WHERE login="'.$_POST['login'].'"');

        foreach($query as $row){
            if(password_verify($_POST['password'], $row['password']) == true){
                $_SESSION['currentLogin'] = $_POST['login'];
                header("Location: index.php?action=home");
            }
        }
    }
}

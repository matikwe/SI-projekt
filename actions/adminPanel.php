<?php
include 'Database.php';
include 'User.php';

$_SESSION['editShow'] = false;
$_SESSION['error'] = "";
$database = new Database('blog');
$query = $database->getHandle()->query("SELECT * FROM user");
$i = 0;
foreach ($query as $row){
    $user = new User($row['user_id'],$row['login'],$row['password'],$row['email'],$row['role']);
    $_SESSION['users'][$i] = serialize($user);
    $i++;
}
$_SESSION['count'] = $i;

if(!empty($_GET['name'])){

    if($_GET['name'] == "edit"){
        $_SESSION['editShow'] = true;
        $_SESSION['idEdit'] = $_GET['id'];
    }

    if($_GET['name'] == "delete"){
        $delete = $database->getHandle()->query('DELETE FROM user WHERE user_id='.$_GET['id'].';');
        $count = $database->count('user');
        for($i = $_GET['id']; $i <= $count; $i++)
       {
           $update = $database->getHandle()->query('UPDATE user SET user_id="'.$i.'" WHERE user_id="'.($i+1).'"');
       }
        header("Location: index.php?action=adminPanel");
    }

    if($_GET['name'] == "editNow"){
        if(empty($_POST['login']) || empty($_POST['mail'])){
            $_SESSION['error'] = "Wypełnij dane";
        }else{

            $idCurrent = $_SESSION['idEdit'];
            $user = unserialize($_SESSION['users'][$idCurrent-1]);
            $update = $database->getHandle()->query('UPDATE user SET user_id="'.$idCurrent .'", login="'.$_POST['login'].'", password="'.$user->getPassword().'", email="'.$_POST['mail'].'", role="'.$_POST['role'].'"  WHERE user_id="'.$idCurrent .'"');
            header("Location: index.php?action=adminPanel");
        }
    }
}



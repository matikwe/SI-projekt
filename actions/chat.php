<?php
include 'Database.php';

$_SESSION ['message'] = "";
$database = new Database("blog");

if(isset($_POST['action'])) {

    $message = $_POST ['message'];

    $query = $database->getHandle()->query('SELECT * FROM czat');

    $i = 0;
    foreach ($query as $item){
        $user = new User($item['user_id'], $item['login'], $item['password'], $item['email'], $item['role']);
        $_SESSION['userDisplay'][$i] = serialize($user);
        $i++;
    }
    $_SESSION['countUserDisplay'] = $i;

    if(empty($message)) {
        $_SESSION['emptyMessage'] = "Wprowadz wiadomosc";

    } else if (empty($_SESSION['currentUserID'])) {
        $_SESSION['emptyUserID'] = "Musisz być zalogowany";

    } else {
        $addMessage = $database->getHandle()->query('INSERT INTO czat(user_id, tresc) VALUES ("' . $_SESSION['currentUserID'] . '","' . $message . '")');
    }
}
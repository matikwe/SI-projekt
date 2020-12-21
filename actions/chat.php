<?php
include 'Database.php';

$_SESSION ['message'] = "";
$database = new Database("blog");

if(isset($_POST['action'])) {

    $message = $_POST ['message'];

    $query = $database->getHandle()->query('SELECT * FROM czat');

    $i = 0;
    foreach ($query as $item){
        $chat = new Chat($item['id_message'], $item['message'], $item['date']);
        $_SESSION['messagesDisplay'][$i] = serialize($chat);
        $i++;
    }
    $_SESSION['countMessagesDisplay'] = $i;

    if(empty($message)) {
        $_SESSION['emptyMessage'] = "Wprowadz wiadomosc";

    } else if (empty($_SESSION['currentUserID'])) {
        $_SESSION['emptyUserID'] = "Musisz być zalogowany";

    } else {
        $addMessage = $database->getHandle()->query('INSERT INTO czat(user_id, tresc) VALUES ("' . $_SESSION['currentUserID'] . '","' . $message . '")');
    }
}
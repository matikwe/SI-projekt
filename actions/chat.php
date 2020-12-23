<?php
include 'Database.php';
include 'ChatClass.php';

$_SESSION ['message'] = "";
$database = new Database("blog");

$query = $database->getHandle()->query('SELECT * FROM czat');

$i = 0;
foreach ($query as $item){
    $chat = new ChatClass($item['id_wiadomosci'], $item['user_id'], $item['tresc'], $item['data']);
    $_SESSION['messagesDisplay'][$i] = serialize($chat);
    $i++;
}
$_SESSION['countMessagesDisplay'] = $i;



if(isset($_POST['action'])) {

    $message = $_POST ['message'];
    echo $message;


    if(empty($message)) {
        $_SESSION['emptyMessage'] = "Wprowadz wiadomosc";

    } else if (empty($_SESSION['currentUserID'])) {
        $_SESSION['emptyUserID'] = "Musisz być zalogowany";

    } else {
        $addMessage = $database->getHandle()->query('INSERT INTO czat(user_id, tresc) VALUES ("' . $_SESSION['currentUserID'] . '","' . $message . '")');
        header("Location: index.php?action=chat");
    }
}
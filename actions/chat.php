<?php
include 'Database.php';
include 'ChatClass.php';

$_SESSION ['emptyMessage'] = "";
$_SESSION ['emptyUserID'] = "";
$database = new Database("blog");

$query = $database->getHandle()->query('SELECT c.id_wiadomosci, c.user_id, u.login, c.tresc, c.data FROM czat c INNER JOIN user u ON u.user_id = c.user_id');

$i = 0;
foreach ($query as $item) {
    $chat = new ChatClass($item['id_wiadomosci'], $item['user_id'], $item['login'], $item['tresc'], $item['data']);
    $_SESSION['messagesDisplay'][$i] = serialize($chat);
    $i++;
}
$_SESSION['countMessagesDisplay'] = $i;


if (isset($_POST['action'])) {

    $message = $_POST ['message'];

    if (empty($message)) {
        $_SESSION['emptyMessage'] = "Wprowadz wiadomosc";

    } else if (empty($_SESSION['currentUserID'])) {
        $_SESSION['emptyUserID'] = "Musisz być zalogowany";

    } else {
        $addMessage = $database->getHandle()->query('INSERT INTO czat(user_id, tresc) VALUES ("' . $_SESSION['currentUserID'] . '","' . $message . '")');
        header("Location: index.php?action=chat");
    }
}
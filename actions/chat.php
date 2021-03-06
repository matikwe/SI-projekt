<?php
include 'Database.php';
include 'ChatClass.php';

$_SESSION ['emptyMessage'] = "";
$_SESSION ['emptyUserID'] = "";
$database = new Database("blog");

$query = $database->getHandle()->query('SELECT c.id_wiadomosci, c.user_id, u.login, c.tresc, c.data, u.zdjęcie_profilowe FROM czat c INNER JOIN user u ON u.user_id = c.user_id');

$i = 0;
foreach ($query as $item) {
    $chat = new ChatClass($item['id_wiadomosci'], $item['user_id'], $item['login'], $item['tresc'], $item['data'], $item['zdjęcie_profilowe']);
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

        $messageID = $database->count('czat') + 1;
        date_default_timezone_set('Europe/Warsaw');
        $time = date("h:i | d-m-Y",time());

        $addMessage = $database->getHandle()->query('INSERT INTO czat(id_wiadomosci, user_id, tresc, data) VALUES ("' . $messageID . '", "' . $_SESSION['currentUserID'] . '","' . $message . '" ,"' . $time . '")');
        header("Location: index.php?action=chat");
    }
}
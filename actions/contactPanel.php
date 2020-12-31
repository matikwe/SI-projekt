<?php
include 'Database.php';
include 'ContactClass.php';

$data = new Database('blog');

$data->count('pytania');
$query = $data->getHandle()->query('SELECT * FROM pytania WHERE czyKontakt="false"');

$i = 0;
foreach ($query as $item) {
    $contact = new ContactClass($item['id_pytania'], $item['imie'], $item['nazwisko'], $item['email'], $item['tresc'], $item['czyKontakt']);
    $_SESSION['contactDisplay'][$i] = serialize($contact);
    $i++;
}
$_SESSION['countContactDisplay'] = $i;

if(isset($_POST['contact'])) {
    $contactID = $_GET['contactID'];
    $data->getHandle()->query('UPDATE pytania SET czyKontakt="true" WHERE id_pytania='.$contactID);
    header('Location: index.php?action=contactPanel');
}
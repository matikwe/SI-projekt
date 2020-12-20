<?php
include 'Database.php';
include 'User.php';

$data = new Database('blog');

$data->count('contact');
$query = $data->getHandle()->query('SELECT * FROM pytania');

$i = 0;
foreach ($query as $item){
    $contact = new Contact ($item['questionId'], $item['name'], $item['surname'], $item['email'], $item['contents'], $item['contact']);
    $_SESSION['userDisplay'][$i] = serialize($contact);
    $i++;
}
$_SESSION['countContactDisplay'] = $i;
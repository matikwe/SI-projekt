<?php
include 'Database.php';
include 'User.php';

$data = new Database('blog');

$data->count('user');
$query = $data->getHandle()->query('SELECT * FROM user');


$i = 0;
foreach ($query as $item){
    $user = new User($item['user_id'], $item['login'], $item['password'], $item['email'], $item['role'], $item['opis'], $item['zdjęcie_profilowe']);
    $_SESSION['userDisplay'][$i] = serialize($user);
    $i++;
}
$_SESSION['countUserDisplay'] = $i;
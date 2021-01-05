<?php
include 'Database.php';
include 'User.php';

$data = new Database('blog');

//$data->count('user');
$query = $data->getHandle()->query('SELECT * FROM user WHERE role IN("admin","redaktor")');


/*foreach($query as $row) {
    $user[$row] = new user($row[user_id], $row['login']);
}*/
/*
for ($i = 0; $row = $query->fetch(); $i++){
    $user[$i] = new User($row['user_id'], $row['login'], $row['password'], $row['email'], $row['role']);
}
*/
//$_SESSION['w'] = $i;

//pobranie userów z bazy
$i = 0;
foreach ($query as $item) {
    $user = new User($item['user_id'], $item['login'], $item['password'], $item['email'], $item['role'], $item['opis'], $item['zdjęcie_profilowe']);
    $_SESSION['userDisplay'][$i] = serialize($user);
    $i++;
}
$_SESSION['countUserDisplay'] = $i;

<?php
include 'Database.php';
include 'User.php';

$data = new Database('blog');

$data->count('user');
$query = $data->getHandle()->query('SELECT * FROM user');



/*foreach($query as $row) {
    $user[$row] = new user($row[user_id], $row['login']);
}*/

for ($i = 0; $row = $query->fetch(); $i++){
    $user[$i] = new User($row['user_id'], $row['login'], $row['password'], $row['email'], $row['role']);
}

$_SESSION['w'] = $i;
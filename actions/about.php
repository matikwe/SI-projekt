<?php
include 'Database.php';
include 'user.php';

$data = new Database('blog');

$data->count('user');
$query = $data->getHandle()->query('SELECT user_id, login FROM user');



/*foreach($query as $row) {
    $user[$row] = new user($row[user_id], $row['login']);
}*/

for ($i = 0; $row = $query->fetch(); $i++){
    $user[$i] = new user($row['user_id'], $row['login']);
}

$_SESSION['w'] = $i;
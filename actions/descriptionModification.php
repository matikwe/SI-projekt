<?php
include 'Database.php';
include 'User.php';

if(isset($_POST['click'])){
    $descroption = $_POST['description'];
    $currentID = $_GET['id'];
    $data = new Database('blog');
    $query = $data->getHandle()->query('UPDATE user SET opis="' . $descroption . '" WHERE user_id="'.$currentID.'"');
    header("Location: index.php?action=about");
}



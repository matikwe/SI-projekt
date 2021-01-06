<?php
include 'Database.php';

$database = new Database("blog");
$count = $database->count('ciekawostki');

$day = date("d");
$idFF = 1;

for($i = 0; $i < $day; $i++) {
    $idFF++;
    if($idFF > $count) $idFF = 1;
}

$query = $database->getHandle()->query('SELECT treść FROM ciekawostki WHERE id_ciekawostki='.$idFF);
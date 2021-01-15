<?php
include 'Database.php';
include 'Article.php';
include 'User.php';

$database = new Database("blog");
$count = $database->count('ciekawostki');

$day = date("d");
$idFF = 1;

for($i = 0; $i < $day; $i++) {
    $idFF++;
    if($idFF > $count) $idFF = 1;
}

$query = $database->getHandle()->query('SELECT treść FROM ciekawostki WHERE id_ciekawostki='.$idFF);

$newArticles = $database->getHandle()->query("SELECT tytul, tresc FROM artykul WHERE akceptacja_admina LIKE 'true' ORDER BY id_artykulu DESC LIMIT 3");

$index = 0;
foreach($newArticles AS $row) {
    $object[$index] = new Article(0, $row['tytul'], $row['tresc'], '', '', 1);
    $index++;
}
$index = 0;
$newUsers = $database->getHandle()->query('SELECT login, opis FROM user');
foreach($newUsers AS $row) {
    $nU[$index] = new User(0, $row['login'], '', '', '', $row['opis'], '');
    $index++;
}
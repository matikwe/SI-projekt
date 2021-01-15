<?php
include 'Database.php';
include 'Article.php';
$_SESSION['searchField'] = '';
if(!empty($_POST['searchField'])) {
    $searchField = $_POST['searchField'];
} else {
    $searchField = '-';
}

$_SESSION['searchField'] = $searchField;

if(isset($_POST['searchField'])){
    $database = new Database('blog');
    $query = $database->getHandle()->query('SELECT * FROM artykul WHERE akceptacja_admina="true" AND tytul LIKE ("%'.$searchField.'%") ');
    $i = 0;

    foreach ($query as $item){
        $article = new Article($item['id_artykulu'], $item['tytul'], $item['tresc'], $item['autor'], $item['zdjecie'], $item['akceptacja_admina']);
        $_SESSION['articlesSearch'][$i] = serialize($article);
        $i++;
    }
    $_SESSION['articlesSearchCount'] = $i;
    header("Location: index.php?action=articles&name=searchArticle");
}
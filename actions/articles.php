<?php
include 'Database.php';
include "Article.php";

$database = new Database('blog');

$query = $database->getHandle()->query('SELECT * FROM artykul');
$i = 0;
$j = 0;
$k = 0;
foreach ($query as $item) {
    $article = new Article($item['id_artykulu'], $item['tytul'], $item['tresc'], $item['autor'], $item['zdjecie'], $item['akceptacja_admina']);

    if($item['akceptacja_admina'] == "true") {
        $_SESSION['articles'][$i] = serialize($article);
        $i++;
    }else
    if($item['akceptacja_admina'] == "false") {
        $_SESSION['articlesNotAccepted'][$j] = serialize($article);
        $j++;
    }
}

$_SESSION['countArticles'] = $i;
$_SESSION['countArticlesNotAccepted'] = $j;


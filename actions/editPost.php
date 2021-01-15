<?php
include 'Database.php';
include 'Article.php';

$_SESSION['errorPost'] = "";
$_SESSION['errorUrl'] = "";
$_SESSION['errorTitle'] = "";
$_SESSION['errorExtension'] = "";

$database = new Database('blog');

$id = $_GET['id'];

$loadData = $database->getHandle()->query('SELECT * FROM artykul WHERE id_artykulu = '.$id);

foreach ($loadData as $item){
    $article = new Article($item['id_artykulu'], $item['tytul'], $item['tresc'], $item['autor'], $item['zdjecie'], $item['akceptacja_admina']);
    $_SESSION['editArticle'] = serialize($article);
}

$validation = true;
if(isset($_POST['addPost'])) {

    if (strlen($_POST['post']) < 50) {
        $_SESSION['errorPost'] = "Wpisany artykuł jest zbyt krótki. Powinien zawierać 50 znaków.";
        $validation = false;
    }
    if (empty($_POST['url'])) {
        $_SESSION['errorUrl'] = "Wpisz link do zdjęcia.";
        $validation = false;
    } else {
        $extension = substr($_POST['url'], strlen($_POST['url']) - 3, 3);
        if ($extension == "gif" || $extension == "jpg" || $extension == "png") {

        } else {
            $_SESSION['errorExtension'] = "Wklej linka z rozszerzeniem jpg, gif lub png";
            $validation = false;
        }
    }
    if (empty($_POST['title'])) {
        $_SESSION['errorTitle'] = "Wpisz tytuł.";
        $validation = false;
    }

    if ($validation == true) {
        //zmiana

        $post = $_POST['post'];
        $url = $_POST['url'];
        $title = $_POST['title'];
        $idArt = $_GET['id'];

        $updateData = $database->getHandle()->query('UPDATE artykul SET tytul="'.$title.'",  tresc="'.$post.'", zdjecie="'.$url.'" WHERE id_artykulu='.$idArt);

        header('Location: index.php?action=articles');
    }
}

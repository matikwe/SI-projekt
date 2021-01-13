<?php
include 'Database.php';
$_SESSION['errorPost'] = "";
$_SESSION['errorUrl'] = "";
$_SESSION['errorTitle'] = "";
$_SESSION['errorExtension'] = "";
$_SESSION['postSuccessfullyAdded'] = "";
$validation = true;
if(isset($_POST['addPost'])){

    if(strlen($_POST['post']) < 50){
        $_SESSION['errorPost'] = "Wpisany artykuł jest zbyt krótki. Powinien zawierać 50 znaków.";
        $validation = false;
    }
    if(empty($_POST['url'])){
        $_SESSION['errorUrl'] = "Wpisz link do zdjęcia.";
        $validation = false;
    }else{
        $extension = substr($_POST['url'],strlen($_POST['url'])-3,3);
        if($extension == "gif" || $extension == "jpg" || $extension == "png"){

        }else{
            $_SESSION['errorExtension'] = "Wklej linka z rozszerzeniem jpg, gif lub png";
            $validation = false;
        }
    }
    if(empty($_POST['title'])){
        $_SESSION['errorTitle'] = "Wpisz tytuł.";
        $validation = false;
    }

    if($validation == true){

        $post = $_POST['post'];
        $url = $_POST['url'];
        $title = $_POST['title'];

        $database = new Database('blog');
        $count = $database->count('artykul')+1;
        $login = $_SESSION['currentLogin'];
        $query = $database->getHandle()->query('INSERT INTO artykul(id_artykulu, tytul, tresc, autor, zdjecie, akceptacja_admina) VALUES (' . $count . ',"'.$title.'","' . $post . '","' . $login . '","' . $url . '","false")');
        header("Location: index.php?action=userPanel");
        $_SESSION['postSuccessfullyAdded'] = "Pomyślnie dodano post, czeka na akceptację administratora...";
    }
}

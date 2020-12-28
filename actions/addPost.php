<?php
include 'Database.php';
$_SESSION['errorPost'] = "";
$_SESSION['errorUrl'] = "";
$_SESSION['errorTitle'] = "";
$validation = true;
if(isset($_POST['addPost'])){

    if(strlen($_POST['post']) > 50){
        $post = $_POST['post'];
    }else{
        $_SESSION['errorPost'] = "Wpisany artykuł jest zbyt krótki. Powinien zawierać 50 znaków.";
        $validation = false;
    }
    if(!empty($_POST['url'])){
        $url = $_POST['url'];
    }else{
        $_SESSION['errorUrl'] = "Wpisz link do zdjęcia.";
        $validation = false;
    }
    if(!empty($_POST['title'])){
        $title = $_POST['title'];
    }else{
        $_SESSION['errorTitle'] = "Wpisz tytuł.";
        $validation = false;
    }

    if($validation == true){
       $database = new Database('blog');
       $count = $database->count('artykul')+1;
       $login = $_SESSION['currentLogin'];
       $query = $database->getHandle()->query('INSERT INTO artykul(id_artykulu, tresc, autor, zdjecie, akceptacja_admina) VALUES ("' . $count . '","'.$title.'","' . $post . '","' . $login . '","' . $url . '","false")');
       header("Location: index.php?action=userPanel");
    }
}

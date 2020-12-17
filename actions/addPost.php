<?php
$_SESSION['errorPost'] = "";
$_SESSION['errorUrl'] = "";
$validation = true;
if(isset($_POST['addPost'])){
    $post = $_POST['post'];
    if(strlen($post) > 50){
        //
    }else{
        $_SESSION['errorPost'] = "Wpisany artykuł jest zbyt krótki. Powinien zawierać 50 znaków.";
        $validation = false;
    }
    if(!empty($_POST['url'])){
        //
    }else{
        $_SESSION['errorUrl'] = "Wpisz link do zdjęcia.";
        $validation = false;
    }

    if($validation == true){
        //wysłanie do bazy
    }
}

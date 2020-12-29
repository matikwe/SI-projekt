<html lang="pl-PL" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Dodaj artykuł</title>
</head>
<body>
<?php
include 'topMenu.php';
?>
<div class="mail">
    <div class="form">
        <form action="index.php?action=addPost" method="post">
            <h3>Dodaj artykuł</h3><br>
            <textarea name="post" placeholder="Wpisz treść artykułu" value="<?php if(!empty($_POST['post']))echo $_POST['post']?>"></textarea>
            <input type="text" placeholder="Wpisz tytuł" name="title">
            <input type="text" placeholder="Wklej link do zdjęcia" name="url">
            <div id="error">
                <?php
                    if(!empty($_SESSION['errorPost'])){
                        echo $_SESSION['errorPost'];
                    }
                    if(!empty($_SESSION['errorUrl'])){
                        echo $_SESSION['errorUrl'];
                    }
                    if(!empty($_SESSION['errorTitle'])){
                        echo $_SESSION['errorTitle'];
                    }
                ?>
            </div>
            <input type="submit" class="submit" name="addPost" value="Dodaj artykuł" />
        </form>
    </div>
</div>
<?php

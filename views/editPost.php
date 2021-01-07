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
<h1>Edytuj artykuł</h1>
<main>
    <form action="index.php?action=editPost&id=<?php echo $_GET['id'] ?>" class="test2" method="post">
        <?php
            $article = unserialize($_SESSION['editArticle']);
        ?>

        <input type="text" placeholder="Wpisz tytuł" name="title" value="<?php echo $article->getTitle()?>">
        <textarea name="post" placeholder="Wpisz treść artykułu"><?php echo $article->getContents()?></textarea>
        <input type="text" placeholder="Wklej link do zdjęcia" name="url" value="<?php echo $article->getImg()?>">
        <div id="error">
            <?php

            if (!empty($_SESSION['errorPost'])) {
                echo $_SESSION['errorPost'];
            }
            if (!empty($_SESSION['errorUrl'])) {
                echo $_SESSION['errorUrl'];
            }
            if (!empty($_SESSION['errorTitle'])) {
                echo $_SESSION['errorTitle'];
            }

            if (!empty($_SESSION['errorExtension'])) {
                echo $_SESSION['errorExtension'];
            }
            ?>
        </div>
        <input type="submit" class="submit" name="addPost" value="Edytuj artykuł"/>
    </form>
</main>
<?php

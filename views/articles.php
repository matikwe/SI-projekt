<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Artykuły</title>
</head>
<body>
<?php
include 'topMenu.php';
if(empty($_GET['name']))
{
?>
<div class="articles">
    <?php
    for($i = $_SESSION['countArticles']-1; $i >= 0; $i--){
        $article = unserialize($_SESSION['articles'][$i]);
        ?>

            <article>
                <h1><?php echo $article->getTitle();?></h1>
                <p><img src="<?php echo $article->getImg();?>"/>
                <?php echo substr($article->getContents(),0,500).'...';?></p>
                <h4><a href="index.php?action=articles&name=currentPost&postID=<?php echo $article->getIdArticle()?>&number=<?php echo $i?>">Czytaj więcej</a></h4>
                <h5>Autor: <?php echo $article->getAuthor();?></h5>
            </article>

    <?php
    }?>
</div>
<?php
}else
{
    $number = $_GET['number'];
    $article = unserialize($_SESSION['articles'][$number]);
?>
    <div class="currentArticle">
        <article>
            <h1><?php echo $article->getTitle();?></h1>
            <p><img src="<?php echo $article->getImg();?>"/>
                <?php echo $article->getContents();?></p>
            <!--<h4><a href="index.php?action=articles&name=currentPost&postID=<?php echo $article->getIdArticle()?>&number=<?php echo $i?>">Czytaj więcej</a></h4>-->
            <h5>Autor: <?php echo $article->getAuthor();?></h5>
        </article>
    </div>
<?php
}
?>
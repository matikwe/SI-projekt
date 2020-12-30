<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Artykuły</title>
</head>
<body>
<?php
include 'topMenu.php';
?>
<h1>Artykuły</h1>

    <?php
        if (empty($_GET['name']) || $_GET['name']=='acceptArticle')
        {
    ?>

    <div class="articles">

        <?php
        if(empty($_GET['name'])){
            $i = $_SESSION['countArticles'] - 1;
            echo '<a href="index.php?action=articles&name=acceptArticle" class="smallButton">Dodane artykuły</a>';
        }else if($_GET['name']=='acceptArticle'){
            $i = $_SESSION['countArticlesNotAccepted'] - 1;
            echo '<a href="index.php?action=articles" class="smallButton">Powrót do dodanych</a>';
        }
        for (; $i >= 0; $i--) {
            if(empty($_GET['name'])){
                $article = unserialize($_SESSION['articles'][$i]);
            }else if($_GET['name']=='acceptArticle'){
                $article = unserialize($_SESSION['articlesNotAccepted'][$i]);
            }

            ?>

            <article>
                <h1><?php echo $article->getTitle(); ?></h1>
                <p><img src="<?php echo $article->getImg(); ?>"/>
                    <?php echo substr($article->getContents(), 0, 500) . '...'; ?></p>
                <?php
                if(empty($_GET['name'])) ?>
                    <h4><a href="index.php?action=articles&name=currentPost&postID=<?php echo $article->getIdArticle() ?>&number=<?php echo $i ?>">Czytaj więcej</a></h4>


                <h5>Autor: <?php echo $article->getAuthor(); ?></h5>
                <?php
                    if(!empty($_GET['name'])){
                        if(($_GET['name'] == 'acceptArticle')&&($_SESSION['currentRole'] == 'admin' || $_SESSION['currentRole'] == 'redaktor')){
                ?>
                        <a href="index.php?action=articles&name=acceptDB&postID=<?php echo $article->getIdArticle() ?>" class="smallButton">Akceptuj</a>
                <?php
                    }
                }else if(($_SESSION['currentRole'] == 'admin' || $_SESSION['currentRole'] == 'redaktor')){
                ?>
                        <a href="index.php?action=articles&name=deleteDB&postID=<?php echo $article->getIdArticle() ?>" class="smallButton">Usuń z głównej</a>
                <?php
                }
                ?>
            </article>

            <?php
        } ?>
    </div>
    <?php
}else if($_GET['name'] == 'currentPost')
{
$number = $_GET['number'];
$article = unserialize($_SESSION['articles'][$number]);
?>
<div class="currentArticle">
    <article>
        <h1><?php echo $article->getTitle(); ?></h1>
        <p><img src="<?php echo $article->getImg(); ?>"/>
            <?php echo $article->getContents(); ?></p>
        <h5>Autor: <?php echo $article->getAuthor(); ?></h5>
    </article>

</div>


    <?php

    $next = $number+1;
    $back = $number-1;
    $max = $_SESSION['countArticles'] - 1;

    if($back >= 0){
    ?>
        <a href="index.php?action=articles&name=currentPost&number=<?php echo $back?>" class="smallButton">Poprzedni artykuł</a>
    <?php }
    if($next <= $max){
    ?>
        <a href="index.php?action=articles&name=currentPost&number=<?php echo $next?>" class="smallButton">Następny artykuł</a>
    <?php
    }
}
?>
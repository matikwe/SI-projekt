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
<div class="articles">
    <?php
    for($i = $_SESSION['countArticles']-1; $i >= 0; $i--){
        $article = unserialize($_SESSION['articles'][$i]);
        ?>
            <article>
                <h1><?php echo $article->getTitle();?></h1>
                <p><img src="<?php echo $article->getImg();?>"/>
                <?php echo substr($article->getContents(),0,600).'...';?></p>
                <h4><a href="index.php?action=articles&name=currentPost&postID=<?php echo $article->getIdArticle()?>">Czytaj więcej</a></h4>
                <h5>Autor: <?php echo $article->getAuthor();?></h5>
            </article>
    <?php
    }
    ?>
</div>
    <!-- akcaptacja artykulu do ogarniecia w menu/ lub przycisk ?!-->
    <!--
    <br><br><br>

    <article id="post-1" class="thumbnail"">
    <div class="entry-thumbnail">
        <img width="200" height="200" src="./sample.jpg"  </img>
        <div class="entry-meta">
            <span class="posted-on"><a href="" rel="bookmark"><time datetime="">11/12/2020</time><time  datetime="2020-12-11T20:45:04+01:00">13/12/2020</time></a></span>
        </div>
        <h1 class="entry-title"><a  rel="bookmark">Article</a></h1>	</header>
    </div>

    <a href="" class="entry-link"><span class="screen-reader-text">Czytaj dalej <span class="meta-nav">&rarr;</span></span></a>

    </article>
    -->


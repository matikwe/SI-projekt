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
    $_SESSION['jump'] = 4; //co ile zmiana strony

    if (empty($_GET['name']) || $_GET['name']=='acceptArticle' || $_GET['name']=='searchArticle')
    {
        echo '<div class="articles">';
        if(empty($_GET['page'])){
            $_GET['page'] = 0;
        }

        if(empty($_GET['name'])){
            $i = $_SESSION['countArticles'] - 1;
            if($_SESSION['currentRole'] == 'admin' || $_SESSION['currentRole'] == 'redaktor' )
                echo '<a href="index.php?action=articles&name=acceptArticle" class="smallButton">Dodane artykuły</a>';
        }
        else if($_GET['name']=='acceptArticle'){
            $i = $_SESSION['countArticlesNotAccepted'] - 1;
            echo '<a href="index.php?action=articles" class="smallButton">Powrót do dodanych</a>';
        }
        else if($_GET['name']=='searchArticle'){
            $i = $_SESSION['articlesSearchCount'] - 1;
        }

        $_SESSION['count'] = ceil(($i+1) / $_SESSION['jump']);

        $start = ($i - ($_GET['page']*$_SESSION['jump']));
        $stop = ($i - ($_GET['page']*$_SESSION['jump'] - 1) - $_SESSION['jump']);

        if($stop < 0)
            $stop = 0;

        for ($i = $start; $i >= $stop; $i--) {
            if(empty($_GET['name'])){
                $article = unserialize($_SESSION['articles'][$i]);
            }else if($_GET['name']=='acceptArticle'){
                $article = unserialize($_SESSION['articlesNotAccepted'][$i]);
            }
            else if($_GET['name']=='searchArticle'){
                $article = unserialize($_SESSION['articlesSearch'][$i]);
            }

            ?>

            <article>
                <h1><?php echo $article->getTitle(); ?></h1>
                <p><img src="<?php echo $article->getImg(); ?>"/>
                    <?php echo substr($article->getContents(), 0, 500) . '...'; ?></p>
                <?php
                if(empty($_GET['name']) || $_GET['name'] == 'searchArticle') {
                    echo '<h4><a href="index.php?action=articles&name=currentPost&postID='.$article->getIdArticle().'&number='.$i.'">Czytaj więcej</a></h4>';
                }?>

                <h5>Autor: <?php echo $article->getAuthor(); ?></h5>
                <?php
                if(!empty($_GET['name'])){
                    if(($_GET['name'] == 'acceptArticle')&&($_SESSION['currentRole'] == 'admin' || $_SESSION['currentRole'] == 'redaktor')){
                        echo '<a href="index.php?action=articles&name=acceptDB&postID='.$article->getIdArticle().'" class="smallButton">Akceptuj</a>';
                        echo '<a href="index.php?action=editPost&id=' . $article->getIdArticle() . '"><button type="button" class="edit"><span class="pencilart">e</span></button></a>';
                }
                }else if(($_SESSION['currentRole'] == 'admin' || $_SESSION['currentRole'] == 'redaktor')){
                        echo '<a href="index.php?action=articles&name=deleteDB&postID='.$article->getIdArticle().'" class="smallButton">Usuń z głównej</a>';
                        echo '<a href="index.php?action=editPost&id=' . $article->getIdArticle() . '"><button type="button" class="edit"><span class="pencilart">e</span></button></a>';
                }
            echo '</article>';

        }
        //echo '</div>';
        ?>

            <ul class="pagination">

                <?php
                if(empty($_GET['name'])){
                        $nameGet = '';
                    }else{
                        $nameGet = '&name=acceptArticle';
                    }

                echo '<li><a href="index.php?action=articles'.$nameGet.'&page=0"">«</a></li>';

                for($i = 0; $i <= $_SESSION['count']-1; $i++) {

                    if($_GET['page'] == $i){
                        echo '<li><a class="active" href="index.php?action=articles'.$nameGet.'&page=' . $i . '">' . ($i+1) . '</a></li>';
                    }else{
                        echo '<li><a href="index.php?action=articles'.$nameGet.'&page=' . $i . '">' . ($i+1) . '</a></li>';
                    }
                }

                echo '<li><a href="index.php?action=articles'.$nameGet.'&page=' .($_SESSION['count']-1).'"">»</a></li>';
                ?>

            </ul>
        </article>
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
            echo '<a href="index.php?action=articles&name=currentPost&number='.$back.'" class="smallButton">Poprzedni artykuł</a>';
         }
        if($next <= $max){
            echo '<a href="index.php?action=articles&name=currentPost&number='.$next.'" class="smallButton">Następny artykuł</a>';
        }
    }

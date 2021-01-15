<html lang="pl-PL" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <link rel="stylesheet" href="./style/home.css">
    <title>Strona główna</title>
</head>
<body>

<?php
include 'topMenu.php';
?>

<h1>Strona główna</h1>

<main style="height: 2100px;">
    <div class="newArticles hints">
        <h2 class="hints"><i class="icon-lightbulb hints"></i>Czy wiesz, że...</h2>
        <?php
            foreach($query as $row) {
                echo $row['treść'];
            }
        ?>
    </div>
    <div class="newArticles highlighted">
        <h2 class="highlighted"><i class="icon-star highlighted"></i>Wyróżnione artykuły</h2>
        <article>
            <h3>Artykuł 1</h3>
        </article>
        <article>
            <h3>Artykuł 2</h3>
        </article>
        <article>
            <h3>Artykuł 3</h3>
        </article>
    </div>
    <div class="newArticles new">
        <h2 class="new"><i class="icon-plus new"></i>Nowe artykuły</h2>
        <article>
            <h3>
                <?php
                    echo $object[0]->getTitle();
                ?>
            </h3>
            <?php echo substr($object[0]->getContents(), 0, 80).'...'; ?>
        </article>
        <article>
            <h3>
                <?php
                    echo $object[1]->getTitle();
                ?>
            </h3>
            <?php echo substr($object[1]->getContents(), 0, 80).'...'; ?>
        </article>
        <article>
            <h3>
                <?php
                echo $object[2]->getTitle();
                ?>
            </h3>
            <?php echo substr($object[2]->getContents(), 0, 80).'...'; ?>
        </article>
    </div>
    <div class="newArticles newUsers">
        <h2 class="newUsers"><i class="icon-user newUsers"></i>Nowi użytkownicy</h2>
        <article>
            <h3>
                <?php
                echo $nU[0]->getLogin();
                ?>
            </h3>
            <?php
            echo $nU[0]->getDescription();
            ?>
        </article>
        <article>
            <h3>
                <?php
                echo $nU[1]->getLogin();
                ?>
            </h3>
            <?php
            echo $nU[1]->getDescription();
            ?>
        </article>
        <article>
            <h3>
                <?php
                echo $nU[2]->getLogin();
                ?>
            </h3>
            <?php
            echo $nU[2]->getDescription();
            ?>
        </article>
    </div>
</main>
<?php
$index = 0;
    for($i = 0; $i < 3; $i++) {
        echo $object[$i]->getTitle();
    }
?>
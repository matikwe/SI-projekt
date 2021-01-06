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

<main style="height: 1600px;">
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
            <h3>Nowy 1</h3>
        </article>
        <article>
            <h3>Nowy 2</h3>
        </article>
        <article>
            <h3>Nowy 3</h3>
        </article>
    </div>
    <div class="newArticles newUsers">
        <h2 class="newUsers"><i class="icon-user newUsers"></i>Nowi użytkownicy</h2>
        <article>
            <h3>Użytkownik 1</h3>
        </article>
        <article>
            <h3>Użytkownik 2</h3>
        </article>
        <article>
            <h3>Użytkownik 3</h3>
        </article>
    </div>
</main>
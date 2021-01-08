<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>O nas</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
</head>
<body>

<?php
include 'topMenu.php';
?>

<h1>Panel admina</h1>

<div class="pageNF">
    <?php if($_SESSION['currentRole'] == 'admin') {
    echo '<a href="index.php?action=contactPanel">Otrzymane wiadomości</a>';
    echo '<a href="index.php?action=userList">Modyfikacja danych użytkownika</a>';
    }

    if($_SESSION['currentRole'] != 'admin'){
        echo '<a href="index.php?action=editCurrentUser">Modyfikacja danych użytkownika</a>';
    }
    echo '<a href="index.php?action=addPost">Dodanie artykułu</a>';
    echo '<a href = "index.php?action=logout">Wyloguj</a>';
    ?>
</div>
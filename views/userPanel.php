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
    <?php
    if(isset($_SESSION['postSuccessfullyAdded'])){
        echo '<p>'.$_SESSION["postSuccessfullyAdded"].'</p></br>';
    }

    if($_SESSION['currentRole'] == 'admin') {
        echo '<a href="index.php?action=contactPanel">Otrzymane wiadomości</a>';
        echo '<a href="index.php?action=userList">Modyfikacja danych użytkownika</a>';
        $_SESSION["postSuccessfullyAdded"] = "";
    }

    if($_SESSION['currentRole'] != 'admin'){
        echo '<a href="index.php?action=editCurrentUser">Modyfikacja danych użytkownika</a>';
        $_SESSION["postSuccessfullyAdded"] = "";
    }
    echo '<a href="index.php?action=addPost">Dodanie artykułu</a>';
    echo '<a href = "index.php?action=logout">Wyloguj</a>';
    ?>
</div>
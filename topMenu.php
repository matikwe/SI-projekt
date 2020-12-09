<?php
?>

<html lang="pl-PL">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Home</title>

</head>

<body>
<div class="top-bar">
    <div class="logo">
        logo
    </div>
    <div class="menu">

        <a href="index.php?action=about"><div class="option">O NAS</div></a>
        <a href="index.php?action=chat"><div class="option">CZAT</div></a>
        <a href="index.php?action=contact"><div class="option">KONTAKT</div></a>
        <?php
        if(empty($_SESSION['currentLogin']))
            echo"<a href='index.php?action=login'><div class='option'>LOGOWANIE</div></a>";
        else{
            echo"<a href='index.php?action=logout'><div class='option'>WYLOGUJ</div></a>";
        }
        ?>
        <a href="index.php?action=articles"><div class="option">ARTYKUŁY</div></a>
    </div>

    <div class="search">
        szukaj
    </div>
</div>
</body>
</html>
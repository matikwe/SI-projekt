<nav>
    <div class="logo">
        <!--proszę dodać możliwość kontaktu-->LOGO
    </div>
    <div class="menu">

        <a href="index.php?action=home" class="option">STRONA GŁÓWNA</a>
        <a href="index.php?action=articles&page=0"><div class="option">ARTYKUŁY</div></a>
        <a href="index.php?action=chat"><div class="option">CZAT</div></a>
        <?php
        if(empty($_SESSION['currentLogin']))
            echo"<a href='index.php?action=login'><div class='option'>LOGOWANIE</div></a>";
        else {
            echo"<a href='index.php?action=userPanel'><div class='option'>".$_SESSION['currentLogin']."</div></a>";
        }
        ?>
        <a href="index.php?action=about"><div class="option">O NAS</div></a>
    </div>

    <div class="search">
        <form action="index.php?action=searchResults" method="POST">
            <input type="text" placeholder="Wyszukaj..." name="searchField" style="width: 80%;">
            <button type="submit"><i class="icon-search"></i></button>
        </form>
    </div>
</nav>
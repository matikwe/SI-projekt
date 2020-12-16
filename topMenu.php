<nav>
    <div class="logo">
        <!-- TO należy dostosować do menu !!!!!-->
        <?php
        if(!empty($_SESSION['currentRole'])){
            if($_SESSION['currentRole'] == 'admin'){
                echo"<a href='index.php?action=adminPanel'><div class='option'>Panel Admina</div></a>";
            }
        }
            ?>
    </div>
    <div class="menu">

        <a href="index.php?action=about" class="option">O NAS</a>
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
        <form action="index.php?action=searchResults" method="POST">
            <input type="text" placeholder="Wyszukaj..." name="searchField">
            <button type="submit"><i class="icon-search"></i></button>
        </form>
    </div>
</nav>
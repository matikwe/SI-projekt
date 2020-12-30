<html lang="pl-PL" xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <title>Strona główna</title>
</head>
<body>
<?php
    include "topMenu.php";
    ?>

    <div class="mail">
        <div class="form">
        <form action="index.php?action=descriptionModification&id=<?php echo $_GET['id']?>" method="POST">
            <label>

                <textarea name="description" placeholder="Wpisz treść opisu"></textarea>
                <input type="submit" value="Modyfikuj opis" class="submit" name="click">

            </label>
            </form>
        </div>
    </div>
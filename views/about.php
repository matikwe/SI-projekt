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

<h1>Kim jesteśmy?</h1>

<div class="container">



    <div class="content">

        <a href="index.php?action=contact" class="smallButton">Kontakt panel</a>

        <?php
        for ($i = 0; $i < $_SESSION['countUserDisplay']; $i++) {
            $user = unserialize($_SESSION['userDisplay'][$i]);
            ?>
            <div class="user">
                <div class="icon">
                    <img src="./userprofile.jpg" alt="User Profile">
                </div>
                <div class="text">
                    <?php
                    if (!empty($_SESSION['currentRole'])) {
                        if ($_SESSION['currentRole'] == 'admin') {
                            echo '<a href="index.php?action=descriptionModification&id=' . $user->getUserId() . '"><button type="button" class="edit"><span class="pencilart">e</span></button></a>';
                        }
                    }
                    ?>

                    <h1><?php echo $user->getLogin(); ?></h1>
                    <p><?php echo "Rola: " . $user->getRole(); ?></p>
                    <p><?php echo $user->getDescription(); ?></p>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="user">
            <div class="icon">
                <img src="./userprofile.jpg" alt="User Profile">
            </div>
            <div class="text">
                <h1>Kuźmicki Kamil</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non ligula a neque blandit
                    dignissim. Proin hendrerit et ipsum fringilla porta. Donec vel diam sit amet tellus pulvinar
                    iaculis.</p>
            </div>
        </div>
    </div>
</div>
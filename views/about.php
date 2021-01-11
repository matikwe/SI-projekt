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

        <a href="index.php?action=contact" class="smallButton">Skontaktuj się z nami!</a>

        <?php
        for ($i = 0; $i < $_SESSION['countUserDisplay']; $i++) {
            $user = unserialize($_SESSION['userDisplay'][$i]);
            ?>
            <div class="user">
                <div class="icon">
                    <img src="
                    <?php
                        if(empty($user->getProfilePicture()))
                            echo'./userprofile.jpg';
                        else
                            echo $user->getProfilePicture();
                        ?>
                    " alt="User Profile">
                </div>
                <div class="text">
                    <?php
                    if (!empty($_SESSION['currentRole'])) {
                        if ($_SESSION['currentRole'] == 'admin') {
                            echo '<a href="index.php?action=descriptionModification&id=' . $user->getUserId() . '"><button type="button" class="edit"><span class="pencilart">e</span></button></a>';
                        }
                    }
                    ?>
                    <h2><?php echo $user->getLogin(); ?></h2>
                    <p><?php echo "Rola: " . $user->getRole(); ?></p>
                    <h3><?php echo $user->getDescription(); ?></h3>
                </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>
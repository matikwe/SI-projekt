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

<div class="container">

    <div class="header">
        <h1>Kim jesteśmy?</h1>
    </div>

    <div class="content">
        <?php
        for ($i = 0; $i < $_SESSION['countUserDisplay']; $i++){
            $user = unserialize($_SESSION['userDisplay'][$i]);
        ?>
        <div class="user">
            <div class="icon">
                <img src="./userprofile.jpg" alt="User Profile">
            </div>
            <div class="text">
                <?php
                if(!empty($_SESSION['currentRole'])){
                    if($_SESSION['currentRole'] == 'admin'){
                        echo '<a href="index.php?action=userModification&name=editNow"><button type="button" class="edit"><span class="pencilart">o</span></button></a>';
                        $_SESSION['loginAbout'] = $user->getLogin();
                        $_SESSION['emailAbout'] = $user->getEmail();
                    }
                }
                ?>

                <h1><?php echo $user->getLogin();?>
                </h1>
                <p><?php echo $user->getLogin();?>
                </p>
            </div>
        </div>
        <?php $_SESSION['idEdit'] = $user->getUserId();
        }
        ?>
        <div class="user">
            <div class="icon">
                <img src="./userprofile.jpg" alt="User Profile">
            </div>
            <div class="text">
                <h1>Kuźmicki Kamil</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non ligula a neque blandit dignissim. Proin hendrerit et ipsum fringilla porta. Donec vel diam sit amet tellus pulvinar iaculis.</p>
            </div>
        </div>
    </div>
</div>
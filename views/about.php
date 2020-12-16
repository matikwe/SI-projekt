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
$i = $_SESSION['w'];
?>

<div class="container">

    <div class="header">
        <h1>Kim jesteśmy?</h1>
    </div>

    <div class="content">
        <?php
        for ($o = 0; $i > $o; $o++){
        ?>
        <div class="user">
            <div class="icon">
                <img src="./userprofile.jpg" alt="User Profile">
            </div>
            <div class="text">
                <button type="button" class="edit"><span class="pencilart">o</span></button>
                <h1><?php echo $user[$o]->getLogin();?>
                </h1>
                <p><?php echo $user[$o]->getLogin();?>
                </p>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non ligula a neque blandit dignissim. Proin hendrerit et ipsum fringilla porta. Donec vel diam sit amet tellus pulvinar iaculis.</p>
            </div>
        </div>
    </div>
</div>
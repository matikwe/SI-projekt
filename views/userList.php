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

<h1>Modyfikacja</h1>

<div class="container">

    <div class="content">
        <?php
        for ($i = 0; $i < $_SESSION['countUserDisplay']; $i++){
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
                if(!empty($_SESSION['currentRole'])){
                    if($_SESSION['currentRole'] == 'admin'){
                        echo '<a href="index.php?action=userModification&id='.$user->getUserId().'"><button type="button" class="edit"><span class="pencilart">e</span></button></a>'; //edycja
                        //dopracowac usuwanie//echo '<a href="index.php?action=userDelete&name=delete&id='.$user->getUserId().'"><button type="button" class="edit"><span class="pencilart">u</span></button></a>'; //usuwanie
                        //złe zastosowanie, ale działa :)
                        $_SESSION['loginAbout'] = $user->getLogin();
                        $_SESSION['emailAbout'] = $user->getEmail();
                    }
                }
                ?>

                <h2><?php echo '#'.$user->getUserId().' --> '.'Login: '.$user->getLogin();?>
                </h2>
                <h3><?php echo 'Mail: '.$user->getEmail();?>
                </h3>
                <p><?php echo 'Rola: '.$user->getRole();?>
                </p>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
</div>
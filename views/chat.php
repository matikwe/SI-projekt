<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Czat</title>
    <link rel="stylesheet" type="text/css" media="screen" href="./style/chat.css"/>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">
</head>
<body>

<?php
include 'topMenu.php';
?>

<h1>Online czat</h1>

<div id="chat-container">
    <div id="chat-message-list">
        <?php
        for ($i = $_SESSION['countMessagesDisplay']-1; $i >= 0; $i--){
            $chat = unserialize($_SESSION['messagesDisplay'][$i]);
                if (!empty($_SESSION['currentLogin']) && $chat->getUserId() == $_SESSION['currentUserID']) {
                ?>
                <div class="message-row user-message">
                    <div class="message-content">
                        <?php

                            if(empty($chat->getImg()))
                            {
                                echo '<img src="https://i.pinimg.com/236x/21/87/a8/2187a85893e81c2f964f1c89ef559c4e.jpg" width="64px" alt="User Picture"/>';
                            }else{
                                echo '<img src="'.$chat->getImg().'" width="64px" alt="User Picture"/>';
                            }

                        ?>

                        <div class="user-name"><?php echo $chat->getLogin();?></div>
                        <div class="message-text"><?php echo $chat->getMessage();?></div>
                        <div class="message-time"><?php echo $chat->getDate();?></div>
                    </div>
                </div>
                <?php
            } else {
            ?>
            <div class="message-row other-message">
                <div class="message-content">
                    <?php

                    if(empty($chat->getImg()))
                    {
                        echo '<img src="https://i.pinimg.com/236x/21/87/a8/2187a85893e81c2f964f1c89ef559c4e.jpg" width="64px" alt="User Picture"/>';
                    }else{
                        echo '<img src="'.$chat->getImg().'" width="64px" alt="User Picture"/>';
                    }

                    ?>
                    <div class="user-name"><?php echo $chat->getLogin();?></div>
                    <div class="message-text"><?php echo $chat->getMessage();?></div>
                    <div class="message-time"><?php echo $chat->getDate();?></div>
                </div>
            </div>
            <?php
                }
        }
            ?>
    </div>
    <div id="chat-form">
        <form action="index.php?action=chat" method="POST">
            <input type="text" placeholder="Wprowadź wiadomość" name="message">
            <input type="submit" class="submit" name="action" value="">
        </form>
    </div>
</div>
<div id="error">
    <?php
    if(!empty($_SESSION['emptyMessage']))
        echo"<p>".$_SESSION['emptyMessage']."</p>";

    if(!empty($_SESSION['emptyUserID']))
        echo"<p>".$_SESSION['emptyUserID']."</p>";
    ?>
</div>
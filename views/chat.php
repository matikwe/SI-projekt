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
    <div id="online-list">
        Online List
    </div>
    <div id="chat-message-list">
        <?php
        for ($i = $_SESSION['countMessagesDisplay']-1; $i >= 0; $i--){
            $chat = unserialize($_SESSION['messagesDisplay'][$i]);
            ?>
        <div class="message-row user-message">
            <div class="message-content">
                <img src="https://i.pinimg.com/236x/21/87/a8/2187a85893e81c2f964f1c89ef559c4e.jpg" width="64px" alt="User Picture"/>
                <div class="user-name">Hentu</div>
                <div class="message-text"><?php echo $chat->getMessage();?></div>
                <div class="message-time"><?php echo $chat->getDate();?></div>
            </div>
        </div>
        <?php
        }
        ?>
        <div class="message-row user-message">
            <div class="message-content">
                <img src="https://i.pinimg.com/236x/21/87/a8/2187a85893e81c2f964f1c89ef559c4e.jpg" width="64px" alt="User Picture"/>
                <div class="user-name">Hentu</div>
                <div class="message-text">LOL</div>
                <div class="message-time">16.04</div>
            </div>
        </div>
        <div class="message-row other-message">
            <div class="message-content">
                <img src="https://i.pinimg.com/236x/21/87/a8/2187a85893e81c2f964f1c89ef559c4e.jpg" width="64px" alt="User Picture"/>
                <div class="user-name">WieluHentu</div>
                <div class="message-text">Ok then</div>
                <div class="message-time">16.04</div>
            </div>
        </div>
    </div>

    <div id="chat-form">
        <form action="index.php?action=chat" method="POST">
            <input type="text" placeholder="Wprowadź wiadomość" name="message">
            <input type="submit" class="submit" name="action">
        </form>
    </div>
</div>

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

<div id="chat-container">
    <?php
    for ($i = 0; $i < $_SESSION['countMessagesDisplay']; $i++){
    $chat = unserialize($_SESSION['messagesDisplay'][$i]);
    ?>
    <div id="online-list">
        Online List
    </div>
    <div id="chat-message-list">
        <div class="message-row user-message">
            <div class="message-content">
                <img src="https://i.pinimg.com/236x/21/87/a8/2187a85893e81c2f964f1c89ef559c4e.jpg" width="128px" alt="User Picture"/>
                <div class="user-name">Hentu</div>
                <div class="message-text"><?php echo $chat->getMessage();?></div>
                <div class="message-time">16.04</div>
            </div>
        </div>
        <div class="message-row other-message">
            <div class="message-content">
                <img src="https://i.pinimg.com/236x/21/87/a8/2187a85893e81c2f964f1c89ef559c4e.jpg" width="128px" alt="User Picture"/>
                <div class="user-name">Hentu</div>
                <div class="message-text">Ok then</div>
                <div class="message-time">16.04</div>
            </div>
        </div>




    </div>
        <?php
    }
    ?>
    <div id="chat-form">
        <input type="text" placeholder="Wprowadź wiadomość"/>
        <img src="https://static.thenounproject.com/png/367821-200.png" width="51px" alt="Wyślij"/>
    </div>
</div>

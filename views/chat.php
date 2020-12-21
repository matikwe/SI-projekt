<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Czat</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/fontello.css">

</head>
<body>

<?php
include 'topMenu.php';
?>
<div class="header">
    <h1>Chat</h1>
</div>
<div class="chatContent">
    <?php
    for ($i = 0; $i < $_SESSION['countMessagesDisplay']; $i++){
    $chat = unserialize($_SESSION['messagesDisplay'][$i]);
    ?>
    <div class="chatContainer">
        <img src="./userprofile.jpg" alt="Avatar">
        <p><?php echo $chat->getMessage();?></p>
        <span class="time-right"><?php echo $chat->getDate();?></span>
    </div>

        <?php
        }
        ?>
</div>
<div class="chatForm">
    <form action="index.php?action=chat" method="POST">
        <input type="text" placeholder="Wprowadz wiadomosc" name="message">
        <input type="submit" value="Wyslij" class="submit" name="action">
    </form>
</div>
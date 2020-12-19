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

<div class="chatContent">
    <div class="header">
        <h1>Chat</h1>
    </div>
    <div class="chatContainer">
        <img src="./userprofile.jpg" alt="Avatar">
        <p>Hello. How are you today?</p>
        <span class="time-right">11:00</span>
    </div>

    <div class="chatContainer darker">
        <img src="./userprofile.jpg" alt="Avatar" class="right">
        <p>Hey! I'm fine. Thanks for asking!</p>
        <span class="time-left">11:01</span>
    </div>
</div>
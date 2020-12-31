<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Kontakt panel</title>
    <link rel="stylesheet" href="./style/contactPanel.css">
    <link rel="stylesheet" href="./style/fontello.css">
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>

<?php
include 'topMenu.php';
?>
<h1>Otrzymane wiadomości</h1>

<main>
    <table>
        <tr><th>Imie</th><th>Nazwisko</th><th>Email</th><th>Treść</th><th>Czy wykonano rozmowę?</th></tr>

            <?php
                for($i=0; $i < $_SESSION['countContactDisplay']; $i++){
                    $contact = unserialize($_SESSION['contactDisplay'][$i]);
                    echo '<form action="index.php?action=contactPanel&contactID='.$contact->getQuestionId().'" method="POST">';
                    echo '<tr><td>'.$contact->getName().'</td><td>'.$contact->getSurname().'</td><td>'.$contact->getEmail().'</td><td>'.$contact->getContents();
                    echo '</td><td>';
                    echo '<input type="submit" value="Wykonano rozwomę" class="submit" name="contact">';
                    echo '</td></tr>';
                    echo '</form>';
                }

//        foreach($_SESSION['contactDisplay'] as $row){
//            $contact = unserialize($row);
//            echo '<form action="index.php?action=contactPanel&contactID='.$contact->getQuestionId().'" method="POST">';
//            echo '<tr><td>'.$contact->getName().'</td><td>'.$contact->getSurname().'</td><td>'.$contact->getEmail().'</td><td>'.$contact->getContents();
//            echo '</td><td>';
//            echo '<input type="submit" value="Wykonano rozwomę" class="submit" name="contact">';
//            echo '</td></tr>';
//            echo '</form>';
//            unset($contact);
//        }
?>
    </table>
</main>
<html lang="pl-PL">
<head>
    <meta charset="utf-8">
    <title>Kontakt panel</title>
    <link rel="stylesheet" href="./style/contactPanel.css">
    <link rel="stylesheet" href="./style/fontello.css">

</head>
<body>

<?php
include 'topMenu.php';

?>



    <div class="tableContact">
            <table border="1">
                <tr><td>Imie</td><td>Nazwisko</td><td>Email</td><td>Treść</td><td>Czy wykonano rozmowę?</td></tr>
                <form action="index.php?action=contactPanel" method="POST">
                    <?php
                        for($i=0; $i < $_SESSION['countContactDisplay']; $i++){
                            $contact = unserialize($_SESSION['contactDisplay'][$i]);

                            echo '<tr><td>'.$contact->getName().'</td><td>'.$contact->getSurname().'</td><td>'.$contact->getEmail().'</td><td>'.$contact->getContents();
                            echo '</td><td>';
                            echo '<input type="submit" value="Wykonano rozwomę" class="submit" name="contact">';
                            echo '</td></tr>';
                        }
                    ?>
                </form>
            </table>
    </div>


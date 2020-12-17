<?php
 include 'Database.php';

$_SESSION['error'] = "";
$_SESSION['eFormatMail'] = "";
if(isset($_POST['button'])){
    if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['mail']) || empty($_POST['info'])){
        $_SESSION['error'] = "Uzupełnij dane";
    }else{
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $info = $_POST['info'];
        if ((filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))) {
            $email = $_POST['mail'];
            $database = new Database('blog');
            $query = $database->getHandle()->query('SELECT count(*) FROM pytania WHERE email="'.$email.'" AND czyKontakt="false"');

            if($query->fetchColumn() >= 1){
                $_SESSION['eFormatMail'] = "Zaczekaj na kontakt z naszym konsultantem. Wysłałeś już zapytanie.";
            }else{
                $count = $database->count('pytania')+1;
                $addQuery = $database->getHandle()->query('INSERT INTO pytania (id_pytania, imie, nazwisko, email, tresc, czyKontakt) VALUES ("' . $count . '","'.$name.'","' . $surname . '","' . $email . '","' . $info . '","false")');
            }
        }else{
            $_SESSION['eFormatMail'] = "Zły format maila";
        }
    }
}

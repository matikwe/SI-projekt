<title>WWW</title>
<?php
session_start();

define('_ROOT_PATH', dirname(__FILE__));

$actions = array('logout', 'login', 'registration', 'home', 'about'); //wpisywać stworzone podstrony
$action = 'home'; //zaczyna od...

if(array_key_exists('action', $_GET))
{
    if(in_array($_GET['action'], $actions))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = 'pageNotFound';
    }
}

include(_ROOT_PATH.DIRECTORY_SEPARATOR.'actions'.DIRECTORY_SEPARATOR.$action.'.php');
include(_ROOT_PATH.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$action.'.php');

include 'footer.php';
?>
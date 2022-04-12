<?php

// ijungti klaidu pranesimus
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// pradedam sesiją
session_start();

//prisijungimai prie duomenu bazes
$ip = 'localhost';
$username = 'root';
$password = '';


// jungiames prie duomenu bazes
$database = mysqli_connect('localhost', 'root', '', 'parduotuve_sandelis');


// Tikrinam ar pavyko prisijungti prie duomenu bazes
if (!$database) {
    die("Connection failed: " . mysqli_connect_error());
}


// Get parametras skirtas atskirti puslapius
$page = $_REQUEST['page'] ?? null;

//funkcija skirta patikrinti ar zmogus prisijunges
function isLoged(): bool
{
    if (isset($_SESSION['email'])) {
        return true;
    } else {
        return false;
    }
}

//function deleteRecord(mysqli $dbname, $id)
//{
//    $sql = "delete from `person` where id =  '" . $id . "'";
//}

?>
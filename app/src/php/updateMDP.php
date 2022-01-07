<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';
include 'classes/InputValidation.php';
session_start();

// validating values
try {
    $session = InputValidation::int($_GET['id']);
    $pass = InputValidation::str($_POST['inputMDP']);
    $repeatedPass = InputValidation::str($_POST['inputRMDP']);
} catch (Exception $e) {
}





$db = new DB();
if(!empty($pass) && !empty($repeatedPass) && $pass == $repeatedPass)
{
    $db->updateMDP($session,password_hash($pass, PASSWORD_DEFAULT));

    header("Location:index.php?page=monCompte");
    exit;
}
header("Location:index.php?page=monCompte&error=1");
exit;
?>
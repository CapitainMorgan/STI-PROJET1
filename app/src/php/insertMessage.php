<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
session_start();   

include 'classes/DB.php';
include 'classes/InputValidation.php';

if(!empty($_POST['selectDest']))
{
    // checking fields values
    try {
        $session = InputValidation::int($_SESSION['id']);
        $selectedDest = InputValidation::str($_POST['selectDest']);
        $subject = InputValidation::str($_POST['inputSujet']);
        $body = InputValidation::str($_POST['textareaMessage']);
        // used in response insertion
        $sessionGet = InputValidation::int($_GET['id']);

    } catch (Exception $e) {
    }

    $db = new DB();
    if(empty($sessionGet)){
        // inserting message
        $db->insertMessage($session,$selectedDest,$subject,$body);
    }else{
        // inserting response
        $db->insertMessageReponse($session,$selectedDest,$subject,$body,$sessionGet);
    }
    header("Location:index.php?page=home");
    exit;
}

header("Location:index.php");
exit;
?>
<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
session_start();   

include 'classes/DB.php';

if(!empty($_POST['selectDest']))
{
    $db = new DB();
    if(empty($_GET['id']))
    {
        $db->insertMessage($_SESSION['id'],$_POST['selectDest'],$_POST['inputSujet'],$_POST['textareaMessage']);
    }else{
        $db->insertMessageReponse($_SESSION['id'],$_POST['selectDest'],$_POST['inputSujet'],$_POST['textareaMessage'],$_GET['id']);
    }
    header("Location:index.php?page=home");
    exit;
}

header("Location:index.php");
exit;
?>
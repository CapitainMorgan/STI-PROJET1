<?php
session_start();   

include 'classes/DB.php';

print_r($_POST);

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
}

//header("Location:index.php");
?>
<?php
include 'classes/DB.php';

if(!empty($_POST['selectDest']))
{
    $db = new DB();

    $db->insertMessage($_SESSION['id'],$_POST['selectDest'],$_POST['inputSujet'],$_POST['textareaMessage']);

    header("Location:index.php?page=home");
}

header("Location:index.php");
?>
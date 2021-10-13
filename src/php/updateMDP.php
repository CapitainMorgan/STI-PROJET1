<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';
session_start();
$db = new DB();

if(!empty($_POST['inputMDP']) && !empty($_POST['inputRMDP']) && $_POST['inputMDP'] == $_POST['inputRMDP'])
{
    $db->updateMDP($_SESSION['id'],$_POST['inputMDP']);

    header("Location:index.php?page=monCompte");
    exit;
}
header("Location:index.php?page=monCompte&error=1");
exit;
?>
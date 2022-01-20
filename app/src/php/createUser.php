<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';
if($_SESSION['role'] == 1)
{

$db = new DB();

$db->createUser($_POST['inputNom'],$_POST['inputPrenom'],password_hash($_POST['inputMDP'], PASSWORD_DEFAULT),$_POST['staticActif'],$_POST['inputNomUtilisateur'],$_POST['staticRole']);

header("Location:index.php?page=allUser");
exit;

}


header("Location:index.php?page=home");
exit;
?>
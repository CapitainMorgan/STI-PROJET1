<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';


$db = new DB();

$db->createUser($_POST['inputNom'],$_POST['inputPrenom'],$_POST['inputMDP'],$_POST['staticActif'],$_POST['inputNomUtilisateur'],$_POST['staticRole']);

header("Location:index.php?page=allUser");
exit;


header("Location:index.php?page=allUser&error=1");
exit;
?>
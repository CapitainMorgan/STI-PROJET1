<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
include 'classes/DB.php';


$db = new DB();

$db->updateUser($_GET['id'],$_POST['inputMDP'],$_POST['staticActif'],$_POST['staticRole']);

header("Location:index.php?page=AllUser");
exit;


header("Location:index.php?page=AllUser&error=1");
exit;
?>
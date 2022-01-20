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

    $db->updateUser($_GET['id'],password_hash($_POST['inputMDP'], PASSWORD_DEFAULT),$_POST['staticActif'],$_POST['staticRole']);

    header("Location:index.php?page=allUser");
    exit;

}else{
    header("Location:index.php?page=home");
    exit;
}
?>
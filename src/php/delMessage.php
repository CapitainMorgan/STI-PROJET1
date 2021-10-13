<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */

include 'classes/DB.php';

$db = new DB();

$db->delMessage($_GET['id']);

header("Location:index.php?page=home");
?>
<?php

include 'classes/DB.php';
if($_SESSION['role'] == 1)
{
$db = new DB();

$db->delUser($_GET['id']);

header("Location:index.php?page=allUser");
exit;
}
header("Location:index.php?page=home");
exit;
?>
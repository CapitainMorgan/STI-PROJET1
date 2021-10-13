<?php

include 'classes/DB.php';

$db = new DB();

$db->delUser($_GET['id']);

header("Location:index.php?page=allUser");
?>
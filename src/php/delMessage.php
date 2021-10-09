<?php

include 'classes/DB.php';

$db = new DB();

$db->delMessage($_GET['id']);

header("Location:index.php?page=home");


?>
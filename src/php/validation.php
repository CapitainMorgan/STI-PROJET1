<?php
if (! empty($_POST["login"])) {
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    include("classes/DB.php");
    $db = new DB();
    
}else{
    header("Location:index.php");
}
?>
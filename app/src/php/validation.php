<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */
session_start();  
 
if (!empty($_POST["login"])) {
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);

    include("classes/DB.php");
    $db = new DB();

    $login_result = $db->loginValidation($username, $password);
    /* DEBUG */
    print("RSLT: ");
    print_r($login_result);
    /* DEBUG */

    if(!empty($login_result)){     
        $_SESSION['id'] = $login_result[0]['IdUser'];
        $_SESSION['role'] = $login_result[0]['Role'];
        header("Location:index.php?page=home");
        exit;
    }    
}
header("Location:index.php?error=1");
exit;

?>


<?php
/**
 * 
 * Created by PhpStorm.
 * User: Maude Issolah, Matthieu Godi
 * Date: 13.10.2021
 */

use ReCaptcha\ReCaptcha;

session_start();
include 'classes/InputValidation.php';
include("classes/DB.php");

if (!empty($_POST["login"])) {

    $username = InputValidation::str($_POST["username"]);
    $password = InputValidation::str($_POST["password"]);
    $db = new DB();

    $login_result = $db->loginValidation($username);
    $recaptcha_url="https://www.google.com/recaptcha/api/siteverify";
    $secret_key="6LepLPkdAAAAAGryCm-BxmTSuYMkv0N5_MrH_Xqm";
    $recaptcha_response=$_POST['recaptcha_response'];
    $get_recaptcha_response=file_get_contents($recaptcha_url . '?secret='.$secret_key.'&response='.$recaptcha_response);
    $response_json=json_decode($get_recaptcha_response);
    if($response_json->success == true && $response_json->score>=0.5 && $response_json->action=='submit') {
        $_SESSION['secured'] = "Secured";
    }else {
        header("Location:index.php?error=Recaptcha");
    }
    if (!empty($login_result)) {
        if(password_verify($password, $login_result[0]['MotDePasse']))
        {    
            $_SESSION['id'] = $login_result[0]['IdUser'];
            $_SESSION['role'] = $login_result[0]['Role'];
            header("Location:index.php?page=home");
            exit;
        }    
    }
}
header("Location:index.php?error=1");
exit;

?>


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
require_once('classes/recaptchalib.php');

if (!empty($_POST["login"])) {
        $username = InputValidation::str($_POST["username"]);
        $password = InputValidation::str($_POST["password"]);
        $db = new DB();

        $login_result = $db->loginValidation($username, $password);
        /* DEBUG */
        print("RSLT: ");
        print_r($login_result);
        /* DEBUG */

        if (!empty($login_result)) {
            $_SESSION['id'] = $login_result[0]['IdUser'];
            $_SESSION['role'] = $login_result[0]['Role'];
            header("Location:index.php?page=home");
            exit;
        }
}

if (isset($_POST['g-recaptcha-response'])){
    require('component/recaptcha/src/autoload.php');
    $recaptcha = new ReCaptcha('6Ldl6OwdAAAAADbhthvzsiiOmnflItytfLJUzugC');
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'],$_SERVER['REMOTE_ADDR']);
    if (!$resp->isSuccess()){
        $output = json_encode(array('type' => 'error', 'text' => '<b>Captcha</b> Validation Required!'));
        die($output);
    }
}
header("Location:index.php?error=1");
exit;

?>


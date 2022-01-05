<?php
/*
 * This class contains all functions to verify each input type
 * @authors : Wenes Limem & Godi Mathieu
 * */
class InputValidation
{
    // this is set to true,so we receive the errors we have thrown
    // if we want to stop throwing errors, simply set it to false
    static $error = true;

    /**
     * verifies if an input field is empty or not
     * @param $arr  array of arguments
     * @param $on  action (Post,Get,Request)
     * @throws Exception
     */
    static function check($arr, $on=false){
        if ($on === false){
            $on = $_REQUEST;
        }
        foreach ($arr as $value){
            if (empty($on[$value])) {
                self::throwError('Missing data', 900);
            }
        }
    }
    /*
     * verifies a string
     * */
    /**
     * @throws Exception
     */
    static function str($val) {
        if (!is_string($val)) {
            self::throwError('Invalid String', 902);
        }
        return trim(htmlspecialchars($val));
    }

    /*
     * verifies a boolean
     * */
    static function bool($val){
        return filter_var($val,FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * used to verify session ID
     * @throws Exception
     */
    static function int($val) {
        $val = filter_var($val, FILTER_VALIDATE_INT);
        if ($val === false) {
            self::throwError('Invalid Integer', 901);
        }
        return $val;
    }


    /**
     * verifies an email
     * @throws Exception
     */
    static function email($val){
        $var = filter_var($val,FILTER_VALIDATE_EMAIL);
        if ($val === false){
            self::throwError('Invalid email format',903);
        }
        return $var;
    }

    /**
     * verifies an url
     * @throws Exception
     */
    static function url($val){
        $val = filter_var($val,FILTER_VALIDATE_URL);
        if ($val === false){
            self::throwError('Invalid url',904);
        }
        return $val;
    }

    /**
     * Throws error
     * @throws Exception
     */
    private static function throwError($error = 'Error in process', $errorCode = 0){
        if (self::$error === true) {
            throw  new Exception($error,$errorCode);
        }
    }


}
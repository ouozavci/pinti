<?php
/**
 * Created by PhpStorm.
 * User: Casper
 * Date: 08.10.2016
 * Time: 18:58
 */
require_once __DIR__.'/../model/Constants.php';


    session_start();
    $_SESSION["username"]=null;
    $_SESSION["id"]=null;
    $_SESSION["isLogged"]=false;

    header("Location: ".Constants::$serverUrl);
    die();

?>
<?php
/**
 * Created by PhpStorm.
 * User: Casper
 * Date: 08.10.2016
 * Time: 18:58
 */
    session_start();
    $_SESSION["username"]=null;
    $_SESSION["id"]=null;
    $_SESSION["isLogged"]=false;

    header("Location: index.php");
    die();

?>
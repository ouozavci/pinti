<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 13.10.2016
 * Time: 12:44
 */
    session_start();
    /*Session ba?lat?ld? ve session i�erisinde kullan?c? bilgileri tutulmakta
    kullan?c? giri? yapt?ktan sonra session i�indeki isLogged de?eri true olmal?d?r ve
    id de?eri ise kullan?c?n?n id'si olmal?d?r.
    A?a??daki kod par�as? bunun kontrol�n� yapmaktad?r.
    E?er isLogged de?eri tan?ml? ve true ise session i�erine kullan?c? id si ve username de?erleri girilir.

    Author: O?uzhan �zavc?
    */
    if(isset($_SESSION['isLogged'])){
        if($_SESSION['isLogged']){
            //$_SESSION['isLogged']=true;
            $userid=$_SESSION['id'];

            require_once __DIR__ . '/../model/db/db_connect.php';
            $db=new DB_CONNECT();
            $mysqli = $db->connect();
            $result=mysqli_query($mysqli,"SELECT firstName,lastName FROM users where id='$userid'");

            if(!empty($result)){
                if(mysqli_num_rows($result)>0){
                    $result=mysqli_fetch_array($result);
                    $username=$result["firstName"]." ".$result['lastName'];
                    $_SESSION['username']=$username;
                }
            }
        }
        else{
            $_SESSION["isLogged"]=false;
        }
    }
    else{
        $_SESSION["id"]=NULL;
        $_SESSION["isLogged"]=false;
    }
    require_once __DIR__.'/../view/index.phtml';
?>
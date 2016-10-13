<?php
require_once __DIR__.'/../model/User.php';

/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 13.10.2016
 * Time: 11:05
 */
    if($_POST){
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email=$_POST['email'];
            $password=$_POST['password'];

            $id = User::checkPassword($email,$password);

            if($id==NULL){
                echo "E-mail yada ?ifrenizi yanl?? girdiniz.";
            }
            else{

                session_start();
                $_SESSION["id"]=$id;
                $_SESSION["isLogged"]=true;

                header("Location: ../pinti");
                die();
            }
        }
        }

         /*   require_once __DIR__ . '/../model/db/db_connect.php';
            $db=new DB_CONNECT(); //DATABASE BAGLANTISI
            $mysqli = $db->connect();
            $result=mysqli_query($mysqli,"SELECT id FROM users WHERE email='$email' AND  password='$password'");



            if(!empty($result)){
                if(mysqli_num_rows($result)>0){
                    $result=mysqli_fetch_array($result);


                    $id=$result["id"];

                    session_start();
                    $_SESSION["id"]=$id;
                    $_SESSION["isLogged"]=true;

                    header("Location: ../pinti");
                    die();
                }
                else
                    echo("invalid.");
            }else
                echo("invalid.");
        }
        else{
            echo("Missing fields.");
        }
    }*/
    require_once __DIR__ . '/../view/login.phtml';
?>
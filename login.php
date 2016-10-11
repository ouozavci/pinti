<?php

    if($_POST){
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email=$_POST['email'];
            $password=$_POST['password'];

            require_once __DIR__ . '/db/db_connect.php';
            $db=new DB_CONNECT(); //DATABASE BAGLANTISI
            $mysqli = $db->connect();
            $result=mysqli_query($mysqli,"SELECT * FROM users WHERE email='$email' AND  password='$password'");

            if(!empty($result)){
                if(mysqli_num_rows($result)>0){
                    $result=mysqli_fetch_array($result);

                    $username=$result["username"];
                    $password=$result["password"];
                    $id=$result["id"];

                    session_start();
                    $_SESSION["id"]=$id;

                    $_SESSION["isLogged"]=true;
                    header("Location: index.php");
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
    }

?>
<html>
    <head>
        <title>Giriş Yap</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
    <div class="authForm">
        <form method="post" id="loginForm">
            <h1 class="authBaslik">Giriş Yap</h1>
            <table>
                <tr>
                    <td><label>E-posta adresiniz:</label></td>
                    <td><input class="txtBox" type="email" name="email" placeholder="e-mail" </td>
                </tr>
                <tr>
                    <td><label>Şifreniz:</label></td>
                    <td><input class="txtBox" type="password" name="password" placeholder="password"></td>
                </tr>
                <tr>
                    <td><a href="forgotPassword.php"><label>Şifremi unuttum.</label></a></td>
                    <td><input type="submit" name="btnLogin" value="Giriş Yap"></td>
                </tr>
            </table>
        </form>
    </div>
    </body>
</html>

<?php
    if($_POST){
        if(isset($_POST['username']) && isset($_POST['email'])&&isset($_POST['password'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            require_once __DIR__ . '/db/db_connect.php';
            $db=new DB_CONNECT(); //DATABASE BAGLANTISI
            $result=mysql_query("INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");

            if($result){
                header("Location: index.php");
                die();
            }else
                echo("error.");
        }
        else{
            echo("Missing fields.");
        }
    }
    else{

    }
?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Kayıt Ol</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="authForm">
<form method="post">
    <table>
        <tr>
            <td>E-posta adresiniz:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td>Kullanıcı adınız:</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>Şifreniz:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td>Şifreniz (Tekrar):</td>
            <td><input type="password" name="passwordAgain"></td>
        </tr>
        <tr>
            <td><a href="index.php">Anasayfaya Dön</a></td>
            <td><input type="submit" name="btnSignin" value="Kayıt Ol"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>

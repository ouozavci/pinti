<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 8.10.2016
 * Time: 14:00
 */?>
<html>
<head>
    <title>Kayıt Ol</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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
</body>
</html>

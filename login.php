<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 8.10.2016
 * Time: 13:59
 */?>
<html>
    <head>
        <title>Giriş Yap</title>
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
                    <td>Şifreniz:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><a href="forgotPassword.php">Şifremi unuttum.</a></td>
                    <td><input type="submit" name="btnLogin" value="Giriş Yap"></td>
                </tr>
            </table>
        </form>
    </div>
    </body>
</html>

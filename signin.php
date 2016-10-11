<?php
    if($_POST){
        if(isset($_POST['username']) && isset($_POST['email'])&&isset($_POST['password'])){

            require_once __DIR__ . '/db/db_connect.php';
            $db=new DB_CONNECT(); //DATABASE BAGLANTISI
            $mysqli = $db->connect();


            $email=$_POST['email'];
            $result=mysqli_query($mysqli,"SELECT email from users WHERE email = '$email'");

            if(mysqli_num_rows($result)>0){
                echo "Bu e-mail daha önceden alınmış!";
                die();
            }
            else {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $db = new DB_CONNECT(); //DATABASE BAGLANTISI
                $result = mysqli_query($mysqli,"INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");

                if ($result) {
                    header("Location: index.php");
                    die();
                } else
                    echo("error.");

            }
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
    <script src="js/signinControl.js"></script>
</head>
<body>
<div class="authForm">
<form name=frm method="post">

    <table>
        <tr>
            <td colspan="2"><h1 class="authBaslik">Kayıt Ol</h1></td>
        </tr>

        <tr>
            <td><label>E-posta adresiniz:</label></td>
            <td><input class="txtBox" type="email" name="email" id="txtEmail" placeholder="e-mail"></td>
        </tr>
        <tr>
            <td><label>Kullanıcı adınız:</label></td>
            <td><input class="txtBox" type="text" name="username" id="txtUsername" placeholder="username"></td>
        </tr>
        <tr>
            <td><label>Şifreniz:</label></td>
            <td><input class="txtBox" type="password" name="password" id="txtPassword" placeholder="password"></td>
        </tr>
        <tr>
            <td><label>Şifreniz (Tekrar):</label></td>
            <td><input class="txtBox" type="password" name="passwordAgain" id="txtPasswordAgain" placeholder="password (Again)"></td>
        </tr>
        <tr>
            <td><a href="index.php"><label>Anasayfaya Dön</label></a></td>
            <td><input type="button" name="btnSignin" value="Kayıt Ol" onClick="checkform();"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>

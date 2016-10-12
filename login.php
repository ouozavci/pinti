<?php

    if($_POST){
        if(isset($_POST['email'])&&isset($_POST['password'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
            $password=md5($password);

            require_once __DIR__ . '/model/db/db_connect.php';
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
        <script type="text/javascript" src="js/post.js"></script>
    </head>
    <body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '1321780007845681',
                xfbml      : true,
                version    : 'v2.8'
            });
            FB.AppEvents.logPageView();
        };
        function myFacebookLogin() {
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
                console.log('Logged in.');
                FB.api('/me',{fields: 'first_name,last_name,email'}, function(response) {
                   // post('',{})
                    alert("İsim:"+response.first_name+" "+response.last_name+"\nemail:"+response.email);
                });
            }
            else {
                FB.login(function(response){
                }, {scope: 'public_profile,email'});
            }
        });
        }
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));


    </script>
    <div class="authForm">
        <h1 class="authBaslik">Giriş Yap</h1>
        <div class="faux-fb-btn">
            <button onclick="myFacebookLogin()">Facebook ile giriş yap</button>
        </div>
        <h5>veya</h5>
        <form method="post" id="loginForm">

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
                    <td><a href="sifremi_unuttum.php"><label>Şifremi unuttum.</label></a></td>
                    <td><input type="submit" name="btnLogin" value="Giriş Yap"></td>
                </tr>
            </table>
        </form>
    </div>
    </body>
</html>

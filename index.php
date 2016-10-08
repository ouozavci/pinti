<?php
    session_start();

    if(isset($_SESSION['id'])){
        $_SESSION['isLogged']=true;
        $userid=$_SESSION['id'];

        require_once __DIR__.'/db/db_connect.php';
        $db=new DB_CONNECT();
        $result=mysql_query("SELECT * FROM users where id='$userid'");

        if(!empty($result)){
            if(mysql_num_rows($result)>0){
                $result=mysql_fetch_array($result);

                $username=$result["username"];

                $_SESSION["username"]=$username;

            }
        }

    }
    else
        $_SESSION["isLogged"]=false;

?>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="header">
    <?php

        if(!$_SESSION["isLogged"]) {
            echo "
            <h1 id = 'logo' > Pinti.com</h1 >
            <ul >
                <li ><a href = 'signin.php' > Kayıt ol </a ></li >
                <li ><a href = 'login.php' > Giriş yap </a ></li >
                <li ><a href = '' > Ürün Sat </a ></li >
                <li ><a href = 'help.php' > Yardım</a ></li >
            </ul >" ;
        }
        else{
            echo "
            <h1 id = \'logo\' > Pinti.com</h1 >
            <ul >
                <li>Hoşgeldin $username.</li>
                <li ><a href = 'logout.php' > Çıkış yap </a ></li >
                <li ><a href = '' > Ürün Sat </a ></li >
                <li ><a href = 'help.php' > Yardım</a ></li >
            </ul >
            " ;
        }
    ?>
</div>
<h1>pinti.com</h1>
<ul>
    <li><a href="">Samsung Galaxy S7 Edge</a></li>
    <li><a href="">Apple Iphone 7 Plus 128G</a></li>
    <li><a href="">Asus Zenfone 3 Ultimate Special Edition</a></li>
</ul>
</body>
</html>
<?php
    session_start();

    if(isset($_SESSION['id'])){
        $_SESSION['isLogged']=true;
        $userid=$_SESSION['id'];

        require_once __DIR__.'/db/db_connect.php';
        $db=new DB_CONNECT();
        $mysqli = $db->connect();
        $result=mysqli_query($mysqli,"SELECT * FROM users where id='$userid'");

        if(!empty($result)){
            if(mysqli_num_rows($result)>0){
                $result=mysqli_fetch_array($result);
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
    <h1 id = 'logo' > Pinti.com</h1 >
    <?php

        if(!$_SESSION["isLogged"]) {
            echo "       
            <ul >
                <li ><a href = 'signin.php' > Kayıt ol </a ></li >
                <li ><a href = 'login.php' > Giriş yap </a ></li >
                <li ><a href = '' > Ürün Sat </a ></li >
                <li ><a href = 'help.php' > Yardım</a ></li >
            </ul >" ;
        }
        else{
            echo "
            <ul >
                <li><label>Hoşgeldin <a href='profile.php'>$username</a>.</label></li>
                <li ><a href = '' > Ürün Sat </a ></li >
                <li ><a href = 'help.php' > Yardım</a ></li >
                 <li ><a href = 'logout.php' > Çıkış yap </a ></li >
            </ul >
            " ;
        }
    ?>
</div>
<div id="divSearch">
<form action="search.php" method="get">
    <input type="text" name="searchKey" placeholder="Ürün Arayın...">
    <input type="submit" name="search" value="Getir!">
</form>
</div>

</body>
</html>
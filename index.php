<?php
    session_start();
    /*Session başlatıldı ve session içerisinde kullanıcı bilgileri tutulmakta
    kullanıcı giriş yaptıktan sonra session içindeki isLogged değeri true olmalıdır ve
    id değeri ise kullanıcının id'si olmalıdır.
    Aşağıdaki kod parçası bunun kontrolünü yapmaktadır.
    Eğer isLogged değeri tanımlı ve true ise session içerine kullanıcı id si ve username değerleri girilir.

    Author: Oğuzhan Özavcı
    */
    if(isset($_SESSION['isLogged']))
        if($_SESSION['isLogged']){
        //$_SESSION['isLogged']=true;
        $userid=$_SESSION['id'];

        require_once __DIR__.'/db/db_connect.php';
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
    else
        $_SESSION["id"]=NULL;
?>
<html>
<head>
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div id="header">
    <a href=""><img id="logo" align="left" src="img/logo.png" width="10%" alt="pinti.com"/></a>
    <?php

        if(!$_SESSION["isLogged"]) {
            echo "       
            <ul >
                <li ><a href = 'signin.php' > Üye ol </a ></li >
                <li ><a href = 'login.php' > Giriş yap </a ></li >
                <li ><a href = '' > Ürün Sat </a ></li >
                <li ><a href = 'help.php' > Yardım</a ></li >
            </ul >" ;
        }
        else{
            echo "
            <ul >
                <li><label>Hoşgeldin <a href='profile.php?userid=".$_SESSION['id']."'>".$_SESSION['username']."</a>.</label></li>
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
<div>
    <a style="font-size: 21pt; color: crimson" href="bilgilendirme/index.html">Daha fazla bilgi sahibi olmak için tıklayınız...</a>
</div>
</body>
</html>
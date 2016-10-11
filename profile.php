<?php

  if($_GET){
    if(isset($_GET['userid'])){
        $id=$_GET['userid'];
        require_once __DIR__ . '/db/db_connect.php';
        $db=new DB_CONNECT(); //DATABASE BAGLANTISI
        $mysqli = $db->connect();
        $result=mysqli_query($mysqli,"SELECT * FROM users WHERE id='$id'");

        if(!empty($result)){
            if(mysqli_num_rows($result)>0){
                $result=mysqli_fetch_array($result);

                $firstName=$result["firstName"];
                $lastName=$result["lastName"];
                $email=$result["email"];
            }
            else{
                echo "Kullanıcı bulunamadı";
            }
        }
        else{
            echo "Result boş";
        }
    }
  }
  ?>
<html>
   <head>
      <title>Profile</title>
   </head>
   <body>
   <table>
       <tr>
           <td><label>Adı:</label><?php echo $firstName ?></td>
       </tr>
       <tr>
           <td><label>Soyadı:</label><?php echo $lastName ?></td>
       </tr>
       <tr>
           <td><label>Email:</label><?php echo $email ?></td>
       </tr>
       <tr>
           <td><a href="index.php">Anasayfaya Dön</a></td>
       </tr>
   </table>
   </body>
</html>

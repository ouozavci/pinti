<?php

  if($_GET){
    if(isset($_GET['userid'])){
        $id=$_GET['userid'];

        require_once __DIR__.'/model/User.php';
        $user = new User();
        $user->getCustomerById($id);

        if(isset($user->email)) {
            $firstName = $user->firstName;
            $lastName = $user->lastName;
            $email = $user->email;
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

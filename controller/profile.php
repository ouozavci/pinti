<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 13.10.2016
 * Time: 11:17
 */
  if($_GET){
      if(isset($_GET['userid'])){
          $id=$_GET['userid'];

          require_once __DIR__ . '/../model/User.php';
          $user = new User();
          $user->getCustomerById($id);

          if(isset($user->email)) {
              $firstName = $user->firstName;
              $lastName = $user->lastName;
              $email = $user->email;
              $register_date=$user->register_date;
              $img_url=$user->img_url;
              $phonenumber = $user->phonenumber;
              $address = $user->address;
          }
      }
  }
  require_once __DIR__ . '/../view/profile.phtml';
?>
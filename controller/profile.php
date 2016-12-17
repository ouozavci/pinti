<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 13.10.2016
 * Time: 11:17
 */
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/Constants.php';
require_once "../controller/session.php";

  if($_GET){

      if(isset($_GET['userid']) && ($_SESSION['isLogged'])) {

          $id = $_GET['userid'];

              $user = new User();
              $user->getCustomerById($id);
              if (isset($user->email)) {
                  $firstName = $user->firstName;
                  $lastName = $user->lastName;
                  $email = $user->email;
                  $register_date = $user->register_date;
                  $img_url = $user->img_url;
                  $phonenumber = $user->phonenumber;
                  $address = $user->address;
              }

      }
      else {
          header("Location:" . Constants::$serverUrl . "/login");

      }
  }
  require_once __DIR__ . '/../view/profile.phtml';
?>
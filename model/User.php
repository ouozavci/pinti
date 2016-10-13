<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 12.10.2016
 * Time: 23:18
 */

require_once __DIR__ . '/db/db_connect.php';

    class User {

        public $id;
        public $firstName;
        public $lastName;
        public $email;
        public $signType;

        public function getCustomerById($userid){
            $db=new DB_CONNECT();
            $mysqli = $db->connect();
            $result=mysqli_query($mysqli,"SELECT * FROM users where id='$userid'");

            if(!empty($result)){
                if(mysqli_num_rows($result)>0){
                    $result=mysqli_fetch_array($result);
                    $this->id=$result['id'];
                    $this->firstName=$result['firstName'];
                    $this->lastName=$result['lastName'];
                    $this->email=$result['email'];
                    //signType--------------------
                }
            }
        }
        public static function insert($firstName,$lastName,$email,$password){

            $db=new DB_CONNECT();
            $mysqli = $db->connect();
            $password=md5($password);
            $result = mysqli_query($mysqli,"INSERT INTO users(firstName, lastName, email, password) VALUES ('$firstName','$lastName','$email','$password')");
            return $result;

        }
        public static function isExist($email){

            $db=new DB_CONNECT();
            $mysqli = $db->connect();
            $result=mysqli_query($mysqli,"SELECT email from users WHERE email = '$email'");

            if(mysqli_num_rows($result)>0){
               return true;
            }
            else{
                return false;
            }

        }
        public static function getId($email){

            $db=new DB_CONNECT();
            $mysqli = $db->connect();
            $result=mysqli_query($mysqli,"SELECT id from users WHERE email = '$email'");
            $result=mysqli_fetch_array($result);
            //if(mysqli_num_rows($result)>0) {
                $id = $result["id"];
                return $id;
           // }
          //  else return NULL;

        }

    }
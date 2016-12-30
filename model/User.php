<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 12.10.2016
 * Time: 23:18
 */

require_once __DIR__ . '/db/db_connect.php';

    class User
    {

        public $id;
        public $firstName;
        public $lastName;
        public $email;
        public $signType;
        public $img_url;
        public $register_date;
        public $phonenumber;
        public $address;

        public function getCustomerById($userid)
        {
            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "SELECT * FROM users where id='$userid'");

            if (!empty($result)) {
                if (mysqli_num_rows($result) > 0) {
                    $result = mysqli_fetch_array($result);
                    $this->id = $result['id'];
                    $this->firstName = $result['firstName'];
                    $this->lastName = $result['lastName'];
                    $this->email = $result['email'];
                    $this->img_url=$result['img_url'];
                    $this->register_date=$result['register_date'];
                    $this->phonenumber = $result['phoneNumber'];
                    $this->address = $result['address'];
                    //signType--------------------
                }
            }
        }

        public static function insert($firstName, $lastName, $email, $password, $signType, $facebookID, $register_date)
        {

            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $password = md5($password);

            $result = mysqli_query($mysqli, "INSERT INTO users(firstName, lastName, email, password, signType, facebookID, register_date) 
                VALUES ('$firstName','$lastName','$email','$password','$signType','$facebookID','$register_date')");
            return $result;

        }


        public static function isExist($email)
        {

            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "SELECT email from users WHERE email = '$email'");

            if (mysqli_num_rows($result) > 0) {
                return true;
            } else {
                return false;
            }

        }

        public static function getId($email)
        {

            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "SELECT id from users WHERE email = '$email'");

            if (mysqli_num_rows($result) > 0) {
                $result = mysqli_fetch_array($result);
                $id = $result["id"];
                return $id;
            } else return NULL;
        }

        public static function checkPassword($email, $password)
        {
            $password = md5($password);
            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "SELECT id FROM users WHERE email='$email' AND password='$password'");

            if (!empty($result)) {
                if (mysqli_num_rows($result) > 0) {
                    $result = mysqli_fetch_array($result);

                    $id = $result["id"];
                    return $id;
                } else
                    return NULL;
            }

        }
        public static function checkFacebookID($email,$facebookID){
            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "SELECT id FROM users WHERE email='$email' AND facebookID='$facebookID'");

            if (!empty($result)) {
                if (mysqli_num_rows($result) > 0) {
                    $result = mysqli_fetch_array($result);

                    $id = $result["id"];
                    return $id;
                } else
                    return NULL;
            }
        }

        public static function updateProfile($id,$firstname,$lastname,$email,$phoneNumber,$address,$imageurl){
            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "UPDATE users SET firstname='$firstname', lastname='$lastname', email='$email', phoneNumber='$phoneNumber', address='$address' , img_url='$imageurl' WHERE id='$id'");
        }

        public static function updateProfileWhenBuying($id,$phoneNumber,$address,$city,$county,$zipcode){
            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "UPDATE users SET phoneNumber='$phoneNumber', address='$address' , city='$city', county='$county', zipcode='$zipcode' WHERE id='$id'");
        }

        public static function getName($id){
            $db = new DB_CONNECT();
            $mysqli = $db->connect();
            $result = mysqli_query($mysqli, "SELECT firstName,lastName from users where id='$id'");
            return $result;
        }

    }
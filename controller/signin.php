<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 13.10.2016
 * Time: 00:23
 */
require_once __DIR__.'/../model/Constants.php';
if($_POST){
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['signType'])){

        require_once __DIR__.'/../model/User.php';

        $email=$_POST['email'];
        $register_date=date('Y-m-d');
        if(User::isExist($email)){
            echo "Bu email zaten alınmış.";
        }
        else {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $password = $_POST['password'];
            $signType = $_POST['signType'];

            $facebookID = $_POST['facebookID'];

            $result = User::insert($firstName, $lastName, $email, $password, $signType, $facebookID, $register_date);



            if ($result) {
                session_start();

                $id = User::getId($email);
                $_SESSION['isLogged'] = true;
                $_SESSION['id']=$id;

                header("Location: ".Constants::$serverUrl);
                die();
            } else
                echo("error.");
        }
    }
    else{
        echo("Missing fields.");
    }

}
    require_once __DIR__ . '/../view/signin.phtml';
?>
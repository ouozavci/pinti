<?php
/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 13.10.2016
 * Time: 00:23
 */
if($_POST){
    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password'])){

        require_once __DIR__.'/model/User.php';

        $email=$_POST['email'];
        //  $result=mysqli_query($mysqli,"SELECT email from users WHERE email = '$email'");

        if(User::isExist($email)){
            echo "Bu e-mail daha önceden alınmış!";
        }
        else {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $password = $_POST['password'];

            $result = User::insert($firstName,$lastName,$email,$password);


            if ($result) {
                session_start();

                $id = User::getId($email);
                $_SESSION['isLogged'] = true;
                $_SESSION['id']=$id;
                header("Location: index.php");
                die();
            } else
                echo("error.");
        }
    }
    else{
        echo("Missing fields.");
    }
}

?>
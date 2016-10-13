<?php
require_once __DIR__.'/../model/User.php';

/**
 * Created by PhpStorm.
 * User: oguz
 * Date: 13.10.2016
 * Time: 11:05
 */
    if($_POST) {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            if (isset($_POST['signType'])) {
                $signType = $_POST['signType'];
                if ($signType == 'fb') {
                    $facebookID = $_POST['facebookID'];

                    $id = User::checkFacebookID($email, $facebookID);

                    if ($id == NULL) {

                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];

                        $result = User::insert($firstName, $lastName, $email, NULL, "fb", $facebookID);
                        if ($result) {
                            session_start();

                            $id = User::getId($email);
                            $_SESSION['isLogged'] = true;
                            $_SESSION['id'] = $id;

                            header("Location: ../pinti");
                            die();
                        } else echo("error.");
                    } else {
                        session_start();
                        $_SESSION["id"] = $id;
                        $_SESSION["isLogged"] = true;

                        header("Location: ../pinti");
                        die();
                    }
                }
            }
            if ($password == NULL) {
                echo "Lütfen şifrenizi giriniz";

            } else {
                $id = User::checkPassword($email, $password);
                if ($id == NULL) {
                    echo "E-mail yada şifrenizi yanlış girdiniz.";
                } else {

                    session_start();
                    $_SESSION["id"] = $id;
                    $_SESSION["isLogged"] = true;

                    header("Location: ../pinti");
                    die();
                }
            }
        }
    }
    require_once __DIR__ . '/../view/login.phtml';
?>
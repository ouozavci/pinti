<?php
/**
 * Created by PhpStorm.
 * User: oktay
 * Date: 30.12.2016
 * Time: 21:26
 */

require_once "../model/User.php";

if ($_POST) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];

        $result = User::getName($id);
        if ($result) {
            if ($result = mysqli_fetch_array($result)) {
                $firstName = $result["firstName"];
                $lastName = $result["lastName"];

                $name = $firstName . " " . $lastName;
                echo json_encode($name);
            }
        } else {
            echo json_encode("Not set?");
        }
    }
}
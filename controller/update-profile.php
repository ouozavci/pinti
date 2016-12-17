<?php
require_once "../model/Constants.php";
require_once __DIR__ . '/../model/User.php';
require_once "../controller/session.php";

if($_GET) {
    if(isset($_GET['userid'])){

        $user = new User();
        if(isset($_SESSION['isLogged']) && $_SESSION['id'] == $_GET['userid']) {
            $user->getCustomerById($_GET['userid']);
        } else {
            header("Location:" . Constants::$serverUrl . "/login");
        }
    }
}
if($_POST){
    if(isset($_GET['userid'])) {
        $userid = $_GET['userid'];
        User::updateProfile($userid,$_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phonenumber'],$_POST['address'],$_POST['imageurl']);
        header("Location:".Constants::$serverUrl."/profile?userid=$userid");
        die();
    }

}
require_once __DIR__ . '/../view/update-profile.phtml';

?>
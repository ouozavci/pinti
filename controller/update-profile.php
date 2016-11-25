<?php
require_once "../model/Constants.php";
if($_GET) {
    if(isset($_GET['userid'])){

        $userid = $_GET['userid'];
        require_once __DIR__ . '/../model/User.php';
        $user = new User();
        $user->getCustomerById($userid);
    }
}
if($_POST){
    if(isset($_GET['userid'])) {
        $userid = $_GET['userid'];
        User::updateProfile($userid,$_POST['phonenumber'],$_POST['address'],$_POST['imageurl']);
        header("Location:".Constants::$serverUrl."/profile?userid=$userid");
        die();
    }

}

require_once __DIR__ . '/../view/update-profile.phtml';

?>
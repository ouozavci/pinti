<?php
require_once __DIR__ . '/../model/Product.php';
require_once __DIR__ . '/../model/Constants.php';
require_once __DIR__ . '/../model/User.php';

require_once "../controller/session.php";
if($_GET) {

    if (isset($_GET['userid']) && ($_SESSION['isLogged'])) {

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
}
require_once __DIR__ . '/../view/sellingProducts.phtml';
?>
<?php
require_once __DIR__ . '/../controller/session.php';
if($_SESSION['isLogged']) {
    if ($_GET) {
        if (isset($_GET['talkId'])) {
            $talkId=$_GET['talkId'];
            $myId=$_SESSION['id'];
        }
    }
    require_once __DIR__ . '/../view/messaging.phtml';
}
else{
    header("Location: ".Constants::$serverUrl."/login");
}
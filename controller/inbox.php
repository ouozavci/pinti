<?php
require_once __DIR__ . '/../controller/session.php';
if ($_SESSION['isLogged']) {
    $myId = $_SESSION['id'];
    require_once __DIR__ . '/../view/inbox.phtml';
} else {
    header("Location: " . Constants::$serverUrl . "/login");
}


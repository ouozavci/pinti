<?php
$cat2show = 0;
if($_GET){
    if(isset($_GET['cat'])){
        $cat2show = $_GET['cat'];
    }
    else{
        $cat2show = 0;
    }
}
require_once "../view/index.phtml";

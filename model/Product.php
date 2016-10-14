<?php

/**
 * Created by PhpStorm.
 * User: Can Canbay
 * Date: 13.10.2016
 * Time: 23:14
 */
require_once __DIR__.'/db/db_connect.php';
class Product
{

    public $id;
    public $name;
    public $quantity;
    public $price;

    public static function getAll(){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli, "SELECT * FROM products");
        return $result;

    }
    
}
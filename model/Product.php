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
    public $price;
    public $category_id;
    public $brand_id;
    public $seller_id;
    public $image_url;

    public static function getAll(){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli, "SELECT * FROM products");
        return $result;
    }

    public static function getProductById($id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"SELECT * FROM products where id='$id'");
        return $result;
    }

    public static function getProductByCategoryId($category_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"SELECT * FROM products where category_id='$category_id'");
        return $result;
    }
}
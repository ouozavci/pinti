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
    public static function insertProduct($name,$price,$category_id,$seller_id,$image_url){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"INSERT INTO products (name,price,category_id,brand_id,seller_id,image_url)
                                        VALUES ('$name','$price','$category_id','0','$seller_id','$image_url');");
        return $result;
    }
    public static function getChildsOf($category_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $childs = mysqli_query($mysqli, "SELECT * FROM category where parent_id='$category_id'");

        $sqlString = "SELECT * FROM products where category_id='$category_id'";

            if($childs)
            while ($child = mysqli_fetch_array($childs)){
                $sqlString=$sqlString." OR category_id='".$child['id']."'";
            }
          //  echo $sqlString;
        $result = mysqli_query($mysqli,$sqlString);
        $db = null;
        return $result;
    }
    public static function getProductsBySearchKeyword($keyword){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"SELECT * FROM products WHERE name LIKE '%{$keyword}%'");
        return $result;
    }
}
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
        $result = mysqli_query($mysqli,"SELECT * FROM products P INNER JOIN category C ON P.category_id = C.id WHERE P.name LIKE '%{$keyword}%' OR C.name LIKE '%{$keyword}%'");
        return $result;
    }
    public static function updateStockAfterBuying($id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"UPDATE products SET stock=stock-1 where id='$id'");

        return $result;
    }
    public static function insertUsersProducts($product_id,$user_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"INSERT INTO users_products (product_id,user_id)
                                        VALUES ('$product_id','$user_id');");
        return $result;
    }
    public static function getBuyingProducts($user_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"SELECT p.name,p.image_url FROM users_products as up ,products as p where up.product_id = p.id and up.user_id='$user_id'");
        return $result;
    }

    public static function insertSellerProducts($product_id,$user_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"INSERT INTO sellers_products (product_id,seller_id) VALUES ('$product_id','$user_id');");
        return $result;
    }
    public static function getSellingProducts($user_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"SELECT p.name,p.image_url FROM sellers_products as sp ,products as p where sp.product_id = p.id and p.seller_id='$user_id'");
        return $result;
    }
    public static function getSellerId($product_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli,"SELECT seller_id FROM products where id='$product_id'");
        if (mysqli_num_rows($result) > 0) {
            $result = mysqli_fetch_array($result);
            $id = $result["seller_id"];
            return $id;
        } else return NULL;
    }
}
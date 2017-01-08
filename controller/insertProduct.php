<?php
require_once "../model/Product.php";
    if($_POST){
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category_id']) && isset($_POST['brand_id'])
        && isset($_POST['seller_id']) && isset($_POST['image_url'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $category_id = $_POST['category_id'];
            $brand_id = $_POST['brand_id'];
            $seller_id = $_POST['seller_id'];
            $image_url = $_POST['image_url'];
            Product::insertProduct($name,$price,$category_id,$seller_id,$image_url);

            echo "inserted";
        }
    }
    else{
        echo "Not enough parameter";
    }



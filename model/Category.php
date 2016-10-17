<?php
/**
 * Created by PhpStorm.
 * User: kaantas
 * Date: 16.10.2016
 * Time: 22:19
 */

require_once __DIR__ . '/db/db_connect.php';

class Category{
    public $id;
    public $name;
    public $parent_id;

    public function getCategoryById($id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli, "SELECT * FROM category where id='$id'");

        if (!empty($result)) {
            if (mysqli_num_rows($result) > 0) {
                $result = mysqli_fetch_array($result);

                $this->id = $result['id'];
                $this->name = $result['name'];
                $this->parent_id = $result['parent_id'];
            }
        }
    }
    public static function getCategoryImage($id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli, "SELECT * FROM category_img where category_id = '$id'");

        if(!empty($result)){
            if(mysqli_num_rows($result) > 0){
               $result = mysqli_fetch_array($result);
               return $result['image_url'];
            }
        }

    }
    public static function getCategoryByParentId($parent_id){
        $db = new DB_CONNECT();
        $mysqli = $db->connect();
        $result = mysqli_query($mysqli, "SELECT * FROM category where parent_id='$parent_id'");

        if (!empty($result)) {
            if (mysqli_num_rows($result) > 0) {
                return $result;
            }
        }
        return NULL;
    }

}



?>
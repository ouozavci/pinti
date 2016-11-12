<?php
require_once "../model/Category.php";
if($_GET){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $submenus = Category::getCategoryByParentId($id);
        $categories = array();
        $count=0;
        while($submenu = mysqli_fetch_array ($submenus))
        {
            $category = new Category();
            $category->id = $submenu['id'];
            $category->name = $submenu['name'];
            $category->parent_id = $submenu['parent_id'];
            $categories[$count] = $category;
            $count++;
        }
        $result = json_encode($categories);
        echo $result;
    }
}



?>
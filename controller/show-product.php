<?
require_once "../model/Product.php";

if($_GET) {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $product = Product::getProductById($id);
        if(!empty($product))
            $product = mysqli_fetch_array($product);
    }
}
require_once __DIR__. "/../view/show-product.phtml";
?>
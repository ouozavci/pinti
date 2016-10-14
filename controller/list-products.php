<?
require_once __DIR__ . '/../model/Product.php';


$products = Product::getAll();

require_once "../view/list-products.phtml";

?>
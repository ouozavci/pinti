<?php
require_once "../controller/session.php";
if($_POST){
    if((empty($_POST['cardNumber']) && empty($_POST['cardExpiry']) && empty($_POST['adSoyad']) && empty($_POST['cardCVC']))==false){
        require_once __DIR__.'/../model/Product.php';

        //sepetteki her ürünün idsini al
        foreach ( $_COOKIE['product'] as $key => $val ) {
            $id = $key;
            $result = Product::updateStockAfterBuying($id);
            Product::insertUsersProducts($id,$_SESSION['id']);
            $seller_id = Product::getSellerId($id);
            Product::insertSellerProducts($id,$seller_id);


            //ürünleri satın aldıktan sonra boşalt
            setcookie('product['.$key.']', $key, time() - 86400);

        }
        require_once "../model/Constants.php";
        header("Location:".Constants::$serverUrl); /* Redirect browser */
        exit();
    }
    else{
        echo("fail");
    }

}
require_once __DIR__ . '/../view/odeme.phtml';
?>
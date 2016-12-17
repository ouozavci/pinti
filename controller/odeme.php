<?php
if($_POST){
    if((empty($_POST['cardNumber']) && empty($_POST['cardExpiry']) && empty($_POST['adSoyad']) && empty($_POST['cardCVC']))==false){
        require_once __DIR__.'/../model/Product.php';

        //sepetteki her ürünün idsini al
        foreach ( $_COOKIE['product'] as $key => $val ) {
            $id = $key;
            $result = Product::updateStockAfterBuying($id);

            //ürünleri satın aldıktan sonra boşalt
            setcookie('product['.$key.']', $key, time() - 86400);

        }

        header("Location: /pinti"); /* Redirect browser */
        exit();
    }
    else{
        echo("fail");
    }

}
require_once __DIR__ . '/../view/odeme.phtml';
?>
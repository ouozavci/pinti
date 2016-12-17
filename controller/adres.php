<?php
session_start();
if($_POST){
    if((empty($_POST['ad']) && empty($_POST['soyad']) && empty($_POST['sehir']) && empty($_POST['ilce']) && empty($_POST['adres'])
        && empty($_POST['postaKodu']) && empty($_POST['telefon']))==false){

        require_once __DIR__.'/../model/User.php';

        $ad = $_POST['ad'];
        $soyad = $_POST['soyad'];
        $sehir = $_POST['sehir'];
        $ilce = $_POST['ilce'];
        $adres = $_POST['adres'];
        $postaKodu = $_POST['postaKodu'];
        $telefon = $_POST['telefon'];

        $id=$_SESSION['id'];

        $result = User::updateProfileWhenBuying($id, $telefon, $adres, $sehir, $ilce, $postaKodu);

        header("Location: odeme"); /* Redirect browser */
        exit();
    }
    else{
        echo("afsa");
    }

}

require_once __DIR__ . '/../view/adres.phtml';
?>
<?php
include_once "common/connessione.php";

$sottoCategoria="";
$categoria="";

if (isset($_GET["elettrodomestici"])) {
    $sottoCategoria = $_GET["elettrodomestici"];
    $categoria = "Elettrodomestici";
} else if (isset($_GET["fotoVideo"])){
    $sottoCategoria = $_GET["fotoVideo"];
    $categoria = "Foto e video";
} else if (isset($_GET["abbigliamento"])){
    $sottoCategoria = $_GET["abbigliamento"];
    $categoria = "Abbigliamento";
} else if (isset($_GET["hobby"])) {
    $sottoCategoria = $_GET["hobby"];
    $categoria = "Hobby";
} else {
    $sottoCategoria="";
    $categoria="";
}


$regione = mysqli_real_escape_string($cid,isset($_GET["regione"]))?$_GET["regione"]:"";
$provincia = mysqli_real_escape_string($cid,isset($_GET["provincia"]))?$_GET["provincia"]:"";
$comune = mysqli_real_escape_string($cid,isset($_GET["comune"]))?$_GET["comune"]:"";

if (isset($_GET["priceRange"])){
    $price = $_GET["priceRange"];
//    $minPrice=$_GET["priceRange"][0];
//    $maxPrice=$_GET["priceRange"][1];
}

//mysqli_real_escape_string()

//getAnnunciFiltrati($cid, $categoria, $sottoCategoria, $regione, $provincia, $comune);
//$cid, $categoria, $sottoCategoria, $regione, $provincia, $comune






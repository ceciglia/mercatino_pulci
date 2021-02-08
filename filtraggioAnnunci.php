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


$regione = isset($_GET["regione"])?$_GET["regione"]:"";
$provincia = isset($_GET["provincia"])?$_GET["provincia"]:"";
$comune = isset($_GET["comune"])?$_GET["comune"]:"";

//getAnnunciFiltrati($cid, $categoria, $sottoCategoria, $regione, $provincia, $comune);
//$cid, $categoria, $sottoCategoria, $regione, $provincia, $comune






<?php
include_once "../common/connessione.php";

if (isset($_GET["elettrodomestici"])){
    $sottoCategoria=$_GET["elettrodomestici"];

} else {
    $elettrodomestici="Non è stata selezionata questa categoria.";
}

if (isset($_GET["fotoVideo"])){
    $fotoVideo=$_GET["fotoVideo"];
} else {
    $fotoVideo="Non è stata selezionata questa categoria.";
}

if (isset($_GET["abbigliamento"])){
    $abbigliamento=$_GET["abbigliamento"];
} else {
    $abbigliamento="Non è stata selezionata questa categoria.";
}

if (isset($_GET["hobby"])){
    $hobby=$_GET["hobby"];
} else {
    $hobby="Non è stata selezionata questa categoria.";
}


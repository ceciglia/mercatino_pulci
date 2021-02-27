<?php
include_once "../common/connessione.php";

if (isset($_GET["sottoCategoria"])){
    $filtroCat = explode("-", $_GET["sottoCategoria"]);
    $categoria = $filtroCat[0];
    $sottoCategoria = $filtroCat[1];
} else {
    $categoria = "";
    $sottoCategoria = "";
}

if (mysqli_real_escape_string($cid, $_GET["regione"]) == "Seleziona una regione: " and mysqli_real_escape_string($cid, $_GET["provincia"]) == "Seleziona prima una regione:" and mysqli_real_escape_string($cid, $_GET["comune"]) == "Seleziona prima una provincia:") {
    $regione = "";
    $provincia = "";
    $comune = "";
} else if ((mysqli_real_escape_string($cid, $_GET["regione"])) != "Seleziona una regione: " and (mysqli_real_escape_string($cid, $_GET["provincia"])) == "Seleziona una provincia: " and (mysqli_real_escape_string($cid, $_GET["comune"]))=="Seleziona prima una provincia:"){
    $regione = mysqli_real_escape_string($cid, $_GET["regione"]);
    $provincia = "NoProvincia";
    $comune = "NoComune";
} else if (mysqli_real_escape_string($cid, $_GET["regione"]) != "Seleziona una regione: " and mysqli_real_escape_string($cid, $_GET["provincia"]) != "Seleziona prima una regione:" and mysqli_real_escape_string($cid, $_GET["comune"]) == "Seleziona un comune: "){
    $regione = mysqli_real_escape_string($cid, $_GET["regione"]);
    $provincia = mysqli_real_escape_string($cid, $_GET["provincia"]);
    $comune = "NoComune";
} else {
    $regione = mysqli_real_escape_string($cid, $_GET["regione"]);
    $provincia = mysqli_real_escape_string($cid, $_GET["provincia"]);
    $comune = mysqli_real_escape_string($cid, $_GET["comune"]);
}
//$regione = mysqli_real_escape_string($cid,isset($_GET["regione"]))?$_GET["regione"]:"";
//$provincia = mysqli_real_escape_string($cid,isset($_GET["provincia"]))?$_GET["provincia"]:"";
//$comune = mysqli_real_escape_string($cid,isset($_GET["comune"]))?$_GET["comune"]:"";

if (isset($_GET["priceRange"])){
    $price = explode(",",$_GET["priceRange"]);
    $minPrice = $price[0];
    $maxPrice = $price[1];
} else {
    $minPrice = "";
    $maxPrice = "";
}

header("Location: ../index.php?categoria=" . urlencode($categoria). "&sottoCategoria=". urlencode($sottoCategoria)."&regione=". urlencode($regione)."&provincia=". urlencode($provincia)."&comune=". urlencode($comune)."&minPrice=". urlencode($minPrice)."&maxPrice=". urlencode($maxPrice));


//echo $categoria;
//echo "<br>";
//echo $sottoCategoria;
//echo "<br>";
//echo $minPrice;
//echo "<br>";
//echo $maxPrice;

//mysqli_real_escape_string()

//getAnnunciFiltrati($cid, $categoria, $sottoCategoria, $regione, $provincia, $comune);
//$cid, $categoria, $sottoCategoria, $regione, $provincia, $comune






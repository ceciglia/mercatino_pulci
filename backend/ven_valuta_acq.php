<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}
$serieta = $_POST["serieta"];
$puntualita = $_POST["puntualita"];
$idAnnuncio = $_GET["idAnnuncio"];
$acquirente = $_GET["acquirente"];

$sqlvaluta="UPDATE richiestaacquisto SET serietaA='$serieta', puntualitaA='$puntualita' WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA='$acquirente'";
$cid->query($sqlvaluta);


if(empty($cid->error)){

    header("Location:../inserimento-riuscito.php");
}else{
    header("Location:../inserimento-non-riuscito.php");
}

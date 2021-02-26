<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}
$serieta = $_POST["serieta"];
$puntualita = $_POST["puntualita"];
$idAnnuncio = $_GET["idAnnuncio"];
$acquirente = $_SESSION["email"];

$sqlvaluta="UPDATE annuncio SET serietaV='$serieta', puntualitaV='$puntualita' WHERE idAnnuncio='$idAnnuncio'";
$cid->query($sqlvaluta);


if(empty($cid->error)){

    header("Location:../account.php");
}else{
    echo'aiutooooo';
    echo $cid->error;
}

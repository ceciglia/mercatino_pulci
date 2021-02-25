<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}

$idAn = $_GET["id"];
if (isset($_SESSION["acquirente"]) and $_SESSION["acquirente"]==1){
    $acquirente = $_SESSION["email"];
}

$inserimentoOss="INSERT INTO osserva(idAnnuncio, acquirenteO) VALUES ('$idAn', '$acquirente')";
$result=$cid->query($inserimentoOss);

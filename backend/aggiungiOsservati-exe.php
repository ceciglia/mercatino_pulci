<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}

$idAn = $_GET["id"];
$acquirente = $_SESSION["email"];
$inserimentoOss="INSERT INTO osserva(idAnnuncio, acquirenteO) VALUES ('$idAn', '$acquirente')";
$result=$cid->query($inserimentoOss);

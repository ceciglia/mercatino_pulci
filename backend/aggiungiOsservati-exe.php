<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}

$idAn = $_GET["id"];
$acquirente = $_SESSION["email"];

$inserimentoOss="INSERT INTO osserva(idAnnuncio, acquirenteO) VALUES ('$idAn', '$acquirente')";
$result=$cid->query($inserimentoOss);
//$error=$cid->error($inserimentoOss);
//
//if (empty($error)) {
//    echo json_encode(array("res"=>'Inserimento corretto'));
//} else {
//    echo json_encode(array("res"=>'Inserimento fallito'));
//}
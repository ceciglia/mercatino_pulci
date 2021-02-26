<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}
$metodop = $_POST["metodop"];
$idAnnuncio = $_GET["idAnnuncio"];
$acquirente = $_SESSION["email"];
$pagamento="";
if($metodop=="carta"){
    $pagamento="carta di credito";
}elseif($metodop=="contanti"){
    $pagamento="contanti";
}

$inserimentoRichiesta="INSERT INTO richiestaacquisto(idAnnuncio, acquirenteRA, metodoPagamento) VALUES ('$idAnnuncio','$acquirente','$pagamento')";
$result=$cid->query($inserimentoRichiesta);


if(empty($cid->error)){
    $cercaOsservato="SELECT idAnnuncio, acquirenteO FROM osserva WHERE idAnnuncio='$idAnnuncio' and acquirenteO='$acquirente'";
    $trovao=$cid->query($cercaOsservato);

    if(!empty($trovao)){
        $cid->query("DELETE FROM osserva WHERE idAnnuncio='$idAnnuncio' and acquirenteO='$acquirente'");
    }
    header("Location:../account.php");
}else{
    //echo'aiutooooo';
    echo $cid->error;
}

<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}

$idAnnuncio = $_GET["idAnnuncio"];

$stato = $_POST["stato"];

$statoattuale = $_GET["statoattuale"];
echo $statoattuale;
if(($stato != $statoattuale) AND ($stato != "-- Stato Annuncio --") ){
    $statosql="INSERT INTO statoa (idAnnuncio, stato) VALUES ('$idAnnuncio', '$stato') ";
    $ris=$cid->query($statosql);

}



if(empty($cid->error)){
    if($stato=="eliminato"){
        $sqlra="UPDATE richiestaacquisto SET approvato=0 WHERE idAnnuncio='$idAnnuncio' AND approvato IS NULL";
    }
    header("Location:../account.php");
}else{
    header("Location:../account.php");
}
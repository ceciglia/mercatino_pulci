<?php
include_once "../common/connessione.php";
if(!isset($_SESSION)) {
    session_start();
}

$idAnnuncio = $_GET["idAnnuncio"];
$acquirente = $_GET["acquirente"];

if(isset($_POST["accetta"])){
    echo'ciooo';

    $accetta="UPDATE richiestaacquisto SET approvato='1' WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA='$acquirente'";
    $cid->query($accetta);
    $stato="INSERT INTO statoa (idAnnuncio, stato) VALUES('$idAnnuncio', 'venduto')";
    $cid->query($stato);
    $rifiuta="UPDATE richiestaacquisto SET approvato='0' WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA<>'$acquirente'";
    $cid->query($rifiuta);
    if(empty($cid->error)){

        header("Location:../inserimento-riuscito.php");
    }else{
        header("Location:../inserimento-non-riuscito.php");
    }
}elseif(isset($_POST["rifiuta"])){
    $rifiuta="UPDATE richiestaacquisto SET approvato='0' WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA='$acquirente'";
    $cid->query($rifiuta);
    if(empty($cid->error)){

        header("Location:../inserimento-riuscito.php");
    }else{
        header("Location:../inserimento-non-riuscito.php");
    }
}else{
    header("Location:../inserimento-non-riuscito.php");
}


?>
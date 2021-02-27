<?php
$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);


// aggiungere controllo dei dati
$nomeAnnuncio = $_POST["nomeAnnuncio"];
$descrizioneAnnuncio = $_POST["descrizioneAnnuncio"];
$nomeProdotto = $_POST["nomeProdotto"];
$prezzoP= $_POST["prezzoP"];
//$condizione = $_POST["condizione"];
$periodoUtilizzo = $_POST["periodoUtilizzo"];
$garanzia = $_POST["garanzia"];
$periodoCopertura = $_POST["periodoCopertura"];
$categoria = $_POST["categoria"];
$sottocat = $_POST["sottocat"];
$visibilita = $_POST["visibilita"];
$reg = $_POST["reg"];
$prov = $_POST["prov"];
$com = $_POST["com"];
$regioneRistr = $_POST["regioneRistr"];
$provinciaRistr = $_POST["provinciaRistr"];


$errore=false;

$errorenuovousato =false;
$errorecategoria=false;


$erroreregione= false;
$erroreprovincia= false;
$errorecomune= false;

$errorevisibilita=false;

$erroreristretta=false;

//controllo sul venditore aquirente
if(!isset($_POST["condizione"])){
    $errore=true;
    $errorenuovousato = true;
}
$condizione = $_POST["condizione"];
if($categoria==""){
    $errore=true;
    $errorecategoria=true;
}

if($reg==""){
    $errore=true;
    $erroreregione=true;
}

if($prov==""){
    $errore=true;
    $erroreprovincia=true;
}

if($com==""){
    $errore=true;
    $errorecomune=true;
}

if(!isset($_POST["visibilita"])){
    $errore=true;
    $errorevisibilita = true;
}
$visibilita = $_POST["visibilita"];

if(($visibilita=="ristretta") and (($regioneRistr=="") or ($provinciaRistr==""))){
    $errore=true;
    $erroreristretta= true;
}
header("Location:../pubblicaAnnuncio.php?errorenuovousato=". urlencode($errorenuovousato). "&errorecategoria=". urlencode($errorecategoria). "&erroreregione=". urlencode($erroreregione). "&erroreprovincia=". urlencode($erroreprovincia). "&errorecomune=". urlencode($errorecomune). "&errorevisibilita=". urlencode($errorevisibilita). "&erroreristretta=". urlencode($erroreristretta) );
/*
if($errore == false){
  $inserimento="INSERT INTO annuncio (nomeAnnuncio, descrizioneAnnuncio, nomeCategoria, sottoCategoria, visibilita, nomeP, fotoP, prezzoP, nuovo, periodoUtilizzo, usura, garanzia, periodoCopertura, comune, provincia, regione, venditore)
                VALUES ('$nomeAnnuncio', '$descrizioneAnnuncio', '$nomeCategoria', '$cognome', '$sottoCategorias', '$visibilita', '$nomeP', '$fotoP', '$prezzoP', '$condizione', '$periodoUtilizzo', '$comune', '$provincia', '$regione', )";
  $ins=$cid->query($inserimento);
  if(empty($cid->error)){
    header("Location:../inserimento-riuscito.php");
  } else {
    header("Location:../inserimento-non-riuscito.php");
  }
  echo $cid->error;
} else {
  header("Location:../registrazione.php?erroreacquirente=". urlencode($errorevendacq). "&errorepsw=". urlencode($errorepsw). "&erroreemail=". urlencode($erroreemail) );
}*/


?>


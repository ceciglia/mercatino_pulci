<?php
$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);


// aggiungere controllo dei dati
$email = $_POST["email"];
$psw = $_POST["psw"];
$pswconf = $_POST["pswconf"];
$nome = $_POST["nome"];
$cognome = $_POST["cognome"];
$codFiscale = $_POST["codFiscale"];
$via = $_POST["via"];
$nCivico = $_POST["nCivico"];
$CAP = $_POST["CAP"];
$comune = $_POST["com"];
$provincia = $_POST["prov"];
$immagine = $_POST["immagine"];
$regione = $_POST["reg"];

$errore=false;
$errorevendacq =false;
$errorepsw =false;
$erroreemail= false;

//controllo sul venditore aquirente
if(!isset($_POST["venditore"])){
  $venditore = 0;
} else {
  $venditore = 1;
}
if(!isset($_POST["acquirente"])){
  $acquirente = 0;
} else {
  $acquirente = 1;
}
if(($acquirente == 0) && ($venditore == 0)){
  $errore=true;
  $errorevendacq = true;
}

//controllo sulla password
if ($psw != $pswconf){
  $errore=true;
  $errorepsw =true;
}

//controllo sulla mail
$sql = "SELECT email FROM utente WHERE email = '$email' ";
$res=$cid->query($sql);
$row = $res->fetch_array(MYSQLI_NUM);
if(!empty($row)){
  $errore=true;
  $erroreemail=true;
}

if($errore == false){
  $pswmd5=md5($password);
  $inserimento="INSERT INTO utente (email, psw, nome, cognome, codFiscale, immagine, via, nCivico, CAP, venditore, acquirente, comune, provincia, regione)
                VALUES ('$email', '$pswmd5', '$nome', '$cognome', '$codFiscale', '$immagine', '$via', '$nCivico', '$CAP', '$venditore', '$acquirente', '$comune', '$provincia', '$regione')";
  $ins=$cid->query($inserimento);
  if(empty($cid->error)){
    header("Location:../inserimento-riuscito.php");
  } else {
    header("Location:../inserimento-non-riuscito.php");
  }
  echo $cid->error;
} else {
  header("Location:../registrazione.php?erroreacquirente=". urlencode($errorevendacq). "&errorepsw=". urlencode($errorepsw). "&erroreemail=". urlencode($erroreemail) );
}




?>
?>

<?php
include "../common/connessione.php";

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

$regione = $_POST["reg"];

$errore=false;
$errorevendacq =false;
$errorepsw =false;
$erroreemail= false;

//upload immagine profilo
$imgData="";
$erroreImg="";
if(count($_FILES) > 0) {
    if(is_uploaded_file($_FILES['immagine']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['immagine']['tmp_name']));
        $imgName = $_FILES['immagine']['name'];
        $imgNameCmps = explode(".", $imgName);
        $imgExtension = strtolower(end($imgNameCmps));

        $allowedImgExtensions = array('jpg');
        if (in_array($imgExtension, $allowedImgExtensions)) {
            $erroreImg='';
        } else {
            $erroreImg= 'Upload non riuscito.' . '<br>' . 'Tipi di estensioni consentite: ' . implode(',', $allowedImgExtensions);
            $errore=true;
        }
    }
}

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
      $pswmd5=md5($psw);
      $inserimento="INSERT INTO utente (email, psw, nome, cognome, codFiscale, immagine, via, nCivico, CAP, venditore, acquirente, comune, provincia, regione)
                    VALUES ('$email', '$pswmd5', '$nome', '$cognome', '$codFiscale', '{$imgData}', '$via', '$nCivico', '$CAP', '$venditore', '$acquirente', '$comune', '$provincia', '$regione')";
      $ins=$cid->query($inserimento);
      if(empty($cid->error)){
        header("Location:../inserimento-riuscito.php");
      } else {
        header("Location:../inserimento-non-riuscito.php");
      }
      echo $cid->error;
} else {
  header("Location:../registrazione.php?erroreacquirente=". urlencode($errorevendacq). "&errorepsw=". urlencode($errorepsw). "&erroreemail=". urlencode($erroreemail). "&erroreImg=" .urlencode($erroreImg));
}




?>
?>

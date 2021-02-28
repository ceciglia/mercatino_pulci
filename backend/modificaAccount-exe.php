
<?php
session_start();
include "../common/connessione.php";


$email = $_SESSION["email"];

if(isset($_POST["conferma"])) {
  $psw = $_POST["psw"];
  $npassword = $_POST["npassword"];
  $confnpassword = $_POST["confnpassword"];

  $nome = $_POST["nome"];
  $cognome = $_POST["cognome"];
  $codFiscale = $_POST["codFiscale"];
  $via = $_POST["via"];
  $nCivico = $_POST["nCivico"];
  $CAP = $_POST["CAP"];
  $comune = $_POST["comune"];
  $provincia = $_POST["provincia"];
  $regione = $_POST["regione"];

  $errorevendacq = false;
  $errorepsw = false;
  $erroreemail = false;

  $imgDataUpdate="";
  $erroreImgUpdate="";
  if(count($_FILES) > 0) {
    if(is_uploaded_file($_FILES['immagineUpdate']['tmp_name'])) {
      $imgDataUpdate = addslashes(file_get_contents($_FILES['immagineUpdate']['tmp_name']));
      $imgNameUpdate = $_FILES['immagineUpdate']['name'];
      $imgSizeUpdate = $_FILES['immagineUpdate']['size'];
      $imgNameCmpsUpdate = explode(".", $imgNameUpdate);
      $imgExtensionUpdate = strtolower(end($imgNameCmpsUpdate));

      if ($imgSizeUpdate>500000000){
        $erroreImgUpdate= true;
      }
      $allowedImgExtensionsUpdate = array('jpg');
      if (in_array($imgExtensionUpdate, $allowedImgExtensionsUpdate)) {
        $erroreImgUpdate=false;
      } else {
        $erroreImgUpdate= true;
      }
    }
  }

  if (isset($imgDataUpdate)){
    $cid->query("UPDATE utente SET immagine='{$imgDataUpdate}' WHERE email='$email'");
  }


  if ($nome != "") {
    $cid->query("UPDATE utente SET nome='$nome' WHERE email='$email'");
  }
  if (!empty($cognome)) {
    $cid->query("UPDATE utente SET cognome='$cognome' WHERE email='$email'");
  }
  if (!empty($codFiscale)) {
    $cid->query("UPDATE utente SET codFiscale='$codFiscale' WHERE email='$email'");
  }
  if (!empty($via)) {
    $cid->query("UPDATE utente SET via='$via' WHERE email='$email'");
  }
  if (!empty($nCivico)) {
    $cid->query("UPDATE utente SET nCivico='$nCivico' WHERE email='$email'");
  }
  if (!empty($CAP)) {
    $cid->query("UPDATE utente SET CSP='$CAP' WHERE email='$email'");
  }
  if (!empty($immagine)) {
    $cid->query("UPDATE utente SET immagine='$immagine' WHERE email='$email'");
  }

  //area geografica e venditore/aquirente
  $sql = "SELECT comune,provincia,regione,acquirente,venditore,psw FROM utente WHERE email = '$email' ";
  $datiutente = $cid->query($sql);
  $row = $datiutente->fetch_array();

  if ($row["regione"] != $regione) {
    $cid->query("UPDATE utente SET regione='$regione' WHERE email='$email'");
  }

  if ($row["provincia"] != $provincia) {
    $cid->query("UPDATE utente SET provincia='$provincia' WHERE email='$email'");
  }

  if ($row["regione"] != $regione) {
    $cid->query("UPDATE utente SET comune='$comune' WHERE email='$email'");
  }

  //veditore acquirente
  if (!isset($_POST["venditore"])) {
    $venditore = 0;
  } else {
    $venditore = 1;
  }
  if (!isset($_POST["acquirente"])) {
    $acquirente = 0;
  } else {
    $acquirente = 1;
  }

  $erroreAV=0;
  if(($acquirente==0) and ($venditore==0)){
      $erroreAV=true;
  }else {
    if ($venditore != $row["venditore"]) {
      $cid->query("UPDATE utente SET venditore='$venditore' WHERE email='$email'");
      $_SESSION["venditore"] = $venditore;
    }

    if ($acquirente != $row["acquirente"]) {
      $cid->query("UPDATE utente SET acquirente='$acquirente' WHERE email='$email'");
      $_SESSION["acquirente"] = $acquirente;
      if ($_SESSION["acquirente"]==1){
        $_SESSION["regione"]=$regione;
        $_SESSION["provincia"]=$provincia;
      }
    }
  }


//controllo sulla password
//controllo sulla vecchia password
  if(($pswctrl!="") and ($npassword != "") and ($confnpassword != "")){
    $pswctrl = (md5($psw));
    if ($row["psw"] == $pswctrl) {
      if ($npassword == $confnpassword){
        $paswcod = md5($npassword);
        $cid->query("UPDATE utente SET psw='$paswcod' WHERE email='$email'");
        if (empty($cid->error)){
          $npmsg=false;
        }else{
          $npmsg=true;
        }
      }else{
        $npmsg=true;
      }
    }else{
      $npmsg=true;
    }
  }

  if (empty($cid->error)) {
    header("Location:../account.php?erroreAV=" .urlencode($erroreAV). "&npmsg=" .urlencode($npmsg). "&erroreImgUpdate=".urlencode($erroreImgUpdate));
  } else {
    header("Location:../account.php?erroreAV=" .urlencode($erroreAV). "&npmsg=" .urlencode($npmsg). "&erroreImgUpdate=".urlencode($erroreImgUpdate));
  }

}

if(isset($_POST["annulla"])){
  header("Location:../account.php");
}


?>


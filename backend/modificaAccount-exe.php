
<?php
session_start();
$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);


// aggiungere controllo dei dati
$email = $_SESSION["email"];

if(isset($_POST["conferma"])) {
  $password = $_POST["password"];
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
//$immagine = $_POST["immagine"];
  $regione = $_POST["regione"];

  $errore = false;
  $errorevendacq = false;
  $errorepsw = false;
  $erroreemail = false;


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
      $erroreAV=1;
  }else {
    if ($venditore != $row["venditore"]) {
      $cid->query("UPDATE utente SET venditore='$venditore' WHERE email='$email'");
      $_SESSION["venditore"] = $venditore;
    }

    if ($acquirente != $row["acquirente"]) {
      $cid->query("UPDATE utente SET acquirente='$acquirente' WHERE email='$email'");
      $_SESSION["acquirente"] = $acquirente;
    }
  }


//controllo sulla password
//controllo sulla vecchia password
  $pswctrl = (md5($password));
  if ($row["password"] == $pswctrl) {
    if ($npassword == $confnpassword) {
      $paswcod = md5($npassword);
      $cid->query("UPDATE utente SET password='$paswcod' WHERE email='$email'");
    }
  }

  if (empty($cid->error)) {
    header("Location:../account.php");
  }

}

if(isset($_POST["annulla"])){
  header("Location:../account.php");
}
?>


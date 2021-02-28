<?php
session_start();
include "../common/connessione.php";


$nomeAnnuncio=$_POST["nomeAnnuncio"];
$descrizioneAnnuncio=$_POST["descrizioneAnnuncio"];
$nomeProdotto=$_POST["nomeProdotto"];
$prezzoP=$_POST["price"];
$categoria=$_POST["categoria"];
$sottocat=$_POST["sottocat"];
$visibilita=$_POST["visibilita"];
$regioneRistr=$_POST["regioneRistr"];
$provinciaRistr=$_POST["provinciaRistr"];
$comune=$_POST["com"];
$provincia=$_POST["prov"];
$regione=$_POST["reg"];


$errore=false;
$errorenuovousato =false;
$errorecategoria=false;
$erroreregione= false;
$erroreprovincia= false;
$errorecomune= false;
$errorevisibilita=false;
$erroreristretta=false;
$erroregaranzia=false;
$erroreperiodoutilizzo=false;


$imgData="";
$erroreImg="";
if(count($_FILES) > 0) {
    if(is_uploaded_file($_FILES['fotoP']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['fotoP']['tmp_name']));
        $imgName = $_FILES['fotoP']['name'];
        $imgSize = $_FILES['fotoP']['size'];
        $imgNameCmps = explode(".", $imgName);
        $imgExtension = strtolower(end($imgNameCmps));

        if ($imgSize>500000000){
            $erroreImg= 'Upload non riuscito.' . '<br>' . 'Le immagini non devono superare i 4096 MB.';
            $errore=true;
        }
        $allowedImgExtensions = array('jpg');
        if (in_array($imgExtension, $allowedImgExtensions)) {
            $erroreImg='';
        } else {
            $erroreImg= 'Upload non riuscito.' . '<br>' . 'Tipi di estensioni consentite: ' . implode(',', $allowedImgExtensions);
            $errore=true;
        }
    }
}



if(!isset($_POST["condizione"])){
    $errore=true;
    $errorenuovousato = true;
}else{
    $condizione = $_POST["condizione"];
    if($condizione == 1){
        if(isset($_POST["garanzia"])){
            if(($_POST["periodoCopertura"])==""){
                $errore=true;
                $erroregaranzia = true;
            }else{
                $periodoCopertura = $_POST["periodoCopertura"];
            }
        }
    }else{
        $periodoUtilizzo = $_POST["periodoUtilizzo"];
        if($periodoUtilizzo==""){
            $errore=true;
            $erroreperiodoutilizzo = true;
        }
        $usura = $_POST["usura"];

}
}
if(!isset($_POST["visibilita"])){
    $errore=true;
    $errorevisibilita = true;
}

$visibilita = $_POST["visibilita"];
$visibilitaP=1;
if(($visibilita=="ristretta") and ($regioneRistr=="Seleziona una regione: ")){
    $errore=true;
    $erroreristretta= true;
}else{
    if($provinciaRistr=="Seleziona una provincia: "){
        $visibilitaP=0;
        $cercaprov="SELECT provincia FROM areaGeografica WHERE regione='$regioneRistr' LIMIT 1";
        $ris=$cid->query($cercaprov);
        $provinciaRistr=$ris->fetch_assoc();
    }
}

$venditore=$_SESSION["email"];

if($errore == false){
  if($condizione==1) {
      if(isset($_POST["garanzia"])){
          $inserimento="INSERT INTO annuncio (nomeAnnuncio, descrizioneAnnuncio, nomeCategoria, sottoCategoria, visibilita, nomeP, fotoP, prezzoP, nuovo, garanzia, periodoCopertura, comune, provincia, regione, venditore)
                        VALUES ('$nomeAnnuncio', '$descrizioneAnnuncio', '$categoria', '$sottocat', '$visibilita', '$nomeProdotto', '{$imgData}', '$prezzoP', '$condizione', '1' , '$periodoCopertura', '$comune', '$provincia', '$regione', '$venditore')";
          $cid->query($inserimento);

      }else{
          $inserimento="INSERT INTO annuncio (nomeAnnuncio, descrizioneAnnuncio, nomeCategoria, sottoCategoria, visibilita, nomeP, fotoP, prezzoP, nuovo, garanzia, periodoCopertura, comune, provincia, regione, venditore)
                        VALUES ('$nomeAnnuncio', '$descrizioneAnnuncio', '$categoria', '$sottocat', '$visibilita', '$nomeProdotto', '{$imgData}', '$prezzoP', '$condizione', '0' , '$periodoCopertura', '$comune', '$provincia', '$regione', '$venditore')";
          $cid->query($inserimento);
      }

  }else{
      $inserimento="INSERT INTO annuncio (nomeAnnuncio, descrizioneAnnuncio, nomeCategoria, sottoCategoria, visibilita, nomeP, fotoP, prezzoP, nuovo, usura, periodoUtilizzo, comune, provincia, regione, venditore)
                        VALUES ('$nomeAnnuncio', '$descrizioneAnnuncio', '$categoria', '$sottocat', '$visibilita', '$nomeProdotto', '{$imgData}', '$prezzoP', '$condizione','$usura', '$periodoUtilizzo', '$comune', '$provincia', '$regione', '$venditore')";
      $cid->query($inserimento);
  }


  if(empty($cid->error)){
      $idquery=$cid->query("SELECT MAX(idAnnuncio) AS id FROM annuncio WHERE venditore='$venditore'");
      $id=$idquery->fetch_assoc();
      $idAnn=$id["id"];
      $cid->query("INSERT INTO statoa (idAnnuncio, stato) VALUES ('$idAnn', 'in vendita')");
      if($visibilita=="ristretta"){
          $cid->query("INSERT INTO luogovisibilita (idAnnuncio, comune, provincia, regione, visibilitaP) VALUES ('$idAnn', '$provinciaRistr', '$provinciaRistr', '$regioneRistr', '$visibilitaP')");
      }
      if(empty($cid->error)){
         header("Location:../inserimento-riuscito.php");
      }else{
         echo $cid->error;
         /*header("Location:../inserimento-non-riuscito.php");*/
      }
  } else {
      echo $cid->error;
      /*header("Location:../inserimento-non-riuscito.php");*/
  }
  echo $cid->error;
} else {
     header("Location:../pubblicaAnnuncio.php?errorenuovousato=". urlencode($errorenuovousato). "&errorecategoria=". urlencode($errorecategoria).  "&errorevisibilita=". urlencode($errorevisibilita). "&erroreristretta=". urlencode($erroreristretta). "&erroreImg=" .urlencode($erroreImg). "&erroregaranzia=" .urlencode($erroregaranzia). "&erroreperiodoutilizzo=" .urlencode($erroreperiodoutilizzo) );
}


?>


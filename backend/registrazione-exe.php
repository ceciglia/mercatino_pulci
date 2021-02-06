<?php

	 include "../common/connessione.php";

     if ($cid->connect_error){
       die(' ('. $cid->connect_error .')' . $cid->connect_error);}
	 else { echo 'Connect' . $cid->host_info . "\n";}


	 if ((isset($_POST['email'])) && (isset($_POST['psw'])) && (isset($_POST['nome'])) && (isset($_POST['cognome'])) && (isset($_POST['codFiscale'])) && (isset($_POST['immagine'])) && (isset($_POST['via'])) && (isset($_POST['nCivico'])) && (isset($_POST['CAP'])) && (isset($_POST['venditore'])) && (isset($_POST['acquirente'])) && (isset($_POST['comune'])) && (isset($_POST['provincia'])) && (isset($_POST['regione']))){
		     $email=$_POST['email'];
		     $psw=$_POST['psw'];
			 $nome=$_POST['nome'];
			 $cognome=$_POST['cognome'];
			 $codFiscale=$_POST['codFiscale'];
			 $immagine=$_POST['immagine'];
			 $via=$_POST['via'];
			 $nCivico=$_POST['nCivico'];
			 $CAP=$_POST['CAP'];
			 $venditore=$_POST['venditore'];
			 $acquirente=$_POST['acquirente'];
			 $comune=$_POST['comune'];
			 $provincia=$_POST['provincia'];
			 $regione=$_POST['regione'];
			 $insert = "INSERT INTO utente (email, psw, nome, cognome, codFiscale, immagine, via, nCivico, CAP, venditore, acquirente, comune, provincia, regione) VALUES ('$email', '$psw', '$nome', '$cognome', '$codFiscale', '$immagine', '$via', '$nCivico', '$CAP', '$venditore', '$acquirente', '$comune', '$provincia', '$regione');";
			 $ris= $cid->query($insert);
			 if($ris){
				echo("<br>Inserimento riuscito");
			 } else {
				echo("<br>Inserimento non riuscito" .$cid->error);

			 };
			 echo "ok";
	 }else{
			 echo "error";
	 };




?>

<?php
	include_once "connessione.php";
	include_once "funzioniFR.php";

	$email="";
	$psw="";
	if (isset($cid)) {
		if (isset($_POST)){
			$email= $_POST["email"];
			$psw = $_POST["psw"];

			if (emptyInput($email)==true) {
				header("Location:../index.php?error=emptyInputEmail");
				exit();	//check
			} else if (emptyInput($psw)==true){
				header("Location:../index.php?error=emptyInputPsw");
				exit();	//check
			}

			$result= isUser($cid,$email,$psw);
			if ($result["status"]=="ok") {
				// if (isset($_POST["ricordami"]))
				// // se l'utente richiede di essere ricordato, allora setto il cookie
				// // questo approccio è MOLTO insicuro (per cui non consento di salvare anche la password
				// // vedremo più avanti come renderlo più sicuro e salvare anche la password
				// 	setcookie ("user",$login,time()+43200,"/");
				// elseif (isset($_COOKIE["user"])) {
				// 	unset($_COOKIE['user']);
				// 	setcookie('user', null, -1, '/');
				// }

				$cid->close();		//chiude connessione al db
				// session_start();
				if(!isset($_SESSION)) {
					session_start();
				}
				$_SESSION["email"]=$email;
				$_SESSION["logged"]=true;
				header("Location:../index.php?status=ok&msg=". urlencode($result["msg"]));
			} else {
				header("Location:../index.php?status=ko&msg=" . urlencode($result["msg"]));
			}

		}

	} else {
		header("Location:../index.php?status=ko&msg=". urlencode("errore di connessione al db"));
	}
		



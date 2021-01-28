<?php

	$email= $_POST["email"];
	$psw = $_POST["psw"];

	include_once("connessione.php");
	include_once("funzioniFR.php");


	if ($cid)
	{
		$result= isUser($cid,$email,$psw);
		if ($result["status"]=="ok")
		{
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
			session_start();
			$_SESSION["email"]=$email;
			$_SESSION["logged"]=true;
			header("Location:../index.php?status=ok&msg=". urlencode($result["msg"]));
		}
		else
		{
			header("Location:../index.php?status=ko&msg=" . urlencode($result["msg"]));
		}
	}
	else
		header("Location:../index.php?status=ko&msg=". urlencode("errore di connessione al db"));


?>

<?php

$email= $_POST["email"];
$psw = $_POST["psw"];

include_once("connessione.php");
include_once("funzioniFR.php");


if ($cid)
{
    $result= isUser($cid,$email,$psw);
	  if ($result["status"]=="ok"){
	  $cid->close();
	  session_start();
	  $_SESSION["utente"]=$email;
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

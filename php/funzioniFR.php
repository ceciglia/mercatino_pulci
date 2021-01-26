<?php

function isUser($cid,$email,$psw)
{
	$risultato= array("msg"=>"","status"=>"ok");

   /* inserire controlli dell'input */
   $sql = "SELECT * FROM utente where email = '$email' and psw = '$psw'";

   $res = $cid->query($sql);
   	if ($res==null){
	        $msg = "Si sono verificati i seguenti errori:<br/>"
     		. $res->error;
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;
	}elseif($res->num_rows==0 || $res->num_rows>1)
	{
			$msg = "Login o password sbagliate";
			$risultato["status"]="ko";
			$risultato["msg"]=$msg;
	}elseif($res->num_rows==1)
	{
	    $msg = "Login effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;
	}
    return $risultato;
}

?>

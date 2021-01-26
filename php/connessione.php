<?php
	 $hostmane = 'localhost';
   $username = 'root';
   $password = '';
   $db = 'mercatino7_Fusari_Rossi';
   $cid = new mysqli ($hostmane, $username, $password, $db);
   if ($cid->connect_error){
      die(' ('. $cid->connect_error .')' . $cid->connect_error);}
   else { echo '' . $cid->host_info . "\n";}
?>

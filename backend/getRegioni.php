<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostname, $username, $password, $db);


$sql = "SELECT DISTINCT regione FROM areageografica ORDER BY regione";

$res = $cid->query($sql);
if ($res == null){
    $risultato["nessuna"]=true;
}

$regioni=array();
while($row=$res->fetch_row()){
    $regioni[]=$row[0];
}

$risultato["contenuto"]=$regioni;
echo json_encode($risultato);
?>

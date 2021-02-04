<?php

$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);


$sql = "SELECT DISTINCT valoreUsura FROM statousura";

$res = $cid->query($sql);
if ($res == null){
    $risultato["nessuna"]=true;
}

$valore=array();
while($row=$res->fetch_row()){
    $valore[]=$row[0];
}

$risultato["contenuto"]=$valore;
echo json_encode($risultato);
?>

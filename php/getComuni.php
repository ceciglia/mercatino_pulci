<?php

$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);

$provincia = mysqli_real_escape_string($cid, $_GET['regione']);
$sql = "SELECT DISTINCT comune FROM areageografica WHERE provincia = '$provincia' ORDER BY comune";

$res = $cid->query($sql);
if ($res == null){
    $risultato["nessuna"]=true;
}

$comuni=array();
while($row=$res->fetch_row()){
    $comuni[]=$row[0];
}

$risultato["contenuto"]=$comuni;
echo json_encode($risultato);
?>

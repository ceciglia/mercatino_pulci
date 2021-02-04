<?php

$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);

$regione = mysqli_real_escape_string($cid, $_GET['regione']);
$sql = "SELECT DISTINCT provincia FROM areageografica WHERE regione = '$regione' ORDER BY provincia";

$res = $cid->query($sql);
if ($res == null){
    $risultato["nessuna"]=true;
}

$province=array();
while($row=$res->fetch_row()){
    $province[]=$row[0];
}

$risultato["contenuto"]=$province;
echo json_encode($risultato);
?>

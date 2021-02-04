<?php

$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);


$sql = "SELECT DISTINCT nomeCategoria FROM categoria ORDER BY nomeCategoria";

$res = $cid->query($sql);
if ($res == null){
    $risultato["nessuna"]=true;
}

$categoria=array();
while($row=$res->fetch_row()){
    $categoria[]=$row[0];
}

$risultato["contenuto"]=$categoria;
echo json_encode($risultato);
?>

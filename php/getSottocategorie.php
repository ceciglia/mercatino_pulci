<?php

$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);

$categoria = mysqli_real_escape_string($cid, $_GET['categoria']);
$sql = "SELECT DISTINCT sottoCategoria FROM categoria WHERE nomeCategoria = '$categoria'";

$res = $cid->query($sql);
if ($res == null){
    $risultato["nessuna"]=true;
}

$sottoCat=array();
while($row=$res->fetch_row()){
    $sottoCat[]=$row[0];
}

$risultato["contenuto"]=$sottoCat;
echo json_encode($risultato);
?>

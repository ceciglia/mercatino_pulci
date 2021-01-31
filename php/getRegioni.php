<?php


$hostmane = 'localhost';
$username = 'root';
$password = '';
$db = 'mercatino7_Fusari_Rossi';
$cid = new mysqli ($hostmane, $username, $password, $db);


header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

$stmt = $cid->prepare("SELECT DISTINCT regione FROM areageografica ORDER BY regione LIMIT ?");
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);


echo json_encode($outp);

?>

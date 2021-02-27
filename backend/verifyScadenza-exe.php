<?php
include "../common/connessione.php";

$verifyScadenza = "SELECT SCADUTO.* FROM (SELECT a.idAnnuncio, a.dataPubblicazione, a.nuovo, s.stato FROM annuncio a JOIN statoa s ON a.idAnnuncio=s.idAnnuncio WHERE ((a.nuovo=0 and a.dataPubblicazione NOT IN (SELECT a1.dataPubblicazione FROM annuncio a1 WHERE (a1.dataPubblicazione BETWEEN SUBDATE(CURRENT_TIMESTAMP(), INTERVAL 3 DAY) AND NOW() and a.idAnnuncio=a1.idAnnuncio))) or (a.nuovo=1 and a.dataPubblicazione NOT IN (SELECT a1.dataPubblicazione FROM annuncio a1 WHERE (a1.dataPubblicazione BETWEEN SUBDATE(CURRENT_TIMESTAMP(), INTERVAL 10 DAY) AND NOW() and a.idAnnuncio=a1.idAnnuncio)))) and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SCADUTO WHERE SCADUTO.stato<>'scaduto' and SCADUTO.stato<>'venduto' and SCADUTO.stato<>'eliminato'";
$result = $cid->query($verifyScadenza);

while($row=$result->fetch_assoc()){
    $idAn = $row["idAnnuncio"];
    $setScaduti = "INSERT INTO statoa(idAnnuncio, stato) VALUE ('$idAn', 'scaduto')";
    $inserimento = $cid->query($setScaduti);
}
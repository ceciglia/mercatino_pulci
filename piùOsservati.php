<?php
    include_once "php/connessione.php";
    include_once  "php/funzioniFR.php";

    $sql = "SELECT fotoP, nomeAnnuncio, prezzoP, COUNT(*) AS nOsservatori, (serietaV+puntualitaV)/2 AS punteggioMedio FROM osserva NATURAL JOIN annuncio GROUP BY idAnnuncio ORDER BY nOsservatori DESC, punteggioMedio DESC LIMIT 6";

    $risultato = $cid->query($sql);
    $piuOsservati = $risultato->fetch_row();
    $nomeAn1=$piuOsservati[1];
    $prezzo1=$piuOsservati[2];
    $nomeAn2=$piuOsservati[3];
    $prezzo2=$piuOsservati[4];
    $nomeAn3=$piuOsservati[5];
    $prezzo3=$piuOsservati[6];
    $nomeAn4=$piuOsservati[7];
    $prezzo4=$piuOsservati[8];
    $nomeAn5=$piuOsservati[9];
    $prezzo5=$piuOsservati[10];
    $nomeAn6=$piuOsservati[11];
    $prezzo6=$piuOsservati[12];


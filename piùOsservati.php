<?php
    include_once "php/connessione.php";
    include_once  "php/funzioniFR.php";

    $sql = "SELECT fotoP, nomeAnnuncio, prezzoP, COUNT(*) AS nOsservatori, (serietaV+puntualitaV)/2 AS punteggioMedio FROM osserva NATURAL JOIN annuncio GROUP BY idAnnuncio ORDER BY nOsservatori DESC, punteggioMedio DESC LIMIT 6";

    $risultato = $cid->query($sql);
    $piuOsservati = $risultato->fetch_row();
    $nomeAn1=$piuOsservati[1];
    $prezzo1=$piuOsservati[2];

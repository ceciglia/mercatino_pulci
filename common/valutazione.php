<?php

function valutazioneDettagliAnnuncio($cid, $venditore){

          $sqlV="SELECT AVG((serietaV+puntualitaV)/2) AS mediaV, COUNT(*) AS nVal FROM `annuncio` WHERE venditore = '$venditore' AND serietaV is not null AND puntualitaV is not null";
          $resV = $cid->query($sqlV);
          $rowV=$resV->fetch_array();
          $mediaV=round($rowV["mediaV"], 2);
          $nValV=$rowV["nVal"];

          echo'<p class="title2"><b>Valutazione del venditore: </b></p>
          <div style="display: inline-block; color: #ffc107">';

          $iV=0;
          while($iV <= 4){
                if($mediaV > ($iV + 0.75)) {
                    echo '<i class="fa fa-star" aria-hidden="true" ></i>';
                }elseif(($mediaV < ($iV + 0.25)) and ($mediaV > $iV)) {
                    echo '<i class="fa fa-star" aria-hidden="true" ></i>';
                }elseif(($mediaV > ($iV + 0.25)) and ($mediaV < ($iV + 0.75))){
                    echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
                }else{
                    echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
                }
                $iV = $iV + 1;

          }
          echo'</div>';
          echo'<p class="stelle-valutazione-profilo numero-valutazioni">('. $mediaV. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i> '. $nValV. ')</p>';



}

function valutazioneRichiestaAcquisto($cid, $acquirente){

    $sqlA="SELECT AVG((serietaA+puntualitaA)/2) AS mediaA, COUNT(*) AS nVal FROM `richiestaacquisto` WHERE acquirenteRA = '$acquirente' AND serietaA is not null AND puntualitaA is not null";
    $resA = $cid->query($sqlA);
    $rowA=$resA->fetch_array();
    $mediaA=round($rowA["mediaA"], 2);
    $nValA=$rowA["nVal"];


    echo'<div class="stelle-valutazione-profilo">';
    $iA=0;
    while($iA <= 4){
        if($mediaA > ($iA + 0.75)) {
            echo '<i class="fa fa-star" aria-hidden="true" ></i>';
        }elseif(($mediaA < ($iA + 0.25)) and ($mediaA > $iA)) {
            echo '<i class="fa fa-star" aria-hidden="true" ></i>';
        }elseif(($mediaA > ($iA + 0.25)) and ($mediaA < ($iA + 0.75))){
            echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
        }else{
            echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
        }
        $iA = $iA + 1;

    }


}

function valutazioneVenditore($cid, $idAnnuncio){

        $sqlV = "SELECT serietaV, puntualitaV  FROM annuncio WHERE idAnnuncio='$idAnnuncio'";
        $resV = $cid->query($sqlV);
        $rowV = $resV->fetch_array();

    echo'
        <p>Hai valutato la <b >serietà</b> con:</p>
            <div class="demo-content">';
            $iV=0;
            while($iV <= 4){
                if($rowV["serietaV"] > ($iV + 0.75)) {
                    echo '<i class="fa fa-star" aria-hidden="true" ></i>';
                }elseif(($rowV["serietaV"] < ($iV + 0.25)) and ($rowV["serietaV"] > $iV)) {
                    echo '<i class="fa fa-star" aria-hidden="true" ></i>';
                }elseif(($rowV["serietaV"] > ($iV + 0.25)) and ($rowV["serietaV"] < ($iV + 0.75))){
                    echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
                }else{
                    echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
                }
                $iV = $iV + 1;

            }
            echo'</div>
            <br>
            <p>Hai valutato la <b >puntualità</b> con:</p>
            <div class="demo-content">';
            $iP=0;
            while($iP <= 4){
                if($rowV["puntualitaV"] > ($iP + 0.75)) {
                    echo '<i class="fa fa-star" aria-hidden="true" ></i>';
                }elseif(($rowV["puntualitaV"] < ($iP + 0.25)) and ($rowV["puntualitaV"] > $iP)) {
                    echo '<i class="fa fa-star" aria-hidden="true" ></i>';
                }elseif(($rowV["puntualitaV"] > ($iP + 0.25)) and ($rowV["puntualitaV"] < ($iP + 0.75))){
                    echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
                }else{
                    echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
                }
                $iP = $iP + 1;

            }
            echo'</div';

}

function valutazioneAcquirente($cid, $idAnnuncio, $acquirente){

    $sqlA = "SELECT serietaA, puntualitaA  FROM richiestaacquisto WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA='$acquirente'";
    $resA = $cid->query($sqlA);
    $rowA = $resA->fetch_array();

    echo'
        <p>Hai valutato la <b >serietà</b> con:</p>
            <div class="demo-content">';
    $iS=0;
    while($iS <= 4){
        if($rowA["serietaA"] > ($iS + 0.75)) {
            echo '<i class="fa fa-star" aria-hidden="true" ></i>';
        }elseif(($rowA["serietaA"] < ($iS + 0.25)) and ($rowA["serietaA"] > $iS)) {
            echo '<i class="fa fa-star" aria-hidden="true" ></i>';
        }elseif(($rowA["serietaA"] > ($iS + 0.25)) and ($rowA["serietaA"] < ($iS + 0.75))){
            echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
        }else{
            echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
        }
        $iS = $iS + 1;

    }
    echo'</div>
        <br>
        <p>Hai valutato la <b >puntualità</b> con:</p>
            <div class="demo-content">';
    $iP=0;
    while($iP <= 4){
        if($rowA["puntualitaA"] > ($iP + 0.75)) {
            echo '<i class="fa fa-star" aria-hidden="true" ></i>';
        }elseif(($rowA["puntualitaA"] < ($iP + 0.25)) and ($rowA["puntualitaA"] > $iP)) {
            echo '<i class="fa fa-star" aria-hidden="true" ></i>';
        }elseif(($rowA["puntualitaA"] > ($iP + 0.25)) and ($rowA["puntualitaA"] < ($iP + 0.75))){
            echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
        }else{
            echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
        }
        $iP = $iP + 1;

    }
    echo'</div';

}

?>

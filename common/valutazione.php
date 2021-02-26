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

function valutazionesemplice($cid, $idAnnuncio){
    $sqlV="SELECT serietaV, puntualitaV  FROM annuncio WHERE idAnnuncio='$idAnnuncio'";
    $resV = $cid->query($sqlV);
    $rowV=$resV->fetch_array();
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
        <p>Hai valutato la <b >serietà</b> con:</p>
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

?>

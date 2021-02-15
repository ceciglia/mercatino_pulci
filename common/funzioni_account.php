<?php

function ciao($cid){
    if($_SESSION["logged"]==true) {
        $email_sessione = $_SESSION["email"];
        $sql = "SELECT nome,cognome FROM utente WHERE email = '$email_sessione' ";
        $risultato = $cid->query($sql);
        $row=$risultato->fetch_array();

         echo'<p class="p_benvenuto" >Ciao '. $row["nome"] .' '. $row["cognome"] .' !</p>';


    }
}

function utenteinfo($cid){
    if($_SESSION["logged"]==true){
        $email_sessione=$_SESSION["email"];
        $sql = "SELECT email,nome,cognome,codFiscale,via,nCivico,CAP,comune,provincia,regione FROM utente WHERE email = '$email_sessione' ";
        $risultato = $cid->query($sql);

        //variabili contenenti i risultati della query
        $row=$risultato->fetch_array();
        $email = $row["email"];
        $nome = $row["nome"];
        $cognome = $row["cognome"];
        $codFiscale = $row["codFiscale"];
        $via = $row["via"];
        $nCivico = $row["nCivico"];
        $CAP = $row["CAP"];
        $comune = $row["comune"];
        $provincia = $row["provincia"];
        $regione = $row["regione"];

        //visualizzo i dati dell'utente
        echo'
        <div class="col-sm-8" >
          <textarea name="text"  placeholder="E-mail: " rows="1" disabled class="profilo-name"></textarea ><textarea name="text"  rows="1" disabled class="profilo-data">'. $email .'</textarea >
          <textarea name="text"  placeholder="Nome: " rows="1" disabled class="profilo-name"></textarea ><textarea name="text" rows="1" disabled class="profilo-data">'. $nome .'</textarea >
          <textarea name="text"  placeholder="Cognome: " rows="1" disabled class="profilo-name"></textarea ><textarea name="text"  rows="1" disabled class="profilo-data">'. $cognome .'</textarea >

          <textarea name="text"  placeholder="CF: " rows="1" disabled class="profilo-name"></textarea><textarea name="text" rows="1" disabled class="profilo-data">'. $codFiscale .'</textarea>
          <textarea name="text"  placeholder="Via: " rows="1" disabled class="profilo-name"></textarea><textarea name="text" rows="1" disabled class="profilo-data">'. $via .'</textarea>
          <textarea name="text"  placeholder="N° civico: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  rows="1" disabled class="profilo-data">'. $nCivico .'</textarea>
          <textarea name="text"  placeholder="CAP: " rows="1" disabled class="profilo-name"></textarea><textarea name="text" rows="1" disabled class="profilo-data">'. $CAP .'</textarea>
          <textarea name="text"  placeholder="Comune: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  rows="1" disabled class="profilo-data">'. $comune .'</textarea>
          <textarea name="text"  placeholder="Provincia: " rows="1" disabled class="profilo-name"></textarea><textarea name="text" rows="1" disabled class="profilo-data">'. $provincia .'</textarea>
          <textarea name="text"  placeholder="Regione: " rows="1" disabled class="profilo-name"></textarea><textarea name="text" rows="1" disabled class="profilo-data">'. $regione .'</textarea>
        </div>
        ';
      }
}

function acquirente_venditore($cid){
  if($_SESSION["logged"]==true){
      $email_sessione=$_SESSION["email"];
      $sql="SELECT acquirente, venditore FROM utente WHERE email = '$email_sessione' ";
      $risultato = $cid->query($sql);
      $row=$risultato->fetch_array();

      //controllo su acquirente
      if($row["acquirente"]==1){
        echo'
            <button type="submit" class="btn btn-profilo pull-left btn-a-v" disabled><i class="fa fa-check" aria-hidden="true"></i>   Acquirente</button>
        ';
      }else{
        echo'
            <button type="submit" class="btn btn-profilo pull-left btn-non-a-v" disabled><i class="fa fa-times" aria-hidden="true"></i>   Acquirente</button>
        ';
      }
      //controllo su venditore
      if($row["venditore"]==1){
        echo'
            <button type="submit" class="btn btn-profilo pull-right btn-a-v" disabled><i class="fa fa-check" aria-hidden="true"></i>   Venditore</button>
        ';
      }else{
        echo'
            <button type="submit" class="btn btn-profilo pull-right btn-non-a-v" disabled><i class="fa fa-times" aria-hidden="true"></i>   Venditore</button>
        ';
      }
  }
}

function valutazione($cid){
  if($_SESSION["logged"]==true){
    $email_sessione=$_SESSION["email"];
    $sql="SELECT acquirente, venditore FROM utente WHERE email = '$email_sessione' ";
    $risultato = $cid->query($sql);
    $row=$risultato->fetch_array();

    if(($row["acquirente"]==1) and ($row["venditore"]==0)){
          $sqlA="SELECT AVG((serietaA+puntualitaA)/2) AS mediaA, COUNT(*) AS nVal FROM `richiestaacquisto` WHERE acquirenteRA = '$email_sessione' AND serietaA is not null AND puntualitaA is not null";
          $resA = $cid->query($sqlA);
          $rowA=$resA->fetch_array();
          $mediaA=round($rowA["mediaA"], 2);
          $nValA=$rowA["nVal"];

          echo'<p class="valutazione-profilo">Valutazione: </p>';
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
        echo'<p class="stelle-valutazione-profilo numero-valutazioni">( '. $mediaA. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i>'. $nValA. ')</p>';
          echo'</div>';
    }elseif(($row["acquirente"]==0) and ($row["venditore"]==1)){
          $sqlV="SELECT AVG((serietaV+puntualitaV)/2) AS mediaV, COUNT(*) AS nVal FROM `annuncio` WHERE venditore = '$email_sessione' AND serietaV is not null AND puntualitaV is not null";
          $resV = $cid->query($sqlV);
          $rowV=$resV->fetch_array();
          $mediaV=round($rowV["mediaV"], 2);
          $nValV=$rowV["nVal"];

          echo'<p class="valutazione-profilo">Valutazione: </p>';
          echo'<div class="stelle-valutazione-profilo">';
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

          echo'<p class="stelle-valutazione-profilo numero-valutazioni">( '. $mediaV. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i>'. $nValV. ')</p>';
          echo'</div>';

    }else{
          $sqlAV="SELECT AVG((serietaA+puntualitaA)/2) AS mediaA, COUNT(*) AS nVal FROM `richiestaacquisto` WHERE acquirenteRA = '$email_sessione' AND serietaA is not null AND puntualitaA is not null";
          $resAV = $cid->query($sqlAV);
          $rowAV=$resAV->fetch_array();
          $mediaAV=round($rowAV["mediaA"], 2);
          $nValAV=$rowAV["nVal"];

          echo'<p class="valutazione-profilo">Valutazione acquirente: </p>';
          echo'<div class="stelle-valutazione-profilo">';
          $iAV=0;
          while($iAV <= 4){
              if($mediaAV > ($iAV + 0.75)){
                  echo '<i class="fa fa-star" aria-hidden="true" ></i>';
              }elseif(($mediaAV < ($iAV + 0.25)) and ($mediaAV > $iAV)) {
                  echo '<i class="fa fa-star" aria-hidden="true" ></i>';
              }elseif(($mediaAV > ($iAV + 0.25)) and ($mediaAV < ($iAV + 0.75))){
                  echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
              }else{
                  echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
              }
              $iAV = $iAV + 1;

          }
        echo'<p class="stelle-valutazione-profilo numero-valutazioni">( '. $mediaAV. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i>'. $nValAV. ')</p>';
          echo'</div>';

          $sqlVA="SELECT AVG((serietaV+puntualitaV)/2) AS mediaV, COUNT(*) AS nVal FROM `annuncio` WHERE venditore = '$email_sessione' AND serietaV is not null AND puntualitaV is not null";
          $resVA = $cid->query($sqlVA);
          $rowVA=$resVA->fetch_array();
          $mediaVA=round($rowVA["mediaV"], 2);
          $nValVA=$rowVA["nVal"];

          echo'<p class="valutazione-profilo">Valutazione venditore: </p>';
          echo'<div class="stelle-valutazione-profilo">';
          $iVA=0;
          while($iVA <= 4){
              if($mediaVA >= ($iVA + 0.75)) {
                  echo '<i class="fa fa-star" aria-hidden="true" ></i>';
              }elseif(($mediaVA < ($iVA + 0.25)) and ($mediaVA > $iVA))  {
                   echo '<i class="fa fa-star" aria-hidden="true" ></i>';
              }elseif(($mediaVA > ($iVA + 0.25)) and ($mediaVA < ($iVA + 0.75))){
                  echo'<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>';
              }else{
                  echo'<i class="fa fa-star-o" aria-hidden="true"  class="stelle-valutazione-profilo"></i>';
              }
              $iVA = $iVA + 1;

          }
          echo'<p class="stelle-valutazione-profilo numero-valutazioni">( '. $mediaVA. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i>'. $nValVA. ')</p>';
          echo'</div>';
    }

  }


}


 ?>

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

function immagine($cid){
    if($_SESSION["logged"]==true){
        $email_sessione=$_SESSION["email"];
        $sql = "SELECT immagine FROM utente WHERE email = '$email_sessione' ";
        $risultato = $cid->query($sql);
        $row=$risultato->fetch_array();

        echo'
            <div class="product-image-wrapper-profilo" >
                <div class="single-products">
                <div class="img-contenitore">
                    <img src="data:image/jpg;base64,'. base64_encode($row["immagine"]) .'" alt="" class="immagine-profilo-resize" />
                </div>
                </div>
            </div>
        ';
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
      $acquirente=$_SESSION["acquirente"];
      $venditore=$_SESSION["venditore"];

      //controllo su acquirente
      if($acquirente==1){
        echo'
            <button type="submit" class="btn btn-profilo pull-left btn-a-v" disabled><i class="fa fa-check" aria-hidden="true"></i>   Acquirente</button>
        ';
      }else{
        echo'
            <button type="submit" class="btn btn-profilo pull-left btn-non-a-v" disabled><i class="fa fa-times" aria-hidden="true"></i>   Acquirente</button>
        ';
      }
      //controllo su venditore
      if($venditore==1){
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
    $acquirente=$_SESSION["acquirente"];
    $venditore=$_SESSION["venditore"];

    if(($acquirente=="1") and ($venditore=="0")){
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
        echo'<p class="stelle-valutazione-profilo numero-valutazioni">('. $mediaA. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i> '. $nValA. ')</p>';   #<i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i>
          echo'</div>';
    }elseif(($acquirente=="0") and ($venditore=="1")){
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
          echo'<p class="stelle-valutazione-profilo numero-valutazioni">('. $mediaV. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i> '. $nValV. ')</p>';
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
        echo'<p class="stelle-valutazione-profilo numero-valutazioni">('. $mediaAV. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i> '. $nValAV. ')</p>';
          echo'</div>
                <br>';

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
          echo'<p class="stelle-valutazione-profilo numero-valutazioni">('. $mediaVA. ' / 5 -- <i class="fa fa-users" aria-hidden="true" class="numero-valutazioni"></i> '. $nValVA. ')</p>';
          echo'</div>';
    }

  }


}

function menulaterale($cid){
    if($_SESSION["logged"]==true) {
        $email_sessione = $_SESSION["email"];
        $acquirente = $_SESSION["acquirente"];
        $venditore = $_SESSION["venditore"];

        if(($acquirente=="1") and ($venditore=="0")){
            $sqlAnnunci="SELECT COUNT(*) AS nAnn FROM annuncio WHERE venditore='$email_sessione'";
            $res=$cid->query($sqlAnnunci);
            $rowA=$res->fetch_array();

            if($rowA["nAnn"]!=0){
                echo'<div class="panel panel-default">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#acquirente">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Acquirente
                                </a></h4>
                            </div>
                        </div>
                        <div id="acquirente" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav sottomenu_profilo" >
                                        <li><a href="#" onclick="opensottomenu(event, \'annunciOsservati\')">Annunci osservati</a></li>
                                        <li><a href="#" onclick="opensottomenu(event, \'listaAcquistati\')">I miei acquisti</a></li>
                                        <li><a href="#" onclick="opensottomenu(event, \'richiesteAcquisto\')">Richieste di acquisto</a></li>
                                </ul>
                            </div>
                        </div>
                         <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#venditore">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Venditore
                                </a>
                            </h4>
                        </div>
                        <div id="venditore" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav sottomenu_profilo">
                                  
                                    <li><a href="#" onclick="opensottomenu(event, \'annunciPubblicati\')">Annunci pubblicati</a></li>
                                    <li><a href="#" onclick="opensottomenu(event, \'mievendite\')" >Le mie vendite</a></li>
                                </ul>
                            </div>
                        </div>
                     </div>
                ';
            }else{
                echo'<div class="panel panel-default">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#acquirente">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Acquirente
                                </a></h4>
                            </div>
                        </div>
                        <div id="acquirente" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav sottomenu_profilo" >
                                        <li><a href="#" onclick="opensottomenu(event, \'annunciOsservati\')">Annunci osservati</a></li>
                                        <li><a href="#" onclick="opensottomenu(event, \'listaAcquistati\')">I miei acquisti</a></li>
                                        <li><a href="#" onclick="opensottomenu(event, \'richiesteAcquisto\')">Richieste di acquisto</a></li>
                                </ul>
                            </div>
                        </div>
                     </div>
                ';
            }
        }elseif(($acquirente=="0") and ($venditore=="1")){
            $sqlAcquisti="SELECT COUNT(*) AS nAcq FROM richiestaacquisto WHERE acquirenteRA = '$email_sessione' AND approvato = 1";
            $resAcq=$cid->query($sqlAcquisti);
            $rowAcq=$resAcq->fetch_array();

            if($rowAcq["nAcq"]!=0){
                echo'
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#venditore">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Venditore
                                </a>
                            </h4>
                        </div>
                        <div id="venditore" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav sottomenu_profilo">
                                    <li><a href="pubblicaAnnuncio.php"><i class="fa fa-plus-square" aria-hidden="true"></i><b>  Nuovo annuncio</b></a></li>
                                    <li><a href="#" onclick="opensottomenu(event, \'annunciPubblicati\')">Annunci pubblicati</a></li>
                                    <li><a href="#" onclick="opensottomenu(event, \'mievendite\')" >Le mie vendite</a></li>
                                    <li><a href="#" onclick="opensottomenu(event, \'risposte\')" >Risposte ai miei annunci</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#acquirente">
                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                    Acquirente
                                </a></h4>
                            </div>
                        </div>
                        <div id="acquirente" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="nav navbar-nav sottomenu_profilo" >                          
                                     <li><a href="#" onclick="opensottomenu(event, \'listaAcquistati\')">I miei acquisti</a></li>  
                                </ul>
                            </div>
                        </div>
                    </div>
                ';
            }else{
                echo'
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#venditore">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                Venditore
                            </a>
                        </h4>
                    </div>
                    <div id="venditore" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul class="nav navbar-nav sottomenu_profilo">
                                <li><a href="pubblicaAnnuncio.php"><i class="fa fa-plus-square" aria-hidden="true"></i><b>  Nuovo annuncio</b></a></li>
                                <li><a href="#" onclick="opensottomenu(event, \'annunciPubblicati\')">Annunci pubblicati</a></li>
                                <li><a href="#" onclick="opensottomenu(event, \'mievendite\')" >Le mie vendite</a></li>
                                <li><a href="#" onclick="opensottomenu(event, \'risposte\')" >Risposte ai miei annunci</a></li>
                            </ul>
                        </div>
                    </div>
                </div>';
            }
        }else{
            echo' <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#venditore">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Venditore
                        </a>
                    </h4>
                </div>
                <div id="venditore" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav sottomenu_profilo">
                            <li><a href="pubblicaAnnuncio.php"><i class="fa fa-plus-square" aria-hidden="true"></i><b>  Nuovo annuncio</b></a></li>
                            <li><a href="#" onclick="opensottomenu(event, \'annunciPubblicati\')">Annunci pubblicati</a></li>
                            <li><a href="#" onclick="opensottomenu(event, \'mievendite\')" >Le mie vendite</a></li>
                            <li><a href="#" onclick="opensottomenu(event, \'risposte\')" >Risposte ai miei annunci</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#acquirente">
                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                            Acquirente
                        </a></h4>
                    </div>
                </div>
                <div id="acquirente" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul class="nav navbar-nav sottomenu_profilo" >
                                <li><a href="#" onclick="opensottomenu(event, \'annunciOsservati\')">Annunci osservati</a></li>
                                <li><a href="#" onclick="opensottomenu(event, \'listaAcquistati\')">I miei acquisti</a></li>
                                <li><a href="#" onclick="opensottomenu(event, \'richiesteAcquisto\')">Richieste di acquisto</a></li>
                        </ul>
                    </div>
                </div>
			  </div>';
        }


    }


}

function annunciOsservatiUtente($cid){
    if($_SESSION["logged"]==true) {
        $email_sessione = $_SESSION["email"];
        $sqlAnnunci = "SELECT a.idAnnuncio, nomeAnnuncio, descrizioneAnnuncio, nomeCategoria, sottoCategoria, nomeP, fotoP, prezzoP, nuovo, periodoUtilizzo, usura, garanzia, periodoCopertura, comune, provincia, regione, venditore FROM osserva AS o JOIN annuncio AS a ON o.idAnnuncio = a.IdAnnuncio JOIN statoa AS s ON a.idAnnuncio = s.idAnnuncio WHERE acquirenteO='$email_sessione' AND s.stato='in vendita'";
        $res = $cid->query($sqlAnnunci);
        while($row = $res->fetch_array()){
            echo'<div class="col-sm-4" >
                 
                     <div class="product-image-wrapper" >
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <div class="img-contenitore">
                                    <img src="data:image/jpg;base64,'. base64_encode($row["fotoP"]) .'" alt="" />
                                </div>
                                <h2>'. $row["prezzoP"] .'€</h2>
                                <p>'. $row["nomeAnnuncio"] .'</p>
                                
    
                            </div>
                            
                            <div  class="product-overlay">
                                <div class="overlay-content">
                                    <a href="dettagliAnnuncio.php?idAnnuncio='. $row["idAnnuncio"] .'"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</button></a>			<!--<i class="fa fa-shopping-cart"></i>   id="myBtn"-->
                                </div>
                            </div>
                        </div>
                        <script>
                        function dettagli() {
                            var e = document.getElementById("idAnnuncio");
                        }
                        </script>
                 
                 <form>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a class="btn btn-default add-to-cart account-click valuta-btn" data-toggle="collapse" data-parent="#accordian" href="#acquista'.$row["idAnnuncio"] .'"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Invia richiesta di acquisto</a></li>
                            <div id="acquista'.$row["idAnnuncio"] .'" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav sottomenu_profilo sottomenu-osservati" >
                                        <div >
                                            <p><b>Metodo di pagamento: </b></p>
                                            <div class="demo-content">
                                                <div class="metodop">
                                                    <ul	class="nav paddingsinistra" >
                                                        <input name="metodop" type="radio" name="carta" value="1" />
                                                        <label for="carta" style="display: inline-block;"><p >Carta di credito</p></label>
                                                        <input name="metodop" type="radio" name="contanti" value="2" />
                                                        <label for="contanti" style="display: inline-block;"><p >Contanti alla consegna</p></label>
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn pull-left btn-profilo" onclick="btnConferma(\'id02\')"><i class="fa fa-check" aria-hidden="true"></i> Conferma</button>
                                            <div id="id02" class="modal">
                                                <form class="modal-content popup-modal-content">
                                                    <div class="container popup-conferma">
                                                        <h4>Metodo di pagamento</h4>
                                                        <p>Stai per confermare il metodo di pagamento.</p>
                                                        <p>Sei sicur* di voler proseguire?</p>

                                                        <div class="clearfix">
                                                            <button type="button" onclick="document.getElementById(\'id02\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
                                                            <button type="button" onclick="document.getElementById(\'id02\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </div>
				</div>
			</form>
		    </div>
			';
        }
    }
}

function acquistiUtente($cid){
    if($_SESSION["logged"]==true) {
        $email_sessione = $_SESSION["email"];
        $sqlAnnunci = "SELECT a.idAnnuncio, nomeAnnuncio, descrizioneAnnuncio, nomeCategoria, sottoCategoria, nomeP, fotoP, prezzoP, nuovo, periodoUtilizzo, usura, garanzia, periodoCopertura, comune, provincia, regione, venditore FROM richiestaacquisto AS r JOIN annuncio AS a ON r.idAnnuncio = a.IdAnnuncio WHERE acquirenteRA='$email_sessione' AND approvato=1";
        $res = $cid->query($sqlAnnunci);
        while($row = $res->fetch_array()){
            echo'
            <div class="col-sm-4" >
                <div class="product-image-wrapper" >
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <div class="img-contenitore">
                                <img src="data:image/jpg;base64,'. base64_encode($row["fotoP"]) .'" alt="" />
                            </div>
                            <h2>'. $row["prezzoP"] .'€</h2>
                            <p>'. $row["nomeAnnuncio"] .'</p>

                        </div>
                        <div  class="product-overlay">
                            <div class="overlay-content">
                                <a href="dettagliAnnuncio.php?idAnnuncio='. $row["idAnnuncio"] .'"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</button></a>			<!--<i class="fa fa-shopping-cart"></i>   id="myBtn"-->
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a class="btn btn-default add-to-cart account-click valuta-btn" data-toggle="collapse" data-parent="#accordian" href="#valuta'. $row["idAnnuncio"] .'"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Valuta venditore</a></li>
                            <div id="valuta'. $row["idAnnuncio"] .'" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul class="nav navbar-nav sottomenu_profilo sottomenu-osservati">
                                        <div>
                                            <p>Valuta la <b >serietà</b> :</p>
                                            <div class="demo-content">
                                                <div class="serieta">
                                                    <input name="serieta" type="radio" id="stellaV1'.$row["idAnnuncio"] .'" value="1" />
                                                    <label for="stellaV1'.$row["idAnnuncio"] .'"></label>

                                                    <input name="serieta" type="radio" id="stellaV2'.$row["idAnnuncio"] .'" value="2" />
                                                    <label for="stellaV2'.$row["idAnnuncio"] .'"></label>

                                                    <input name="serieta" type="radio" id="stellaV3'.$row["idAnnuncio"] .'" value="3" />
                                                    <label for="stellaV3'.$row["idAnnuncio"] .'"></label>

                                                    <input name="serieta" type="radio" id="stellaV4'.$row["idAnnuncio"] .'" value="4" />
                                                    <label for="stellaV4'.$row["idAnnuncio"] .'"></label>

                                                    <input name="serieta" type="radio" id="stellaV5'.$row["idAnnuncio"] .'" value="5" checked />
                                                    <label for="stellaV5'.$row["idAnnuncio"] .'"></label>

                                                </div>
                                            </div>
                                            <p>Valuta la <b >puntualità</b> :</p>
                                            <div class="demo-content">
                                                <div class="puntualita">
                                                    <input name="puntualita" type="radio" id="stellaV6'.$row["idAnnuncio"] .'" value="1" />
                                                    <label for="stellaV6'.$row["idAnnuncio"] .'"></label>

                                                    <input name="puntualita" type="radio" id="stellaV7'.$row["idAnnuncio"] .'" value="2" />
                                                    <label for="stellaV7'.$row["idAnnuncio"] .'"></label>

                                                    <input name="puntualita" type="radio" id="stellaV8'.$row["idAnnuncio"] .'" value="3" />
                                                    <label for="stellaV8'.$row["idAnnuncio"] .'"></label>

                                                    <input name="puntualita" type="radio" id="stellaV9'.$row["idAnnuncio"] .'" value="4" />
                                                    <label for="stellaV9'.$row["idAnnuncio"] .'"></label>

                                                    <input name="puntualita" type="radio" id="stellaV10'.$row["idAnnuncio"] .'" value="5" checked />
                                                    <label for="stellaV10'.$row["idAnnuncio"] .'"></label>

                                                </div>
                                                <button type="submit" class="btn pull-left btn-profilo" onclick="btnConferma(\'id04\')"><i class="fa fa-check" aria-hidden="true"></i> Conferma</button>
                                                    <div id="id04" class="modal">
                                                        <form class="modal-content popup-modal-content">
                                                            <div class="container popup-conferma">
                                                                <h4>Valutazione</h4>
                                                                <p>Stai per confermare la valutazione.</p>
                                                                <p>Sei sicur* di voler proseguire?</p>

                                                                <div class="clearfix">
                                                                    <button type="button" onclick="document.getElementById(\'id04\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
                                                                    <button type="button" onclick="document.getElementById(\'id04\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
			</div>';
        }
    }
}

function richiesteAcquistoUtente($cid){
    if ($_SESSION["logged"] == true) {
        $email_sessione = $_SESSION["email"];
        $sqlAnnunci = "SELECT r.idAnnuncio, metodoPagamento, approvato, a.nomeAnnuncio, a.prezzoP, a.fotoP, a.venditore FROM richiestaacquisto AS r JOIN annuncio AS a ON r.idAnnuncio = a.idAnnuncio WHERE acquirenteRA = '$email_sessione' ";
        $res = $cid->query($sqlAnnunci);

        while($row = $res->fetch_array()){
            echo '
            <tr>
                <td class="cart_product">
                    <a href=""><img src="data:image/jpg;base64,'. base64_encode($row["fotoP"]) .'" alt="" class="imm-richieste"/></a> 
                </td>
                <td class="cart_description blu">
                    <h4><a>' . $row["nomeAnnuncio"] . '</a></h4>
        
                    <p class="richieste-responsive"><b>ID annuncio:</b></p><p style="display: inline-block">' . $row["idAnnuncio"] . '</p>
                </td>
                <td class="cart_price blu">
                    <p class="richieste-responsive"><b>Venditore:</b></p><p style="display: inline-block; ">' . $row["venditore"] . '</p>
                </td>
                <td class="cart_price blu">
                    <p class="richieste-responsive"><b>Prezzo:</b></p><p style="display: inline-block;">' . $row["prezzoP"] . '€</p>
                </td>';
                if ($row["approvato"]==null) {
                    echo '  
                                <td class="cart_total blu">
                                    <p class="richieste-responsive"><b>Stato:</b></p><p class="cart_total_price blu" style="display: inline-block; ">In elaborazione</p>
                                </td>';
                } elseif ($row["approvato"] == 1) {
                    echo '  
                                <td class="cart_total blu">
                                    <p class="richieste-responsive"><b>Stato:</b></p><p class="cart_total_price blu" style="display: inline-block; ">Approvato</p>
                                </td>';
                } else {
                    echo '  
                                <td class="cart_total blu">
                                    <p class="richieste-responsive"><b>Stato:</b></p><p class="cart_total_price blu" style="display: inline-block; ">Respinto</p>
                                </td>';
                }
                echo '</tr>';
        }
    }
}


function leMieVendite($cid){
    if($_SESSION["logged"]==true) {
        $email_sessione = $_SESSION["email"];
        $sqlAnnunci = "SELECT * FROM annuncio AS a JOIN richiestaacquisto AS r ON a.idAnnuncio=r.idAnnuncio WHERE venditore='$email_sessione' AND approvato=1";
        $res = $cid->query($sqlAnnunci);
        while($row = $res->fetch_array()){
            echo'
                <div class="col-sm-4" >
							<div class="product-image-wrapper" >
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="data:image/jpg;base64,'. base64_encode($row["fotoP"]) .'" alt="" />
										</div>
										<h2>' . $row["prezzoP"] . ' €</h2>
										<p>' . $row["nomeAnnuncio"] . '</p>

									</div>
									<div  class="product-overlay">
										<div class="overlay-content">
											<a href="dettagliAnnuncio.php?idAnnuncio='. $row["idAnnuncio"] .'"><button type="button" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</button></a>			<!--<i class="fa fa-shopping-cart"></i>   id="myBtn"-->
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a class="btn btn-default add-to-cart account-click valuta-btn" data-toggle="collapse" data-parent="#accordian" href="#valutaA' . $row["idAnnuncio"] . '"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Valuta acquirente</a></li>
										<div id="valutaA' . $row["idAnnuncio"] . '" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav sottomenu_profilo sottomenu-vendite" >
													<div>
														<p>Valuta la <b >serietà</b> :</p>
														<div class="demo-content">
															<div class="serieta">
																<input name="serieta' . $row["idAnnuncio"] . '" type="radio" id="stellaA1' . $row["idAnnuncio"] . '" value="1" />
																<label for="stellaA1' . $row["idAnnuncio"] . '"></label>

																<input name="serieta" type="radio" id="stellaA2' . $row["idAnnuncio"] . '" value="2" />
																<label for="stellaA2' . $row["idAnnuncio"] . '"></label>

																<input name="serieta" type="radio" id="stellaA3' . $row["idAnnuncio"] . '" value="3" />
																<label for="stellaA3' . $row["idAnnuncio"] . '"></label>

																<input name="serieta" type="radio" id="stellaA4' . $row["idAnnuncio"] . '" value="4" />
																<label for="stellaA4' . $row["idAnnuncio"] . '"></label>

																<input name="serieta" type="radio" id="stellaA5' . $row["idAnnuncio"] . '" value="5" checked />
																<label for="stellaA5' . $row["idAnnuncio"] . '"></label>
															</div>
														</div>
														<p>Valuta la <b >puntualità</b> :</p>
														<div class="demo-content">
															<div class="puntualita">
																<input name="puntualita" type="radio" id="stellaA6' . $row["idAnnuncio"] . '" value="1" />
																<label for="stellaA6' . $row["idAnnuncio"] . '"></label>

																<input name="puntualita" type="radio" id="stellaA7' . $row["idAnnuncio"] . '" value="2" />
																<label for="stellaA7' . $row["idAnnuncio"] . '"></label>

																<input name="puntualita" type="radio" id="stellaA8' . $row["idAnnuncio"] . '" value="3" />
																<label for="stellaA8' . $row["idAnnuncio"] . '"></label>

																<input name="puntualita" type="radio" id="stellaA9' . $row["idAnnuncio"] . '" value="4" />
																<label for="stellaA9' . $row["idAnnuncio"] . '"></label>

																<input name="puntualita" type="radio" id="stellaA10' . $row["idAnnuncio"] . '" value="5" checked />
																<label for="stellaA10' . $row["idAnnuncio"] . '"></label>
														</div>
														<button type="submit" class="btn pull-left btn-profilo" onclick="btnConferma(\'id01\')"><i class="fa fa-check" aria-hidden="true"></i> Conferma</button>
														<div id="id01" class="modal">
															<form class="modal-content popup-modal-content">
																<div class="container popup-conferma">
																	<h4>Valutazione</h4>
																	<p>Stai per confermare la valutazione.</p>
																	<p>Sei sicur* di voler proseguire?</p>

																	<div class="clearfix">
																		<button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
																		<button type="button" onclick="document.getElementById(\'id01\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</ul>
											</div>
										</div>
									</ul>
								</div>
							</div>
						</div>
            ';
        }
    }

}

function annunciPubblicati($cid){
    if ($_SESSION["logged"] == true) {
        $email_sessione = $_SESSION["email"];
        $sqlAnnunci = "SELECT * FROM annuncio WHERE venditore='$email_sessione'";
        $res = $cid->query($sqlAnnunci);
        while ($row = $res->fetch_array()) {
            echo'
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <div class="img-contenitore">
                                    <img src="data:image/jpg;base64,'. base64_encode($row["fotoP"]) .'" alt="" />
                                </div>
                                <h2>' . $row["prezzoP"] . ' €</h2>
                                <p>' . $row["nomeAnnuncio"] . '</p>

                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified blu">
                                <li><a href="modificaAnnuncio.php"><i class="fa fa-pencil" aria-hidden="true"></i> Modifica</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            ';

        }
    }

}

function risposteAnnunci($cid){
    if ($_SESSION["logged"] == true) {
        $email_sessione = $_SESSION["email"];
        $sqlAnnunci = "SELECT * FROM annuncio WHERE venditore='$email_sessione'";
        $res = $cid->query($sqlAnnunci);
        while ($row = $res->fetch_array()) {
            echo'
            <div class="col-sm-12">
                <div class="product-image-wrapper" >
                    <div class="single-products">
                        <table>
                            <tr>
                                <th><img src="data:image/jpg;base64,'. base64_encode($row["fotoP"]) .'" alt="" style="width: 130px; margin: 10px;" /></th>
                                <th>
                                    <p class="cart_description blu">' . $row["nomeAnnuncio"] . '</p>
                                    <p>ID: ' . $row["idAnnuncio"] . '</p>
                                </th>
                            </tr>
                        </table>
                    </div>
                                           
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#annuncio1' . $row["idAnnuncio"] . '"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>Hai 3 richieste d\'acquisto</a></li>
                            <div id="annuncio1' . $row["idAnnuncio"] . '" class="panel-collapse collapse">
                                <div class="panel-body ">
                                    <table class="table-risposte">
                                        <thead>
                                            <tr class="cart_menu cart-color-richieste" >
                                                <td class="image" >Acquirente</td>
                                                <td class="description"></td>
                                                <td class="price">Metodo di pagamento</td>
                                                <td class="total">Stato</td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        
                                        
                                        
                                        <tbody classe="table-risposte">';
                                            $idAnnunio=$row["idAnnuncio"];
                                            $sqlutenti = "SELECT email, immagine, nome, cognome, metodoPagamento, approvato FROM richiestaacquisto JOIN utente ON acquirenteRA=email WHERE idAnnuncio='$idAnnunio'";
                                            $utenti = $cid->query($sqlutenti);
                                            while ($u = $utenti->fetch_array()) {
                                            echo'
                                            <tr >
                                                <td class="cart_product">
                                                    <a href=""><img src="data:image/jpg;base64,'. base64_encode($u["immagine"]) .'"  alt="" class="imm-richieste" ></a>
                                                </td>
                                                <td class="cart_description">
                                                    <h4><a href="">' . $u["nome"] . ' ' . $u["cognome"] . '</a></h4>
                                                    <p class="richieste-responsive"><b>Email: </b></p><p style="display: inline-block;">' . $u["email"] . '</p>
                                                </td>
                                                <td class="cart_price">
                                                    <p class="richieste-responsive"><b>Metodo di pagamento: </b></p><p style="display: inline-block;">' . $u["metodoPagamento"] . '</p>
                                                </td>
                                                ';
                                                if($u["approvato"]==null){
                                                    echo'
                                                    <td class="cart_total">
                                                        <p class="richieste-responsive"><b>Stato: </b></p><p class="cart_total_price" style="display: inline-block;">In elaborazione</p>
                                                    </td>';
                                                } elseif($u["approvato"]==0){
                                                echo'
                                                    <td class="cart_total">
                                                        <p class="richieste-responsive"><b>Stato: </b></p><p class="cart_total_price" style="display: inline-block;">Rifiutato</p>
                                                    </td>';
                                                }else{
                                                echo'
                                                    <td class="cart_total">
                                                        <p class="richieste-responsive"><b>Stato: </b></p><p class="cart_total_price" style="display: inline-block;">Accettato</p>
                                                    </td>';
                                                }

                                                echo'
                                                <td class="cart_delete approvato">
                                                    <a class="cart_quantity_delete" onclick="btnConferma(\'thumb1a\')"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                                                    <div id="thumb1a" class="modal">
                                                        <form class="modal-content popup-modal-content">
                                                            <div class="container popup-conferma">
                                                                <h4>Risposte ai miei annunci</h4>
                                                                <p>Stai per CONFERMARE la richiesta d\'acquisto.</p>
                                                                <p>Sei sicur* di voler proseguire?</p>

                                                                <div class="clearfix">
                                                                    <button type="button" onclick="document.getElementById(\'thumb1a\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
                                                                    <button type="button" onclick="document.getElementById(\'thumb1a\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <a class="cart_quantity_delete" onclick="btnConferma(\'thumb1b\')"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i></a>
                                                    <div id="thumb1b" class="modal">
                                                        <form class="modal-content popup-modal-content">
                                                            <div class="container popup-conferma">
                                                                <h4>Risposte ai miei annunci</h4>
                                                                <p>Stai per RIFIUTARE la richiesta d\'acquisto.</p>
                                                                <p>Sei sicur* di voler proseguire?</p>

                                                                <div class="clearfix">
                                                                    <button type="button" onclick="document.getElementById(\'thumb1b\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
                                                                    <button type="button" onclick="document.getElementById(\'thumb1b\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>';
                                            }
                                            echo'
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </ul>
                    </div>
                    
                </div>
           </div>';

       }
    }
}


function modificaProfilo($cid){
    if($_SESSION["logged"]==true) {
        $email_sessione = $_SESSION["email"];
        $sql = "SELECT email,nome,cognome,codFiscale,immagine,via,nCivico,CAP,comune,provincia,regione,acquirente,venditore FROM utente WHERE email = '$email_sessione' ";
        $risultato = $cid->query($sql);

        //variabili contenenti i risultati della query
        $row = $risultato->fetch_array();
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
        $immagine = $row["immagine"];
        $venditore=$row["venditore"];
        $acquirente=$row["acquirente"];

        echo '<div class="features_items" >
                <h2 class="title text-center"><span class="title-span">Modifica profilo</span></h2>
                </div>
                <form method="POST" action="backend/modificaAccount-exe.php">
                <p  class="btn-modificaprofilo" >Modifica i tuoi dati</p>
                <div class="col-sm-4">
                    <div class="container_imm" style="max-width: none;">
                        
                        <img src="data:image/jpg;base64,'. base64_encode($immagine) .'" class="image_p immagine-profilo-resize" >
                        <input type="file" id="file" style="display:none;" />
                        <button class="btn-container_imm" id="button" name="button" value="Upload" onclick="thisFileUpload();"><i class="fa fa-pencil" aria-hidden="true"></i> Modifica immagine</button>
                    </div>
                    <div class="modifica-ruolo">
                            <p>Modifica il tuo ruolo: </p>
                            <span>';
                                if($venditore==1){
                                    echo'
                                        <input type="checkbox" id="venditore" name="venditore" value="True"  onclick="return ValidateAcquirenteVenditore();" checked >
                                        <label for="venditore" class="color-v-a"> Venditore </label><br>';
                                }else{
                                    echo'
                                        <input type="checkbox" id="venditore" name="venditore" value="True" onclick="return ValidateAcquirenteVenditore();">
                                        <label for="venditore" class="color-v-a"> Venditore </label><br>';
                                }

                                if($acquirente==1){
                                    echo'
                                        <input type="checkbox" id="acquirente" name="acquirente" value="True"  onclick="return ValidateAcquirenteVenditore();" checked>
                                        <label for="acquirente" class="color-v-a"> Acquirente </label><br>';
                                }else{
                                    echo'
                                        <input type="checkbox" id="acquirente" name="acquirente" value="True"  onclick="return ValidateAcquirenteVenditore();" >
                                        <label for="acquirente" class="color-v-a"> Acquirente </label><br>';
                                }
                                echo'
                            </span>
                            <script type="text/javascript">  
                            function ValidateAcquirenteVenditore() {  
                                var checkacquirente = document.getElementsByName("acquirente");  
                                var checkvenditore = document.getElementsByName("venditore"); 
            
                                if((checkacquirente.checked) and (checkvenditore.checked)){
                                        alert("You can\'t select more than two favorite pets!");  
                                }  
                            }
                            </script>
                    </div>
                    <p style=" color: #2b5164; font-size: 16px;">Modifica password: </p>
                    <div><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input type="password" name="password"  placeholder="Password attuale" rows="1"  class="modifica-password"></input ></div>
                    <div><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input type="password" name="npassword"  placeholder="Nuova password" rows="1"  class="modifica-password"></input ></div>
                    <div><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input type="password" name="confnpassword"  placeholder="Conferma password" rows="1"  class="modifica-password"></input ></div>
                </div>
                <div class="col-sm-8" >
                    <textarea name="text"  placeholder="E-mail: " rows="1" disabled class="profilo-name"></textarea ><input type="email" name="text"  placeholder="' . $email . '" rows="1"  class="profilo-data" maxlength="50" disabled>
                    <textarea name="text"  placeholder="Nome: " rows="1" disabled class="profilo-name"></textarea ><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input name="nome"  id="nome" placeholder="' . $nome . '" rows="1"  class="profilo-data" maxlength="20">
                    <textarea name="text"  placeholder="Cognome: " rows="1" disabled class="profilo-name"></textarea ><i class="fa fa-pencil marginematita" aria-hidden="true" style="margin-right: 10px;"></i><input name="cognome"  placeholder="' . $cognome . '" rows="1"  class="profilo-data" maxlength="20">
    
                    <textarea name="text"  placeholder="FC: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input name="codFiscale"  placeholder="' . $codFiscale . '" rows="1"  class="profilo-data" >
                    ';

                    if (isset($_GET["erroreCF"])){
                        if ($_GET["erroreCF"] == true) {

                            echo '<p class="error-message">Il codice fiscale deve avere 16 caratteri</p>';
                        }
                    }

                    echo'
                    <textarea name="text"  placeholder="Via: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input name="via"  placeholder="' . $via . '" rows="1"  class="profilo-data" maxlength="50">
                    <textarea name="text"  placeholder="N° civico: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input name="nCivico"  placeholder="' . $nCivico . '" rows="1" class="profilo-data">
                    <textarea name="text"  placeholder="CAP: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><input name="CAP"  placeholder="' . $CAP . '" rows="1"  class="profilo-data" maxlength="50">
                   
                    <textarea name="text"  placeholder="Regione:" rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i>
                    <select id="reg" name="regione" class="profilo-data">
                        <option >'. $regione .'</option>
                    </select>
                    <br>
                   
                    <textarea name="text"  placeholder="Provincia:" rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i>
                    <select id="prov" name="provincia" class="profilo-data">
                      <option >' . $provincia . '</option>
                      
                    </select>
                    <br>
                    
                    <textarea name="text"  placeholder="Comune:" rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i>
                    <select id="com" name="comune" class="profilo-data">
                      <option >' . $comune . '</option>
                    </select>
                    <script src="js/areaGeografica.js"></script>
                    
                    <button type="button"  onclick="btnConferma(\'modifica\')" class="btn btn-profilo pull-right btn-salvamodifiche" ><i class="fa fa-check" aria-hidden="true"></i>  Salva le modifiche</button>
                    <div id="modifica" class="modal">
                        <div class="modal-content popup-modal-content">
                            <div class="container popup-conferma">
                                <h4>Modifica profilo</h4>
                                <p>Stai per modificare il tuo profilo.</p>
                                <p>Sei sicur* di voler proseguire?</p>
                                <div class="clearfix">
                                    <button type="submit" name="conferma" class="popup-btn deletebtn">Conferma</button>
                                    <button type="submit" name="annulla" class="popup-btn cancelbtn">Annulla</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <button type="submit"  onclick="btnConferma(\'elimina\')" class="btn btn-profilo pull-right btn-eliminautente" ><i class="fa fa-trash-o" aria-hidden="true"></i> Elimina utente</button>
                    <div id="elimina" class="modal">
                        <div class="modal-content popup-modal-content">
                            <div class="container popup-conferma">
                                <h4>Elimina profilo</h4>
                                <p>Stai per eliminare il tuo profilo.</p>
                                <p>Sei sicur* di voler proseguire?</p>
                                <div class="clearfix">
                                    <button type="button" onclick="document.getElementById(\'elimina\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
                                    <button type="button" onclick="document.getElementById(\'elimina\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
}


?>

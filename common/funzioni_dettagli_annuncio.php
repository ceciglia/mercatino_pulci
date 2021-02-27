<?php

function richiestaacquistobtn($cid, $idAnnuncio, $statoA){
    if($statoA=="venduto"){
        echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v btn-dettagliAnnuncio" disabled><a class="osserva-btn"><i class="fa fa-times" aria-hidden="true"></i> Prodotto già venduto</a></button>';
    }else {
        if (isset($_SESSION["logged"]) and ($_SESSION["logged"] == true)) {
            if (($_SESSION["acquirente"] == 1) and ($_SESSION["venditore"] == 0)) {
                $email = $_SESSION["email"];
                $sql = "SELECT acquirenteRA, idAnnuncio FROM richiestaacquisto WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA='$email'";
                $res = $cid->query($sql);
                $row = $res->fetch_array();
                if (empty($row)) {
                    echo '<form method="POST" action="backend/richiestaacquisto-exe.php?idAnnuncio='. $idAnnuncio .'"> 
                    <button type="button" class="btn btn-profilo pull-left btn-a-v btn-dettagliAnnuncio" onclick="btnConferma(\'richiesta\')" ><a class="osserva-btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Acquista il prodotto</a></button>
                    
                    <div id="richiesta" class="modal">
                        <div class="modal-content popup-modal-content">
                            <div class="container popup-conferma">
                                <h4>Richiesta d\'acquisto</h4>
                                <p>Stai per inviare una richiesta d\'acquisto per questo articolo.</p> 
                                <p><b>Metodo di pagamento: </b></p>
                                <div class="demo-content">
                                    <div class="metodop">
                                        <ul	class="nav paddingsinistra">
                                            <input name="metodop" type="radio" id="carta'.$idAnnuncio .'" value="carta" onclick="myRichiesta(\'carta'.$idAnnuncio .'\', \'confRich'.$idAnnuncio .'\')"/>
                                            <label for="carta'.$idAnnuncio .'" style="display: inline-block;"><p >Carta di credito</p></label>
                                            <input name="metodop" type="radio"  id="contanti'.$idAnnuncio .'" value="contanti" onclick="myRichiesta(\'contanti'.$idAnnuncio .'\', \'confRich'.$idAnnuncio .'\')"/>
                                            <label for="contanti'.$idAnnuncio .'" style="display: inline-block;"><p >Contanti alla consegna</p></label>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix-dettagli">
                                    <button type="submit"  id="confRich'.$idAnnuncio .'" class="popup-btn deletebtn" disabled >Conferma</button>
                                    <button type="button" onclick="document.getElementById(\'richiesta\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>	';
                } else {
                    echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v btn-dettagliAnnuncio" disabled><a class="osserva-btn"><i class="fa fa-check" aria-hidden="true"></i> Richiesta d\'acquisto effettuata</a></button>';
                }
            } elseif (($_SESSION["acquirente"] == 1) and ($_SESSION["venditore"] == 1)) {
                $email = $_SESSION["email"];
                $sqla = "SELECT acquirenteRA, idAnnuncio FROM richiestaacquisto WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA='$email'";
                $resa = $cid->query($sqla);
                $rowa = $resa->fetch_array();
                $sqlv = "SELECT venditore, idAnnuncio FROM annuncio WHERE idAnnuncio='$idAnnuncio' AND venditore='$email'";
                $resv = $cid->query($sqlv);
                $rowv = $resv->fetch_array();
                if ((empty($rowa)) and (empty($rowv))) {
                    echo '<form method="POST" action="backend/richiestaacquisto-exe.php?idAnnuncio='. $idAnnuncio .'">
                    <button type="button" class="btn btn-profilo pull-left btn-a-v btn-dettagliAnnuncio" onclick="btnConferma(\'richiesta\')" ><a class="osserva-btn"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Acquista il prodotto</a></button>
                    
                    <div id="richiesta" class="modal">
                        <div class="modal-content popup-modal-content">
                            <div class="container popup-conferma">
                                <h4>Richiesta d\'acquisto</h4>
                                <p>Stai per inviare una richiesta d\'acquisto per questo articolo.</p> 
                                <p><b>Metodo di pagamento: </b></p>
                                <div class="demo-content">
                                    <div class="metodop">
                                        <ul	class="nav paddingsinistra">
                                            <input name="metodop" type="radio" id="carta'.$idAnnuncio .'" value="carta" onclick="myRichiesta(\'carta'.$idAnnuncio .'\', \'confRich'.$idAnnuncio .'\')"/>
                                            <label for="carta'.$idAnnuncio .'" style="display: inline-block;"><p >Carta di credito</p></label>
                                            <input name="metodop" type="radio"  id="contanti'.$idAnnuncio.'" value="contanti" onclick="myRichiesta(\'contanti'.$idAnnuncio .'\', \'confRich'.$idAnnuncio .'\')"/>
                                            <label for="contanti'.$idAnnuncio .'" style="display: inline-block;"><p >Contanti alla consegna</p></label>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix-dettagli">
                                    <button type="submit" id="confRich'.$idAnnuncio .'" class="popup-btn deletebtn" disabled>Conferma</button>
                                    <button type="button" onclick="document.getElementById(\'richiesta\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>';
                } elseif ((!empty($rowa)) and (empty($rowv))) {
                    echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v btn-dettagliAnnuncio" disabled><a class="osserva-btn"><i class="fa fa-check" aria-hidden="true"></i> Richiesta effettuata</a></button>';
                }
            }


        } else {
            echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v btn-dettagliAnnuncio" disabled><a class="osserva-btn"><i class="fa fa-ban" aria-hidden="true"></i> Accedi o registrati</a></button>';
        }
    }

}


function osservaannunciobtn($cid, $idAnnuncio){
    if (isset($_SESSION["logged"])) {
        if (isset($_SESSION["acquirente"]) and $_SESSION["acquirente"] == 1) {
            $acquirente = $_SESSION["email"];
            $sql = "SELECT acquirenteO, idAnnuncio FROM osserva WHERE idAnnuncio='$idAnnuncio' AND acquirenteO='$acquirente'";
            $res = $cid->query($sql);
            $row = $res->fetch_assoc();

            $sqlv = "SELECT venditore, idAnnuncio FROM annuncio WHERE idAnnuncio='$idAnnuncio' AND venditore='$acquirente'";
            $resv = $cid->query($sqlv);
            $rowv = $resv->fetch_assoc();

            if (empty($row)) {
                if(empty($rowv)){
                    echo '
                <button type="submit" class="btn btn-profilo pull-right btn-a-v btn-dettagliAnnuncio"><a id="cuore'. $idAnnuncio .'" href="#0" onclick="aggiungiOsservati('. $idAnnuncio .'); fullHeart(\'cuore'. $idAnnuncio .'\')" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i>  Osserva </a></button>';
                }
            } else {
                echo '<button type="submit" class="btn btn-profilo pull-right btn-a-v btn-dettagliAnnuncio" disabled><a class="osserva-btn"><i class="fa fa-heart" aria-hidden="true"></i>  Osservato </a></button>';
            }
        }
    } else {
        echo '<button type="submit" class="btn btn-profilo pull-right btn-a-v btn-dettagliAnnuncio"><a id="cuore'. $idAnnuncio .'" href="#0" onclick="fullHeart(\'cuore'. $idAnnuncio .'\')" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i>  Osserva </a></button>';
    }

}



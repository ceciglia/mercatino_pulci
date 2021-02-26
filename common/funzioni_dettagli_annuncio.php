<?php

function richiestaacquistobtn($cid, $idAnnuncio, $statoA){
    if($statoA=="venduto"){
        echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v" disabled><i class="fa fa-times" aria-hidden="true"></i> Prodotto già venduto</button>';
    }else {
        if (isset($_SESSION["logged"]) and ($_SESSION["logged"] == true)) {
            if (($_SESSION["acquirente"] == 1) and ($_SESSION["venditore"] == 0)) {
                $email = $_SESSION["email"];
                $sql = "SELECT acquirenteRA, idAnnuncio FROM richiestaacquisto WHERE idAnnuncio='$idAnnuncio' AND acquirenteRA='$email'";
                $res = $cid->query($sql);
                $row = $res->fetch_array();
                if (empty($row)) {
                    echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v" onclick="btnConferma(\'richiesta\')" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Acquista il prodotto</button>
                    <div id="richiesta" class="modal">
                        <div class="modal-content popup-modal-content">
                            <div class="container popup-conferma">
                                <h4>Richiesta d\'acquisto</h4>
                                <p>Stai per inviare una richiesta d\'acquisto per questo articolo.</p> 
                                <p><b>Metodo di pagamento: </b></p>
                                <div class="demo-content">
                                    <div class="metodop">
                                        <ul	class="nav paddingsinistra">
                                            <input name="metodop" type="radio" id="carta" value="1" />
                                            <label for="carta" style="display: inline-block;"><p >Carta di credito</p></label>
                                            <input name="metodop" type="radio"  id="contanti" value="2" />
                                            <label for="contanti" style="display: inline-block;"><p >Contanti alla consegna</p></label>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix-dettagli">
                                    <button type="button" onclick="document.getElementById(\'richiesta\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
                                    <button type="button" onclick="document.getElementById(\'richiesta\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                </div>
                            </div>
                        </div>
                    </div>	';
                } else {
                    echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v" disabled><i class="fa fa-check" aria-hidden="true"></i> Richiesta d\'acquisto effettuata</button>';
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
                    echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v" onclick="btnConferma(\'richiesta\')" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Acquista il prodotto</button>
                    <div id="richiesta" class="modal">
                        <div class="modal-content popup-modal-content">
                            <div class="container popup-conferma">
                                <h4>Richiesta d\'acquisto</h4>
                                <p>Stai per inviare una richiesta d\'acquisto per questo articolo.</p> 
                                <p><b>Metodo di pagamento: </b></p>
                                <div class="demo-content">
                                    <div class="metodop">
                                        <ul	class="nav paddingsinistra">
                                            <input name="metodop" type="radio" id="carta" value="1" />
                                            <label for="carta" style="display: inline-block;"><p >Carta di credito</p></label>
                                            
                                            <input name="metodop" type="radio"  id="contanti" value="2" />
                                            <label for="contanti" style="display: inline-block;"><p >Contanti alla consegna</p></label>
                                        </ul>
                                    </div>
                                </div>
                                <div class="clearfix-dettagli">
                                    <button type="button" onclick="document.getElementById(\'richiesta\').style.display=\'none\'" class="popup-btn deletebtn">Conferma</button>
                                    <button type="button" onclick="document.getElementById(\'richiesta\').style.display=\'none\'" class="popup-btn cancelbtn">Annulla</button>
                                </div>
                            </div>
                        </div>
                    </div>	';
                } elseif ((!empty($rowa)) and (empty($rowv))) {
                    echo '<button type="submit" class="btn btn-profilo pull-left btn-a-v" disabled><i class="fa fa-check" aria-hidden="true"></i> Richiesta d\'acquisto effettuata</button>';
                }
            }


        } else {
            echo '<a href="index.php"><button type="submit" class="btn btn-profilo pull-left btn-a-v" > Accedi o registrati per acquistare</button></a>';
        }
    }

}

//function osservaannunciobtn($cid, $idAnnuncio){
//    if (isset($_SESSION["logged"]) and ($_SESSION["logged"] == true)) {
//        if (($_SESSION["acquirente"] == 1) and ($_SESSION["venditore"]) == 0){
//            $email = $_SESSION["email"];
//            $sql = "SELECT acquirenteO, idAnnuncio FROM osserva WHERE idAnnuncio='$idAnnuncio' AND acquirenteO='$email'";
//            $res = $cid->query($sql);
//            $row = $res->fetch_array();
//            if(empty($row)) {
//                echo '<a href="#0" onclick="aggiungiOsservati(\'. $idAnnuncio .\'); fullHeart(\'cuore'. $idAnnuncio .'\')" class="osserva-btn"><button type="submit" class="btn btn-profilo pull-right btn-a-v"><i class="fa fa-heart-o" aria-hidden="true"></i>  Osserva </button></a>';
//            }else {
//                echo '<a><button type="submit" class="btn btn-profilo pull-right btn-a-v" disabled><i class="fa fa-heart" aria-hidden="true"></i>  Osservato </button></a>';
//            }
//        }if (($_SESSION["acquirente"] == 1) and ($_SESSION["venditore"]) == 1){
//            $email = $_SESSION["email"];
//            $sqlo = "SELECT acquirenteO, idAnnuncio FROM osserva WHERE idAnnuncio='$idAnnuncio' AND acquirenteO='$email'";
//            $reso = $cid->query($sqlo);
//            $rowo = $reso->fetch_array();
//            $sqlv = "SELECT venditore, idAnnuncio FROM annuncio WHERE idAnnuncio='$idAnnuncio' AND venditore='$email'";
//            $resv = $cid->query($sqlv);
//            $rowv = $resv->fetch_array();
//            if((empty($rowo)) and (empty($rowv))){
//                echo '<a href="#0" onclick="aggiungiOsservati(\'. $idAnnuncio .\'); fullHeart(\'cuore'. $idAnnuncio .'\')" class="osserva-btn"><button type="submit" class="btn btn-profilo pull-right btn-a-v"><i class="fa fa-heart-o" aria-hidden="true"></i>  Osserva </button></a>';
//            }elseif((!empty($rowo)) and (empty($rowv))){
//                echo '<a ><button type="submit" class="btn btn-profilo pull-right btn-a-v" disabled><i class="fa fa-heart" aria-hidden="true"></i>  Osservato </button></a>';
//
//            }
//        }
//    }
//
//}

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
                    echo '<button type="submit" class="btn btn-profilo pull-right btn-a-v"><a id="cuore'. $idAnnuncio .'" href="#0" onclick="aggiungiOsservati(2,'. $idAnnuncio .'); fullHeart(\'cuore'. $idAnnuncio .'\')" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i>  Osserva </a></button>';
                } else {
                    echo '<button type="hidden" class="btn btn-profilo pull-right btn-a-v"><a href="#0" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i>  Osserva </a></button>';
                }
            } else {
                echo '<button type="submit" class="btn btn-profilo pull-right btn-a-v" disabled><a><i class="fa fa-heart" aria-hidden="true"></i>  Osservato </a></button>';
            }
        }
    } else {
        echo '<button type="submit" class="btn btn-profilo pull-right btn-a-v"><a id="cuore'. $idAnnuncio .'" href="#0" onclick="fullHeart(\'cuore'. $idAnnuncio .'\')" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i>  Osserva </a></button>';
    }

}



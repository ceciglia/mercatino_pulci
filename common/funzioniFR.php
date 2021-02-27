<?php

function isUser($cid,$email,$psw) {
	$risultato= array("msg"=>"","status"=>"ok", "venditore"=>"", "acquirente"=>"");

   	$sql = "SELECT * FROM utente WHERE email='$email' and psw='$psw'";
   	$res = $cid->query($sql);

	if ($res==null){
		$msg = "Si sono verificati i seguenti errori:<br/>"
		. $res->error;
		$risultato["status"]="ko";
		$risultato["msg"]=$msg;
	}elseif($res->num_rows==0 || $res->num_rows>1) {
		$msg = "email o password sbagliate";
		$risultato["status"]="ko";
		$risultato["msg"]=$msg;
		$risultato["email"]=$email;
	}elseif($res->num_rows==1) {
		$msg = "Login effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;

		$row=$res->fetch_assoc();
        $risultato["venditore"] = $row["venditore"];
        $risultato["acquirente"] = $row["acquirente"];
        if ($risultato["acquirente"]==1){
            $risultato["regione"] = $row["regione"];
            $risultato["provincia"] = $row["provincia"];
            $risultato["comune"] = $row["comune"];
        }
        $risultato["nome"] = $row["nome"];
        $risultato["cognome"] = $row["cognome"];
	}
	return $risultato;
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

//function verifyScadenza($cid, $idAn){
//    $sql = "SELECT a.idAnnuncio, a.dataPubblicazione, a.nuovo FROM annuncio a WHERE a.idAnnuncio='$idAn'";
//    $result=$cid->query($sql);
//    $row=$result->fetch_assoc();
//    $idAn = $row["idAnnuncio"];
//    $dataP = $row["dataPubblicazione"];
//    $condizione = $row["nuovo"];
//
//    if (){
//
//    }
//}

function verifyOsservati($cid, $idAn){
    if (isset($_SESSION["logged"])) {
        if (isset($_SESSION["acquirente"]) and $_SESSION["acquirente"] == 1) {
            $acquirente = $_SESSION["email"];
            $sql = "SELECT idAnnuncio, acquirenteO FROM osserva WHERE idAnnuncio='$idAn' and acquirenteO='$acquirente'";
            $result = $cid->query($sql);
            $row = $result->fetch_assoc();

            $sql1 = "SELECT venditore FROM annuncio WHERE idAnnuncio='$idAn' and venditore='$acquirente'";
            $result1 = $cid->query($sql1);
            $row1 = $result1->fetch_assoc();

            if (empty($row)) {
                if (empty($row1)) {
                    echo '<li><a href="#0" id="cuore' . $idAn . '" onclick="aggiungiOsservati(\'' . $idAn . '\'); fullHeart(\'cuore' . $idAn . '\')" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i> Osserva</a></li>';
                } else {
                    echo '<li><a href="#0" id="cuore' . $idAn . '" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i> Osserva</a></li>';
                }
            } else {
                echo '<li><a href="#0" class="osserva-btn"><i class="fa fa-heart" aria-hidden="true"></i> Osservato</a></li>';
            }
        }
    } else {
        echo '<li><a href="#0" id="cuore'. $idAn .'" onclick="fullHeart(\'cuore'. $idAn .'\')" class="osserva-btn"><i class="fa fa-heart-o" aria-hidden="true"></i> Osserva</a></li>';
    }
}

function getPiùOsservati($cid){
    $sql = "SELECT OS.* FROM (SELECT fotoP, nomeAnnuncio, idAnnuncio, prezzoP, s.stato, COUNT(*) AS nOsservatori, (serietaV+puntualitaV)/2 AS punteggioMedio FROM osserva NATURAL JOIN annuncio NATURAL JOIN statoa s WHERE s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio) GROUP BY idAnnuncio ORDER BY nOsservatori DESC, punteggioMedio DESC) AS OS WHERE OS.stato='in vendita' LIMIT 6";
    //NON considero ancora visibilità ristretta!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1111
    $risultato = $cid->query($sql);

    $count=0;
    while($row=$risultato->fetch_assoc()){
        $fotoP = $row["fotoP"];
        $prezzoP = $row["prezzoP"];
        $nomeAn = $row["nomeAnnuncio"];
        $idAn = $row["idAnnuncio"];

        if ($count==0){
            echo'<div class="item active">';
        }
        if ($count==3) {
            echo '</div>
                  <div class="item">';
        }

        echo'<div class="col-sm-4 piùosservati">
                <div class="product-image-wrapper piùosservati-p-i-w">
                    <div class="single-products">
                        <div class="productinfo text-center piùosservati-content">
                            <img class="piùosservati-img-resize" src="data:image/jpg;base64,'. base64_encode($fotoP) .'" alt="Impossibile caricare l\'immagine.">
                            <h2>€ '. $prezzoP .'</h2>
                            <p>'. $nomeAn .'</p>  
                            <a href="dettagliAnnuncio.php?idAnnuncio='. $idAn .'" class="btn btn-default add-to-cart piùosservati-btn"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                        </div>
                    </div>
                </div>
             </div>';

        ++$count;
    };
    echo "</div>";
}



function getAnnunciPubblicati($cid) {
    $sql = "SELECT AP.* FROM (SELECT a.fotoP, a.prezzoP, a.nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE a.visibilita='pubblica' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio = s1.idAnnuncio)) AS AP WHERE AP.stato = 'in vendita' LIMIT 9";
    //non considero visibilità ristretta per ora!!!!!!!!!!!!!!!!!!!!!!!!!!
    $risultato = $cid->query($sql);

    echo '<h2 class="title text-center"><span class="title-span">Annunci</span></h2>';

    while($row=$risultato->fetch_assoc()){
        $fotoP = $row["fotoP"];
        $prezzoP = $row["prezzoP"];
        $nomeAn = $row["nomeAnnuncio"];
        $idAn = $row["idAnnuncio"];
        echo'<div class="col-sm-4 annunci-dim">
                <div class="product-image-wrapper">
                    <div class="single-products" >
                        <div class="productinfo text-center">
                            <div class="img-contenitore">
                                <img src="data:image/jpg;base64,'. base64_encode($fotoP) .'" alt=" Impossibile caricare l\'immagine." />
                            </div>
                            <h2>€ '. $prezzoP .'</h2>
                            <p>'. $nomeAn .'</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>€ '. $prezzoP .'</h2>
                                <h4>ID: '. $idAn .'</h4>
                                <p>'. $nomeAn .'</p>
                                <a href="dettagliAnnuncio.php?idAnnuncio='. $idAn .'" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">';
                            verifyOsservati($cid, $idAn);
                        echo '</ul>
                    </div>
                </div>
             </div>';
    }
}


function getAnnunciFiltrati($cid) {
    $categoria=$_GET["categoria"];
    $sottoCategoria=$_GET["sottoCategoria"];
    $regione=$_GET["regione"];
    $provincia=$_GET["provincia"];
    $comune=$_GET["comune"];
    $minPrice=$_GET["minPrice"];
    $maxPrice=$_GET["maxPrice"];

    if ($categoria!="" and $sottoCategoria!="") {
        if ($sottoCategoria == "Tutto") {
            switch (true) {
                case ($regione != "" and $provincia != "" and $comune != "" and $minPrice == "" and $maxPrice == ""):
                    if ($provincia=="NoProvincia" and $comune=="NoComune"){
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and regione='$regione' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    } else if ($comune=="NoComune"){
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and regione='$regione' and provincia='$provincia' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    } else {
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and regione='$regione' and provincia='$provincia' and comune='$comune' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    }
                    break;
                case ($minPrice != "" and $maxPrice != "" and $regione == "" and $provincia == "" and $comune == ""):
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato='in vendita' LIMIT 9";
                    break;
                case ($regione == "" and $provincia == "" and $comune == "" and $minPrice == "" and $maxPrice == ""):
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s1.idAnnuncio=s.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    break;
                case ($regione != "" and $provincia != "" and $comune != "" and $minPrice != "" and $maxPrice != ""):
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and regione='$regione' and provincia='$provincia' and comune='$comune' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    break;
            }
        } else {
            switch (true) {
                case ($regione != "" and $provincia != "" and $comune != "" and $minPrice == "" and $maxPrice == ""):
                    if ($provincia=="NoProvincia" and $comune=="NoComune"){
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and regione='$regione' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    } else if ($comune=="NoComune"){
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and regione='$regione' and provincia='$provincia' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    } else {
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and regione='$regione' and provincia='$provincia' and comune='$comune' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    }
                    break;
                case ($regione == "" and $provincia == "" and $comune == "" and $minPrice != "" and $maxPrice != ""):
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    break;
                case ($regione == "" and $provincia == "" and $comune == "" and $minPrice == "" and $maxPrice == ""):
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    break;
                case ($regione != "" and $provincia != "" and $comune != "" and $minPrice != "" and $maxPrice != ""):
                    if ($provincia=="NoProvincia" and $comune=="NoComune"){
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and regione='$regione' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    } else if ($comune=="NoComune"){
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and regione='$regione' and provincia='$provincia' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    } else {
                        $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM categoria JOIN annuncio a on categoria.nomeCategoria = a.nomeCategoria and categoria.sottoCategoria = a.sottoCategoria JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and regione='$regione' and provincia='$provincia' and comune='$comune' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                    }
                    break;
            }
        }

    } else {
        switch(true) {
            case ($regione != "" and $provincia != "" and $comune != "" and $minPrice == "" and $maxPrice == ""):
                if ($provincia=="NoProvincia" and $comune=="NoComune"){
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE regione='$regione' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                } else if ($comune=="NoComune"){
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE regione='$regione' and provincia='$provincia' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                } else {
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE regione='$regione' and provincia='$provincia' and comune='$comune' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                }
                break;
            case ($regione == "" and $provincia == "" and $comune == "" and $minPrice != "" and $maxPrice != ""):
                $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                break;
            case ($regione != "" and $provincia != "" and $comune != "" and $minPrice != "" and $maxPrice != ""):
                if ($provincia=="NoProvincia" and $comune=="NoComune"){
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE regione='$regione' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                } else if ($comune=="NoComune"){
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE regione='$regione' and provincia='$provincia' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                } else {
                    $sql = "SELECT SEL.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, a.idAnnuncio, s.stato FROM annuncio a JOIN statoa s on a.idAnnuncio = s.idAnnuncio WHERE regione='$regione' and provincia='$provincia' and comune='$comune' and prezzoP>'$minPrice' and prezzoP<'$maxPrice' and s.dataStato IN (SELECT MAX(s1.dataStato) FROM statoa s1 WHERE s.idAnnuncio=s1.idAnnuncio)) AS SEL WHERE SEL.stato = 'in vendita' LIMIT 9";
                }
                break;
        }
    }

    $risultato = $cid->query($sql);

    echo '<h2 id="anFiltrati" class="title text-center"><span class="title-span">Annunci filtrati</span></h2>';

    while($row=$risultato->fetch_assoc()){
        $fotoP = $row["fotoP"];
        $prezzoP = $row["prezzoP"];
        $nomeAn = $row["nomeAnnuncio"];
        $idAn = $row["idAnnuncio"];
        echo'<div class="col-sm-4 annunci-dim">
                <div class="product-image-wrapper">
                    <div class="single-products" >
                        <div class="productinfo text-center">
                            <div class="img-contenitore">
                                <img src="data:image/jpg;base64,'. base64_encode($fotoP) .'" alt="Impossibile caricare l\'immagine." />
                            </div>
                            <h2>€ '. $prezzoP .'</h2>
                            <p>'. $nomeAn .'</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>€ '. $prezzoP .'</h2>
                                <h4>ID: '. $idAn .'</h4>
                                <p>'. $nomeAn .'</p>
                                <a href="dettagliAnnuncio.php?idAnnuncio='. $idAn .'" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">';
                            verifyOsservati($cid, $idAn);
                        echo '</ul>
                    </div>
                </div>
             </div>';
    }


    echo '<script>autoScrollRefresh("anFiltrati");</script>';
}

function getVenditoriTop($cid){
//    $listaVenditoriTop=array("email"=>"", "nome"=>"", "cognome"=>);
    $listaVenditoriTop = array();
//    $sql = "SELECT nome, cognome, immagine, venditore AS venditoreTop, fotoP, prezzoP, nomeAnnuncio, COUNT(*) AS nVendite, AVG((serietaV+puntualitaV)/2) AS punteggioMedio
//            FROM utente NATURAL JOIN annuncio NATURAL JOIN richiestaacquisto NATURAL JOIN statoa
//            WHERE stato='venduto' AND approvato=True
//              AND (dataStato BETWEEN SUBDATE(CURRENT_TIMESTAMP(), INTERVAL 1 MONTH) AND NOW())
//            GROUP BY venditoreTOP
//            ORDER BY nVendite, punteggioMedio DESC";

//    $sql = "SELECT nome, cognome, immagine, email AS venditoreTop, COUNT(*) as nVendite, AVG((serietaV+puntualitaV)/2) AS punteggioMedio FROM utente JOIN annuncio ON utente.email=annuncio.venditore JOIN richiestaacquisto ON annuncio.idAnnuncio=richiestaacquisto.idAnnuncio JOIN statoa ON annuncio.idAnnuncio=statoa.idAnnuncio WHERE richiestaacquisto.approvato=1 AND (dataStato BETWEEN SUBDATE(CURRENT_TIMESTAMP(), INTERVAL 1 MONTH) AND NOW()) GROUP BY venditoreTop ORDER BY punteggioMedio DESC, nVendite DESC LIMIT 4";
    $sql = "SELECT nome, cognome, immagine, email AS venditoreTop, COUNT(*) as nVendite, AVG((serietaV+puntualitaV)/2) AS punteggioMedio FROM utente JOIN annuncio ON utente.email=annuncio.venditore JOIN richiestaacquisto ON annuncio.idAnnuncio=richiestaacquisto.idAnnuncio JOIN statoa ON annuncio.idAnnuncio=statoa.idAnnuncio WHERE richiestaacquisto.approvato=1 AND (dataStato BETWEEN SUBDATE(CURRENT_TIMESTAMP(), INTERVAL 1 MONTH) AND NOW()) GROUP BY venditoreTop ORDER BY punteggioMedio DESC, nVendite DESC LIMIT 4";

    $risultato = $cid->query($sql);

    echo '<ul class="nav nav-tabs tab-menu" id="myTab" role="tablist">';

    $count = 0;
    while ($row = $risultato->fetch_assoc()) {
        $venditoreTop = $row["venditoreTop"];
        $nome = $row["nome"];
        $cognome = $row["cognome"];
        $listaVenditoriTop["email"][$count]=$venditoreTop;
        $listaVenditoriTop["nome"][$count] = $nome;
        $listaVenditoriTop["cognome"][$count] = $cognome;

        $immagine = $row["immagine"];
//        $punteggioMedio = $row["punteggioMedio"];

        echo '<li class="nav-item">';

        switch ($count) {
            case 0:
                echo '<a id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">';
                break;
            case 1:
                echo '<a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">';
                break;
            case 2:
                echo '<a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">';
                break;
            case 3:
                echo '<a class="nav-link disabled" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false" aria-disabled="true"  tabindex="-1">';
                break;
        }

        echo '<div class="col-sm-3 clickable">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center user-information">
                            <img src="data:image/jpg;base64,' . base64_encode($immagine) . '" alt="Impossibile caricare l\'immagine." />
                            <h2>' . $nome . ' ' . $cognome . '</h2>
                            <p>' . $venditoreTop . '</p>
                            <div>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              </a>
              </li>';

        ++$count;
    }
    echo '</ul>';

    return $listaVenditoriTop;
}



function getAnnunciVenditoriTop($cid, $listaVenditoriTop) {
    echo '<div class="tab-content" id="myTabContent">';

    for ($i = 0; $i < 4; $i++) {
        $venditoreTop = $listaVenditoriTop["email"][$i];
        $sql1 = "SELECT AV.* FROM (SELECT fotoP, prezzoP, nomeAnnuncio, annuncio.idAnnuncio, nome, cognome, s1.stato FROM utente JOIN annuncio ON utente.email=annuncio.venditore JOIN statoa s1 ON annuncio.idAnnuncio=s1.idAnnuncio WHERE annuncio.venditore='$venditoreTop' and s1.dataStato IN (SELECT MAX(s2.dataStato) FROM statoa s2 WHERE s2.idAnnuncio=s1.idAnnuncio GROUP BY s2.idAnnuncio)) AS AV WHERE AV.stato='in vendita'";

        $risultato1 = $cid->query($sql1);

        $nome = $listaVenditoriTop["nome"][$i];
        $cognome = $listaVenditoriTop["cognome"][$i];

        switch ($i) {
            case 0:
                echo '<div class="tab-pane p-4 fade" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">';
                echo '<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">' . $nome . ' ' . $cognome . '</span></h2>';
                break;
            case 1:
                echo '<div class="tab-pane p-4 fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">';
                echo '<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">' . $nome . ' ' . $cognome . '</span></h2>';
                break;
            case 2:
                echo '<div class="tab-pane p-4 fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">';
                echo '<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">' . $nome . ' ' . $cognome . '</span></h2>';
                break;
            case 3:
                echo '<div class="tab-pane p-4 fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">';        //aria-labelledby="tab3-tab"
                echo '<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">' . $nome . ' ' . $cognome . '</span></h2>';
                break;
        }


        while ($row = $risultato1->fetch_assoc()) {
            $fotoP = $row["fotoP"];
            $prezzoP = $row["prezzoP"];
            $nomeAn = $row["nomeAnnuncio"];
            $idAn = $row["idAnnuncio"];

            echo '<div class="col-sm-4 annunci-dim">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center annunci-vtop">
                            <div class="img-contenitore">
                                <img src="data:image/jpg;base64,' . base64_encode($fotoP) . '" alt="Impossibile caricare l\'immagine." />
                            </div>
                            <h2>' . $prezzoP . '</h2>
                            <p>' . $nomeAn . '</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>' . $prezzoP . '</h2>
                                <p>' . $nomeAn . '</p>
                                <a href="dettagliAnnuncio.php?idAnnuncio='. $idAn .'" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">';
                            verifyOsservati($cid, $idAn);
                        echo '</ul>
                    </div>
                </div>
              </div>';

        }
        echo '</div>';

        if ($i == 3) {
            echo '</div>';
        }
    }
}


echo '<script src="js/funzioni.js"></script>';




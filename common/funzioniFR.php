<?php

function isUser($cid,$email,$psw) {
	$risultato= array("msg"=>"","status"=>"ok");

   	$sql = "SELECT * FROM utente WHERE email='$email' and psw='$psw';";
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
	}elseif($res->num_rows==1) {
		$msg = "Login effettuato con successo";
		$risultato["status"]="ok";
		$risultato["msg"]=$msg;
	}
	return $risultato;
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function getPiùOsservati($cid){
    $sql = "SELECT fotoP, nomeAnnuncio, prezzoP, COUNT(*) AS nOsservatori, (serietaV+puntualitaV)/2 AS punteggioMedio FROM osserva NATURAL JOIN annuncio GROUP BY idAnnuncio ORDER BY nOsservatori DESC, punteggioMedio DESC LIMIT 6";
    $risultato = $cid->query($sql);

    $count=0;
    while($row=$risultato->fetch_assoc()){
        //!!!DA GESTIRE LA FOTOP e bottone DETTAGLI ANNUNCIO!!!
//        $fotoP = ;
        $prezzoP = $row["prezzoP"];
        $nomeAn = $row["nomeAnnuncio"];

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
                            <img src="images/home/recommend1.jpg" alt="Impossibile caricare l\'immagine.">
                            <h2>€ '. $prezzoP .'</h2>
                            <p>'. $nomeAn .'</p>  
                            <a href="index.php" class="btn btn-default add-to-cart piùosservati-btn"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                        </div>
                    </div>
                </div>
             </div>';

        ++$count;
    };
    echo "</div>";
}

//function filtroCategoria($cid, $categoria, $sottoCategoria){
//    if ($sottoCategoria=="visualizzaTuttoEl" or $sottoCategoria=="visualizzaTuttoFeV" or $sottoCategoria=="visualizzaTuttoAb" or $sottoCategoria=="visualizzaTuttoH"){
//        $sql="SELECT nomeCategoria, sottoCategoria FROM categoria WHERE nomeCategoria='$categoria'";
////        $sql="SELECT nomeCategoria, sottoCategoria FROM categoria WHERE nomeCategoria='Abbigliamento' and (sottoCategoria='Vestiti' or sottoCategoria='Borse' or sottoCategoria='Scarpe' or sottoCategoria='Accessori' or sottoCategoria='Altro');"
//    } else {
//        $sql = "SELECT nomeCategoria, sottoCategoria FROM categoria WHERE nomeCategoria='$categoria' and sottoCategoria='$sottoCategoria'";
//    }
//
//    $risultato = $cid->query($sql);
//    while($row=$risultato->fetch_assoc()){
//    }
//}



function getAnnunciFiltrati($cid, $categoria, $sottoCategoria, $regione, $provincia, $comune) {
    //DA FARE controlli vari su input
    $sql="SELECT fotoP, prezzoP, nomeAnnuncio FROM annuncio JOIN categoria WHERE categoria.nomeCategoria='$categoria' and categoria.sottoCategoria='$sottoCategoria' and regione='$regione' and provincia='$provincia' and comune='$comune'";

    $risultato = $cid->query($sql);

    while($row=$risultato->fetch_assoch()){
        $prezzoP = $row["prezzoP"];
        $nomeAn = $row["nomeAnnuncio"];
        echo'<div class="col-sm-4 annunci-dim">
                <div class="product-image-wrapper">
                    <div class="single-products" >
                        <div class="productinfo text-center">
                            <div class="img-contenitore">
                                <img src="images/mercatino/taylorGSmini.jpg" alt="Impossibile caricare l\'immagine." />
                            </div>
                            <h2>€ '. $prezzoP .'</h2>
                            <p>'. $nomeAn .'</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>€ '. $prezzoP .'</h2>
                                <p>'. $nomeAn .'</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
                            </div>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Osservati</a></li>
    
                        </ul>
                    </div>
                </div>
             </div>';
    }

}







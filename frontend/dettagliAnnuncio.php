<?php
	session_start();
	include "../common/connessione.php";
	include "../common/funzioniFR.php";
	include "../common/valutazione.php";
    include "../common/funzioni_dettagli_annuncio.php";

    $idAnnuncio = $_GET['idAnnuncio'];

    $sql="SELECT * FROM annuncio AS o JOIN statoa AS s ON o.idAnnuncio=s.idAnnuncio WHERE s.idAnnuncio='$idAnnuncio' ORDER BY dataStato DESC limit 1";
    $res=$cid->query($sql);
    $row = $res->fetch_array();
    $sqlo="SELECT COUNT(*) AS numOss FROM osserva WHERE idAnnuncio='$idAnnuncio'";
    $reso=$cid->query($sqlo);
    $rowo = $reso->fetch_array();

echo'

<!DOCTYPE html> 			
<html lang="en">
<head> <!--head-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mercatino delle pulci</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="css/prettyPhoto.css" rel="stylesheet"> -->
    <link href="../css/price-range.css" rel="stylesheet">
    <!-- <link href="css/animate.css" rel="stylesheet"> -->
	<link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href="../css/account.css" rel="stylesheet">
    <link href="../css/dettagliAnnuncio.css" rel="stylesheet">
    <link href="../css/registraAnnuncio.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<!--<link rel="shortcut icon" href="images/ico/favicon.ico"> -->
	<link rel="shortcut icon" href="../images/ico/favicon1.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->';
//	include "../common/head.php";
echo'
<body>';
	include "../common/navbar.php";

echo'
	<section>
		<div class="container">
			<div class="row"> 
			
				<h2 class="title text-center"><span class="title-span">Dettagli annuncio</span></h2>
				<div class="col-sm-18 padding-right" > 
					<div class="features_items">
						<div class="col-sm-4">
							<div class="container_imm" style="max-width: none; ">
								<img src="data:image/jpg;base64,'. base64_encode($row["fotoP"]) .'"  alt="Avatar" class="image_p imm_dettagli" >
							</div>
						</div> 
						<div class="col-sm-5 descrizione_annuncio"  >
							<h2 class="title1" style="margin-top: auto">' .$row["nomeAnnuncio"] .'</h2>
							
							<p class="title2"></p>ID annuncio: ' .$row["idAnnuncio"] .'</p>
							
							<p><b>Prezzo: </b>' .$row["prezzoP"] .' €</p>

							<p><b>Stato annuncio: </b>' .$row["stato"] .'  </p>
							<textarea name="text"  placeholder="" rows="4" disabled class="box_descrizione_annuncio">' .$row["descrizioneAnnuncio"] .' </textarea> 
							<p ><b>Venditore: </b> ' .$row["venditore"] .'</p>';


                                valutazione($cid, $row["venditore"]);
                                echo'<p class="title3"></p><i class="fa fa-eye" aria-hidden="true"></i>  ' .$rowo["numOss"] .' (osservatori)</p>';
                                richiestaacquistobtn($cid, $row["idAnnuncio"], $row["stato"]);
                                osservaannunciobtn($cid, $row["idAnnuncio"]);
							echo'
							
						</div>
					</div>';
                    if($row["nuovo"]==0){
                        echo'
                        <h2 class="title text-left title_dettagli_prodotto" ><span class="title-span">Dettagli prodotto</span></h2>
                        <div class="col-sm-10 descrizione_annuncio">
                            <p ><b>Nome del prodotto: </b>' .$row["nomeP"] .'</p>
                            <p ><b>Stato del prodotto: </b> USATO </p>
                            <p ><b>Stato usura: </b>' .$row["usura"] .'</p>';
                            if(!empty($row["periodoUtilizzo"])){
                                echo'<p ><b>Periodo di utilizzo: </b> ' .$row["periodoUtilizzo"] .'</p>';
                            };
                            echo'
                            <p ><b>Categoria: </b>' .$row["nomeCategoria"] .'</p>
                            <p ><b>Sottocategoria: </b>' .$row["sottoCategoria"] .'</p>
                        </div>';
                    } else {
                        echo'
                        <h2 class="title text-left title_dettagli_prodotto" ><span class="title-span">Dettagli prodotto</span></h2>
                        <div class="col-sm-10 descrizione_annuncio">
                            <p ><b>Nome del prodotto: </b>' .$row["nomeP"] .'</p>
                            <p ><b>Stato del prodotto: </b> NUOVO</p>';
                            if($row["garanzia"]==1){
                                echo'<p ><b>Garanzia: </b> Questo prodotto ha la garanzia</p>';
                                echo'<p ><b>Data di scadenza: </b> ' .$row["periodoCopertura"] .' </p>';
                            }else{
                                echo'<p ><b>Garanzia: </b> Questo prodotto non ha la garanzia</p>';

                            };

                        echo'
                        
                        <p ><b>Categoria: </b>' .$row["nomeCategoria"] .'</p>
                        <p ><b>Sottocategoria: </b>' .$row["sottoCategoria"] .'</p>
                    </div>';
                    }
                    echo '
				</div>
			</div>
		</div>
	</section>
	<br>
	<br>';

    include "../common/footer.php";
  echo'
    <script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/price-range.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/funzioni.js"></script>
	<script src="../js/tendinalogin.js"></script>
	<script src="../js/ajax-functions.js"></script>
	<!--aggiunta-->
</body>
</html>';
    

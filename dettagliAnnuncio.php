<?php
	session_start();
	include "common/connessione.php";
	include "common/funzioniFR.php";
	include "common/valutazione.php";
    include "common/funzioni_dettagli_annuncio.php";

    $idAnnuncio = $_GET['idAnnuncio'];

    $sql="SELECT * FROM annuncio AS o JOIN statoa AS s ON o.idAnnuncio=s.idAnnuncio WHERE s.idAnnuncio='$idAnnuncio' ORDER BY dataStato DESC limit 1";
    $res=$cid->query($sql);
    $row = $res->fetch_array();
    $sqlo="SELECT COUNT(*) AS numOss FROM osserva WHERE idAnnuncio='$idAnnuncio'";
    $reso=$cid->query($sqlo);
    $rowo = $reso->fetch_array();
?>

<!DOCTYPE html> 			
<html lang="en">
<?php include "common/head.php"; ?>
<body>
<?php
	include "common/navbar.php";

echo'
	<section>
		<div class="container">
			<div class="row"> 
			
				<h2 class="title text-center add-margin-top"><span class="title-span">Dettagli annuncio</span></h2>
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


                                valutazioneDettagliAnnuncio($cid, $row["venditore"]);
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

                            }

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

    include "common/footer.php";
?>
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
	<script src="js/funzioni.js"></script>
	<script src="js/tendinalogin.js"></script>
	<script src="js/ajax-functions.js"></script>
	<!--aggiunta-->
</body>
</html>
    

<?php
	session_start();
	include "php/connessione.php";		//DA SPOSTARE IN CARTELLA common
	include "php/funzioniFR.php";		//DA SPOSTARE IN CARTELLA common
?>

<!DOCTYPE html> 			
<html lang="en">
	<?php include "common/head.php";?>

<body>
	<?php include "php/navbar.php";?>	<!--NAVBAR PRINCIPALE-->

	<section>
		<div class="container">
			<div class="row"> 
			
				<h2 class="title text-center"><span class="title-span">Dettagli annuncio</span></h2>
				<div class="col-sm-18 padding-right" > 
					<div class="features_items">
						<div class="col-sm-4">
							<div class="container_imm" style="max-width: none; ">
								<img src="images/mercatino/bialettiMoka.jpg" alt="Avatar" class="image_p imm_dettagli" >
							</div>
						</div> 
						<div class="col-sm-5 descrizione_annuncio" >
							<h2 class="title1" >Nome annuncio</h2>
							<p class="title2"></p>ID annuncio: #numero</p>
							<p><b>Prezzo: </b> #numero €</p>

							<p><b>Stato annuncio: </b> In vendita/venduto/eliminato</p>
							<textarea name="text"  placeholder="Descrizione annuncio" rows="4" disabled class="box_descrizione_annuncio"></textarea> 
							<p ><b>Venditore: </b> venditore@mail.com</p>
							<p class="title2"><b>Valutazione del venditore: </b></p>
							<div style="display: inline-block; ">
								<i class="fa fa-star stelle_valutazione" aria-hidden="true" ></i>
								<i class="fa fa-star stelle_valutazione" aria-hidden="true" ></i>
								<i class="fa fa-star stelle_valutazione" aria-hidden="true" ></i>
								<i class="fa fa-star stelle_valutazione" aria-hidden="true" ></i>
								<i class="fa fa-star-half-o stelle_valutazione" aria-hidden="true"></i>
							</div>
							<button type="submit" class="btn pull-right btn_prodotto" onclick="btnConferma('richiesta')" ><i class="fa fa-shopping-cart" aria-hidden="true"></i> Acquista il prodotto</button>
							
							<div id="richiesta" class="modal">
								<form class="modal-content popup-modal-content">
									<div class="container popup-conferma">
										<h4>Richiesta d'acquisto</h4>
										<p>Stai per inviare una richiesta d'acquisto per questo articolo.</p> 
										<p>Sei sicur* di voler proseguire?</p>
										
										
										<input type="radio" id="cd" name="pagamento" value="cd">
										<label for="cd">Carta di credito</label><br>
										<input type="radio" id="cc" name="pagamento" value="cc">
										<label for="cc">Contanti alla consegna</label><br>
									
										<p>Sei sicuro di voler proseguire? </p>
										<div class="clearfix-dettagli">
											<button type="button" onclick="document.getElementById('richiesta').style.display='none'" class="popup-btn deletebtn">Conferma</button>
											<button type="button" onclick="document.getElementById('richiesta').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
										</div>
									</div>
								</form>
							</div>	
						</div>
					</div>
					<h2 class="title text-left title_dettagli_prodotto" ><span class="title-span">Dettagli prodotto</span></h2>
					<div class="col-sm-4 descrizione_annuncio">
						<p ><b>Nome del prodotto: </b> #nome</p>
						<p ><b>Stato del prodotto: </b> USATO</p>
						<p ><b>Stato usura: </b>pari al nuovo/buono/medio/usurato</p>
						<p ><b>Periodo di utilizzo: </b> #periodo di utilizzo</p>
						<p ><b>Categoria: </b> #categoria</p>
						<p ><b>Sottocategoria: </b> #sottocategoria</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<br>
	<br>
	
	<?php
		include "common/footer.php"
	?>
  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
	<script src="js/funzioni.js"></script>
	<script src="js/tendinalogin.js"></script>		<!--aggiunta-->
</body>
</html>
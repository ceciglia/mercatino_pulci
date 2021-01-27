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
				<h2 class="title text-center"><span class="title-span">Nuovo annuncio</span></h2>
				<h2 class="insert-title" >Inserisci i dettagli dell'annuncio</h2>
				<div class="col-sm-18 padding-right" style="padding-left: 0;"> <!--col-sm-36-->
					<div class="features_items">
						
						<div class="col-sm-4">
							<div class="container_imm" >
								<img src="images/pubblicaAnnuncio.jpg" alt="Avatar" class="immagine-r-a">
								<input type="file" id="file" class="invisibile" />
								<button class="btn-container_imm" id="button" name="button" value="Upload" onclick="thisFileUpload();"> Upload</button>
							</div>
							
							<input type="number" required name="price" placeholder="Prezzo" min="0"  step=".01" class="price-container"><p class="price"> €</p>						
						

						</div> 

						<div class="col-sm-6">
							<input name="text"  placeholder="Nome annuncio" rows="1" class="insert-data"></input> 
							<textarea name="text"  placeholder="Descrizione annuncio" rows="9" class="descrizione"></textarea> 
							
							<input name="text"  placeholder="Nome prodotto" rows="1" class="insert-data"></input> 
							<button onclick="nuovousatoris('usato')" class="btn-nuovo-usato-vis">Usato</button>
							<button onclick="nuovousatoris('nuovo')" class="btn-nuovo-usato-vis">Nuovo</button>
							<div id="usato" style="display: none;">
								<select class="insert-data">
									<option>-- Stato di usura --</option>
									<option>Pari al nuovo</option>
									<option>Buono</option>
									<option>Medio</option>
									<option>Usurato</option>
								</select>
								<textarea type="text" placeholder="Indicare il periodo di utilizzo" rows="2" class="descrizione"></textarea>
							</div>
						
							<div id="nuovo" style="display: none;">
								
								<input type="checkbox"  name="garanzia" onclick="nuovousatoris('garanzia')" style="margin-top: 10px; ">
								<label for="garanzia" class="price" >Garanzia di copertura </label><br>
								<div id="garanzia" style="display: none;" class="margine-nuovo">
									<p class="price scadenza">Indica la scadenza:  </p>
									<input type="date" class="insert-data"/>
								</div>
							</div>
							
							<select class="select-data">
								<option>-- Categoria --</option>
								<option>Elettrodomestici</option>
								<option>Foto e video</option>
								<option>Abbigliamento</option>
								<option>Hobby</option>
							</select>
							<select class="select-data">
									<option>-- Sottocategoria --</option>
									<option>Elettrodomestici</option>
									<option>Foto e video</option>
									<option>Abbigliamento</option>
									<option>Hobby</option>
								</select>
							
							</select>
							<p class="title-3">Inseire la collocazione geografica: </p>
							<select class="select-data">
								<option>-- Comune --</option>
								<option>Comune1</option>
								<option>Comune2</option>
								<option>Comune3</option>
							
							</select>
							<select class="select-data">
								<option>-- Provincia --</option>
								<option>Provincia1</option>
								<option>Provincia2</option>
								<option>Provincia3</option>
							
							</select>
							<select class="select-data">
								<option>-- Regione --</option>
								<option>Regione1</option>
								<option>Regione2</option>
								<option>Regione3</option>
							
							</select>
							<p class="title-3">Seleziona la visibilità: </p>
							<button class="btn-nuovo-usato-vis">Pubblica</button>
							<button class="btn-nuovo-usato-vis">Privata</button>	
							<button onclick="nuovousatoris('ristretta')" class="btn-nuovo-usato-vis">Ristretta</button>	
							<div id="ristretta" style="display: none;" class="blu">
								<p class="title-3"> Inserisci l'area di visibilità: </p>
								<select class="select-data ristr">
									<option>-- Provincia --</option>
									<option>Provincia1</option>
									<option>Provincia2</option>
									<option>Provincia3</option>
								</select>
								<select class="select-data ristr">
									<option>-- Regione --</option>
									<option>Regione1</option>
									<option>Regione2</option>
									<option>Regione3</option>
							
								</select>
								<p><i class="fa fa-plus-square" aria-hidden="true"></i>  Aggiungi area di visibilità</p>
							</div>
							
							
							<button type="submit" onclick="btnConferma('modifica')" class="btn btn-pa" >Pubblica nuovo annuncio</button>
							<div id="modifica" class="modal">
							<form class="modal-content popup-modal-content">
								<div class="container popup-conferma">
									<h4>Pubblica un nuovo annuncio</h4>
									<p>Stai per pubblicare un nuovo annuncio.</p> 
									<p>Sei sicur* di voler proseguire?</p>      
									<div class="clearfix">
										<button type="button" onclick="document.getElementById('modifica').style.display='none'" class="popup-btn deletebtn">Conferma</button>
										<button type="button" onclick="document.getElementById('modifica').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
									</div>
								</div>
							</form>
						</div>
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
</body>
</html>
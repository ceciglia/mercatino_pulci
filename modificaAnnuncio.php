<?php
	session_start();
	include "common/connessione.php";		//DA SPOSTARE IN CARTELLA common
	include "common/funzioniFR.php";		//DA SPOSTARE IN CARTELLA common
?>

<!DOCTYPE html> 			
<html lang="en">
	<?php include "common/head.php";?>

<body>
	<?php include "common/navbar.php";?>	<!--NAVBAR PRINCIPALE-->

	<section>
		<div class="container">
			<div class="row"> 
				<h2 class="title text-center"><span class="title-span">Modifica annuncio</span></h2>
				
				<h2 class="insert-title" >Modifica il tuo annuncio</h2>
					
				<div class="col-sm-18 padding-right" >  
					<div class="features_items">
						
						<div class="col-sm-4">
							
							<div class="container_imm" >
								<img src="../images/pubblicaAnnuncio.jpg" alt="Avatar" class="image_p immagine-r-a" >
							
								<input type="file" id="file" style="display:none;" />
								<button class="btn-container_imm" id="button" name="button" value="Upload" onclick="thisFileUpload();"><i class="fa fa-pencil" aria-hidden="true" ></i> Modifica immagine</button>
							</div>
							<div><i class="fa fa-pencil matita" aria-hidden="true" ></i><input type="number" required name="price" placeholder="Prezzo" min="0"  step=".01" class="price-container"><p class="price"> €</p></div>						
						</div> 
						
						<div class="col-sm-6">
							
							<div><i class="fa fa-pencil matita" aria-hidden="true" ></i><textarea name="text"  placeholder="Nome annuncio" rows="1" class="modifica_dati" ></textarea> </div>
							<div><i class="fa fa-pencil matita" aria-hidden="true" ></i><textarea name="text"  placeholder="Descrizione annuncio" rows="9" class="modifica_dati_margine"></textarea> </div>
							
							<div><i class="fa fa-pencil matita" aria-hidden="true" ></i><textarea name="text"  placeholder="Nome prodotto" rows="1" class="modifica_dati"></textarea> </div>
							<div>
								  <i class="fa fa-pencil matita" aria-hidden="true" ></i><button onclick="nuovousatoris('usato')" class="btn-nuovo-usato-vis">Usato</button>
							      <button onclick="nuovousatoris('nuovo')" class="btn-nuovo-usato-vis">Nuovo</button>
							</div>
							<div id="usato" style="display: none;" >
								<select class="modifica_dati modifica_nuovo_usato">
									<option>-- Stato di usura --</option>
									<option>Pari al nuovo</option>
									<option>Buono</option>
									<option>Medio</option>
									<option>Usurato</option>
								</select>
								<textarea type="text" placeholder="Indicare il periodo di utilizzo" rows="2" class="modifica_dati_margine modifica_nuovo_usato"></textarea></textarea>
							</div>
						
							<div id="nuovo" style="display: none;">
								
								<input type="checkbox"  name="garanzia" onclick="nuovousatoris('garanzia')" class="modifica_garanzia modifica_nuovo_usato">
								<label for="garanzia" class="price"> Garanzia di copertura </label><br>
								<div id="garanzia" style="display: none;">
									<p class="price modifica_nuovo_usato">Indica la scadenza:   </p>
									<input type="date" class="insert-data modifica_nuovo_usato modifica_dati_margine"/>
								</div>
							</div>
							
							
							<i class="fa fa-pencil matita" aria-hidden="true"></i><select class="modifica_cat">
								<option>-- Categoria --</option>
								<option>Elettrodomestici</option>
								<option>Foto e video</option>
								<option>Abbigliamento</option>
								<option>Hobby</option>
							</select>
							<br>
							<i class="fa fa-pencil matita" aria-hidden="true" ></i><select class="modifica_cat">
								<option>-- Sottocategoria --</option>
								<option>Elettrodomestici</option>
								<option>Foto e video</option>
								<option>Abbigliamento</option>
								<option>Hobby</option>
							</select>
							
						
							<div><i class="fa fa-pencil matita" aria-hidden="true"></i><p class="areageog_title">Modifica la collocazione geografica: </p></div>
							<select class="areageog">
								<option>-- Comune --</option>
								<option>Comune1</option>
								<option>Comune2</option>
								<option>Comune3</option>
							
							</select>
							<select class="areageog">
								<option>-- Provincia --</option>
								<option>Provincia1</option>
								<option>Provincia2</option>
								<option>Provincia3</option>
							
							</select>
							<select  class="areageog">
								<option>-- Regione --</option>
								<option>Regione1</option>
								<option>Regione2</option>
								<option>Regione3</option>
							
							</select>
							<div><i class="fa fa-pencil matita" aria-hidden="true" ></i><p class="areageog_title">Modifica la visibilità: </p></div>
							<button class="btn-nuovo-usato-vis modifica_nuovo_usato">Pubblica</button>
							<button class="btn-nuovo-usato-vis ">Privata</button>	
							<button onclick="nuovousatoris('ristretta')" class="btn-nuovo-usato-vis">Ristretta</button>	
							<div id="ristretta" style="display: none;" >
								<p class="modifica_garanzia"> Inserisci l'area di visibilità: </p>
								<select class="select-data ristr modifica_nuovo_usato">
									<option>-- Provincia --</option>
									<option>Provincia1</option>
									<option>Provincia2</option>
									<option>Provincia3</option>
								</select>
								<select class="select-data ristr modifica_nuovo_usato">
									<option>-- Regione --</option>
									<option>Regione1</option>
									<option>Regione2</option>
									<option>Regione3</option>
							
								</select>
								<p class="modifica_garanzia"><i class="fa fa-plus-square" aria-hidden="true"></i>  Aggiungi area di visibilità</p>
							</div>
							
							<div style="margin-top: 30px;">
								<button type="submit" onclick="btnConferma('modannuncio')" class="btn btn-profilo pull-right btn_salva"   ><i class="fa fa-check" aria-hidden="true"></i>  Salva le modifiche</button>
								
								<div id="modannuncio" class="modal">
									<form class="modal-content popup-modal-content">
										<div class="container popup-conferma">
											<h4>Modifica annuncio</h4>
											<p>Stai per modificare questo annuncio.</p> 
											<p>Sei sicur* di voler proseguire?</p>
											
											<div class="clearfix">
												<button type="button" onclick="document.getElementById('modannuncio').style.display='none'" class="popup-btn deletebtn">Conferma</button>
												<button type="button" onclick="document.getElementById('modannuncio').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
											</div>
										</div>
									</form>
								</div>	
								
								<button type="submit"  class="btn btn-profilo pull-right btn_elimina" onclick="btnConferma('eliminannuncio')"  ><i class="fa fa-trash-o" aria-hidden="true"></i> Elimina annuncio</button>			<!--class="btn btn-profilo pull-left" margin-right: 10px;-->
								<div id="eliminannuncio" class="modal">
									<form class="modal-content popup-modal-content">
										<div class="container popup-conferma">
											<h4>Elimina annuncio</h4>
											<p>Stai per eliminare questo annuncio.</p> 
											<p>Sei sicur* di voler proseguire?</p>
											
											<div class="clearfix">
												<button type="button" onclick="document.getElementById('eliminannuncio').style.display='none'" class="popup-btn deletebtn">Conferma</button>
												<button type="button" onclick="document.getElementById('eliminannuncio').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
											</div>
										</div>
									</form>
								</div>	
							</div>
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
	<script src="js/tendinalogin.js"></script>		<!--aggiunta-->
</body>
</html>
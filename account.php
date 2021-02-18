<?php
	session_start();
	include "common/connessione.php";
	include "common/funzioniFR.php";
	include "common/funzioni_account.php";
?>

<!DOCTYPE html>
<html lang="en">
	<?php include "common/head.php";?>

<body>
	<?php include "common/navbar.php";?>	<!--NAVBAR PRINCIPALE-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2 id="h2_layer"><span class="title-span">Nome Utente</span></h2>
						<div class="panel-group category-products" id="accordian">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="account-click" id="profilo_click" href="#" onclick="opensottomenu(event, 'profilo')">
											Il mio profilo
										</a>
									</h4>
								</div>
							</div>
                            <?php
                                menulaterale($cid);
                            ?>
						</div>
					</div>
				</div>
				<!--PROFILO-->
				<div class="col-sm-9 padding-right" id='profilo'>
					<div class="features_items" >
						<h2 class="title text-center"><span class="title-span">PROFILO</span></h2>
					</div>
                    <?php
                        ciao($cid);
                    ?>

					<div class="col-sm-4">
                        <?php
                            immagine($cid);

                        ?>
                        <?php
                            valutazione($cid);

                        ?>

						<div style="margin-bottom: 30px;">
							<?php
									acquirente_venditore($cid);

							?>
						</div>
					</div>
							<?php
									utenteinfo($cid);
							?>
					<div>
						<button type="submit" onclick="opensottomenu(event, 'modificaProfilo')" class="btn btn-profilo modificaprofilo pull-right" ><i class="fa fa-pencil" aria-hidden="true"></i>   Modifica profilo</button>

					</div>

				</div>
				<div class="col-sm-9 padding-right" id='modificaProfilo'>
					<div class="features_items" >
						<h2 class="title text-center"><span class="title-span">Modifica profilo</span></h2>
					</div>
					<p  class="btn-modificaprofilo" >Modifica i tuoi dati</p>
					<div class="col-sm-4">
						<div class="container_imm" style="max-width: none;">
							<img src="images/home/product1.jpg" alt="Avatar" class="image_p immagine-profilo" >
							<input type="file" id="file" style="display:none;" />
							<button class="btn-container_imm" id="button" name="button" value="Upload" onclick="thisFileUpload();"><i class="fa fa-pencil" aria-hidden="true"></i> Modifica immagine</button>
						</div>
						<p style=" color: #2b5164; font-size: 16px;">Modifica password: </p>
						<div><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="Nuova password" rows="1"  class="modifica-password"></textarea ></div>
						<div><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="Conferma password" rows="1"  class="modifica-password"></textarea ></div>
					</div>
					<div class="col-sm-8" >
						<textarea name="text"  placeholder="E-mail: " rows="1" disabled class="profilo-name"></textarea ><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="nomeutente@mail.com" rows="1"  class="profilo-data"></textarea >
						<textarea name="text"  placeholder="Nome: " rows="1" disabled class="profilo-name"></textarea ><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="Nome" rows="1"  class="profilo-data"></textarea >
						<textarea name="text"  placeholder="Cognome: " rows="1" disabled class="profilo-name"></textarea ><i class="fa fa-pencil marginematita" aria-hidden="true" style="margin-right: 10px;"></i><textarea name="text"  placeholder="Cognome" rows="1"  class="profilo-data"></textarea >

						<textarea name="text"  placeholder="FC: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="Codice fiscale" rows="1"  class="profilo-data"></textarea>
						<textarea name="text"  placeholder="Via: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="via" rows="1"  class="profilo-data"></textarea>
						<textarea name="text"  placeholder="N° civico: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="N° civico" rows="1" class="profilo-data"></textarea>
						<textarea name="text"  placeholder="CAP: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="CAP" rows="1" class="profilo-data"></textarea>
						<textarea name="text"  placeholder="Comune: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="Comune" rows="1" class="profilo-data"></textarea>
						<textarea name="text"  placeholder="Provincia: " rows="1" disabled class="profilo-name"></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="Provincia" rows="1"  class="profilo-data"></textarea>
						<textarea name="text"  placeholder="Regione: " rows="1" disabled class="profilo-name "></textarea><i class="fa fa-pencil marginematita" aria-hidden="true" ></i><textarea name="text"  placeholder="Regione" rows="1"  class="profilo-data"></textarea>

						<button type="submit"  onclick="btnConferma('modifica')" class="btn btn-profilo pull-right btn-salvamodifiche" ><i class="fa fa-check" aria-hidden="true"></i>  Salva le modifiche</button>
						<div id="modifica" class="modal">
							<form class="modal-content popup-modal-content">
								<div class="container popup-conferma">
									<h4>Modifica profilo</h4>
									<p>Stai per modificare il tuo profilo.</p>
									<p>Sei sicur* di voler proseguire?</p>
									<div class="clearfix">
										<button type="button" onclick="document.getElementById('modifica').style.display='none'" class="popup-btn deletebtn">Conferma</button>
										<button type="button" onclick="document.getElementById('modifica').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
									</div>
								</div>
							</form>
						</div>
						<button type="submit"  onclick="btnConferma('elimina')" class="btn btn-profilo pull-right btn-eliminautente" ><i class="fa fa-trash-o" aria-hidden="true"></i> Elimina utente</button>
						<div id="elimina" class="modal">
							<form class="modal-content popup-modal-content">
								<div class="container popup-conferma">
									<h4>Elimina profilo</h4>
									<p>Stai per eliminare il tuo profilo.</p>
									<p>Sei sicur* di voler proseguire?</p>
									<div class="clearfix">
										<button type="button" onclick="document.getElementById('elimina').style.display='none'" class="popup-btn deletebtn">Conferma</button>
										<button type="button" onclick="document.getElementById('elimina').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--ACQUIRENTE-->
				<!--ANNUNCI OSSERVATI-->
				<div class="col-sm-9 padding-right" id='annunciOsservati'>
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center"><span class="title-span">Annunci osservati</span></h2>
                            <?php
                                annunciOsservatiUtente($cid);
                            ?>
					</div><!--features_items-->
				</div>

				<!--I MIEI ACQUISTI-->
				<div class="col-sm-9 padding-right" id='listaAcquistati'>
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center"><span class="title-span">I miei acquisti</span></h2>
                        <?php
                            acquistiUtente($cid);
                        ?>

					</div><!--features_items-->
				</div>

				<!--RICHIESTE ACQUISTO-->
				<div class="col-sm-9 padding-right" id='richiesteAcquisto'>
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center"><span class="title-span">Richieste di acquisto</span></h2>
						<div class="col-sm-12">
							<div class="product-image-wrapper" >
								<table style="width: 100%;">
									<thead>
										<tr class="cart_menu cart-color-richieste " >
											<td class="image" >Annuncio</td>
											<td class="description"></td>
											<td class="price">Venditore</td>
											<td class="quantity">Prezzo</td>
											<td class="total">Stato</td>
											<td></td>
										</tr>
									</thead>
									<tbody style="width: 100%;">
                                    <?php
                                        richiesteAcquistoUtente($cid);
                                    ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--FINE ACQUIRENTE-->

				<!--VENDITORE-->
				<!--Le mie vendire-->
				<div class="col-sm-9 padding-right" id='mievendite'>
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center"><span class="title-span">Le mie vendite</span></h2>
                        <?php
                            leMieVendite($cid);
                        ?>

					</div>
				</div>

				<!--RISPOSTE AGLI ANNUNCI-->
				<div class="col-sm-9 padding-right" id='risposte'>
					<div class="features_items" >
						<h2 class="title text-center"><span class="title-span">Risposte ai miei annunci</span></h2>
                        <?php
                        risposteAnnunci($cid);
                        ?>
					</div>
				</div>
				<!--annunci pubblicati-->
				<div class="col-sm-9 padding-right" id='annunciPubblicati'>
					<div class="features_items">
						<h2 class="title text-center"><span class="title-span">Annunci pubblicati</span></h2>
                        <?php
                            annunciPubblicati($cid);
                        ?>
					</div>
				</div>
				<!--FINE ACQUIRENTE -->
			</div>
		</div>
	</section>

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

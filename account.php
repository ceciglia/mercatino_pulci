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
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#venditore">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Venditore
										</a>
									</h4>
								</div>
								<div id="venditore" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav sottomenu_profilo">    
											<li><a href="pubblicaAnnuncio.html"><i class="fa fa-plus-square" aria-hidden="true"></i><b>  Nuovo annuncio</b></a></li>
											<li><a href="#" onclick="opensottomenu(event, 'annunciPubblicati')">Annunci pubblicati</a></li>
											<li><a href="#" onclick="opensottomenu(event, 'mievendite')" >Le mie vendite</a></li>
											<li><a href="#" onclick="opensottomenu(event, 'risposte')" >Risposte ai miei annunci</a></li>
										</ul>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#acquirente">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Acquirente
										</a></h4>
									</div>
								</div>
								<div id="acquirente" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="nav navbar-nav sottomenu_profilo" >    
												<li><a href="#" onclick="opensottomenu(event, 'annunciOsservati')">Annunci osservati</a></li>
												<li><a href="#" onclick="opensottomenu(event, 'listaAcquistati')">I miei acquisti</a></li>
												<li><a href="#" onclick="opensottomenu(event, 'richiesteAcquisto')">Richieste di acquisto</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div> 
				<!--PROFILO-->
				<div class="col-sm-9 padding-right" id='profilo'>
					<div class="features_items" >
						<h2 class="title text-center"><span class="title-span">PROFILO</span></h2>
					</div>
					<p class="p_benvenuto" >Ciao Mitic*!</p>
					<div class="col-sm-4">
						<div class="product-image-wrapper-profilo" >
							<div class="single-products">
								<img src="images/home/product1.jpg" alt="" class="immagine-profilo" />		
							</div>
						</div>
						<p class="valutazione-profilo">Valutazione: </p>
						<div class="stelle-valutazione-profilo">
							<i class="fa fa-star" aria-hidden="true" ></i>
							<i class="fa fa-star" aria-hidden="true" ></i>
							<i class="fa fa-star" aria-hidden="true" ></i>
							<i class="fa fa-star" aria-hidden="true" ></i>
							<i class="fa fa-star-half-o" aria-hidden="true" class="stelle-valutazione-profilo"></i>
						</div>
						<div style="margin-bottom: 30px;">
							<button type="submit" class="btn btn-profilo pull-left btn-a-v" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>   Acquirente</button>
							<button type="submit" class="btn btn-profilo pull-right btn-a-v" ><i class="fa fa-credit-card" aria-hidden="true"></i>   Venditore</button>
						</div>
					</div>
					<div class="col-sm-8" >
						<textarea name="text"  placeholder="E-mail: " rows="1" disabled class="profilo-name"></textarea ><textarea name="text"  placeholder="nomeutente@mail.com" rows="1" disabled class="profilo-data"></textarea >
						<textarea name="text"  placeholder="Nome: " rows="1" disabled class="profilo-name"></textarea ><textarea name="text"  placeholder="Nome" rows="1" disabled class="profilo-data"></textarea >
						<textarea name="text"  placeholder="Cognome: " rows="1" disabled class="profilo-name"></textarea ><textarea name="text"  placeholder="Cognome" rows="1" disabled class="profilo-data"></textarea >
						
						<textarea name="text"  placeholder="CF: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  placeholder="Codice fiscale" rows="1" disabled class="profilo-data"></textarea> 
						<textarea name="text"  placeholder="Via: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  placeholder="via" rows="1" disabled class="profilo-data"></textarea> 
						<textarea name="text"  placeholder="N° civico: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  placeholder="N° civico" rows="1" disabled class="profilo-data"></textarea> 
						<textarea name="text"  placeholder="CAP: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  placeholder="CAP" rows="1" disabled class="profilo-data"></textarea> 
						<textarea name="text"  placeholder="Comune: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  placeholder="Comune" rows="1" disabled class="profilo-data"></textarea> 
						<textarea name="text"  placeholder="Provincia: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  placeholder="Provincia" rows="1" disabled class="profilo-data"></textarea> 
						<textarea name="text"  placeholder="Regione: " rows="1" disabled class="profilo-name"></textarea><textarea name="text"  placeholder="Regione" rows="1" disabled class="profilo-data"></textarea> 
						
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
						<div class="col-sm-4" >
							<div class="product-image-wrapper" >
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/bialettiMoka.jpg" alt="" />
										</div>
										<h2>€ 22.89</h2>
										<p>Bialetti Moka express</p>
									
									</div>
									
									<div  class="product-overlay">
										<div class="overlay-content">
											<a  class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>			<!--<i class="fa fa-shopping-cart"></i>   id="myBtn"-->
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a class="btn btn-default add-to-cart account-click valuta-btn" data-toggle="collapse" data-parent="#accordian" href="#richiestaA"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Invia richiesta di acquisto</a></li>
										<div id="richiestaA" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav sottomenu_profilo sottomenu-osservati" >    
													<div >
														<p><b>Metodo di pagamento: </b></p>
													    <div class="demo-content">
															<div class="metodop">
																<ul	class="nav paddingsinistra" >
																	<input name="metodop" type="radio" id="carta" value="1" />
																	<label for="carta" style="display: inline-block;"><p >Carta di credito</p></label>
																	<input name="metodop" type="radio" id="contanti" value="2" />
																	<label for="contanti" style="display: inline-block;"><p >Contanti alla consegna</p></label>
																</ul>
															</div>
														</div>

														<button type="submit" class="btn pull-left btn-profilo" onclick="btnConferma('id02')"><i class="fa fa-check" aria-hidden="true"></i> Conferma</button>
															<div id="id02" class="modal">
																<form class="modal-content popup-modal-content">
																	<div class="container popup-conferma">
																		<h4>Metodo di pagamento</h4>
																		<p>Stai per confermare il metodo di pagamento.</p> 
																		<p>Sei sicur* di voler proseguire?</p>
																		
																		<div class="clearfix">
																			<button type="button" onclick="document.getElementById('id02').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																			<button type="button" onclick="document.getElementById('id02').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																		</div>
																	</div>
																</form>
															</div>
													</div>
												</ul>
											</div>					
										</div>
									</ul>
								</div>
							</div>
						</div>

					</div><!--features_items-->
				</div>

				<!--I MIEI ACQUISTI-->
				<div class="col-sm-9 padding-right" id='listaAcquistati'>
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center"><span class="title-span">I miei acquisti</span></h2> 
						<div class="col-sm-4" >
							<div class="product-image-wrapper" >
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/tostapane_smeg.jpg" alt="" />
										</div>
										<h2>€ 50</h2>
										<p>Tostapane Smeg</p>
									
									</div>
									<div  class="product-overlay">
										<div class="overlay-content">
											<a  class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>			<!--<i class="fa fa-shopping-cart"></i>   id="myBtn"-->
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a class="btn btn-default add-to-cart account-click valuta-btn" data-toggle="collapse" data-parent="#accordian" href="#valutaV"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Valuta venditore</a></li>
										<div id="valutaV" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav sottomenu_profilo sottomenu-osservati">    
													<div>
														<p>Valuta la <b >serietà</b> :</p>
														<div class="demo-content">
															<div class="serieta">
																<input name="serieta" type="radio" id="stellaV1" value="1" />
																<label for="stellaV1"></label>
															
																<input name="serieta" type="radio" id="stellaV2" value="2" />
																<label for="stellaV2"></label>
															
																<input name="serieta" type="radio" id="stellaV3" value="3" />
																<label for="stellaV3"></label>
															
																<input name="serieta" type="radio" id="stellaV4" value="4" />
																<label for="stellaV4"></label>
															
																<input name="serieta" type="radio" id="stellaV5" value="5" checked />
																<label for="stellaV5"></label>
																
															</div>
														</div>
														<p>Valuta la <b >puntualità</b> :</p>
														<div class="demo-content">
															<div class="puntualita">
																<input name="puntualita" type="radio" id="stellaV6" value="1" />
																<label for="stellaV6"></label>
															
																<input name="puntualita" type="radio" id="stellaV7" value="2" />
																<label for="stellaV7"></label>
															
																<input name="puntualita" type="radio" id="stellaV8" value="3" />
																<label for="stellaV8"></label>
															
																<input name="puntualita" type="radio" id="stellaV9" value="4" />
																<label for="stellaV9"></label>
															
																<input name="puntualita" type="radio" id="stellaV10" value="5" checked />
																<label for="stellaV10"></label>
																
															</div>
															<button type="submit" class="btn pull-left btn-profilo" onclick="btnConferma('id04')"><i class="fa fa-check" aria-hidden="true"></i> Conferma</button>
																<div id="id04" class="modal">
																	<form class="modal-content popup-modal-content">
																		<div class="container popup-conferma">
																			<h4>Valutazione</h4>
																			<p>Stai per confermare la valutazione.</p> 
																			<p>Sei sicur* di voler proseguire?</p>
																			
																			<div class="clearfix">
																				<button type="button" onclick="document.getElementById('id04').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																				<button type="button" onclick="document.getElementById('id04').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																			</div>
																		</div>
																	</form>
																</div>
														</div>
													</div>
												</ul>
											</div>					
										</div>						
									</ul>
								</div>
							</div>
						</div>
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
										<tr>
											<td class="cart_product">
												<a href=""><img src="images/mercatino/bialettiMoka.jpg"  alt="" class="imm-richieste" ></a>
											</td>
											<td class="cart_description blu">
												<h4><a href="" >Nome Annuncio</a></h4>

												<p class="richieste-responsive"><b>ID annuncio:</b></p><p style="display: inline-block">1111111</p>
											</td>
											<td class="cart_price blu">
												<p class="richieste-responsive"><b>Venditore:</b></p><p style="display: inline-block; ">Nome venditore</p>
											</td>
											<td class="cart_price blu">
												<p class="richieste-responsive"><b>Prezzo:</b></p><p style="display: inline-block;">50 €</p>
											</td>
										
											<td class="cart_total blu">
												<p class="richieste-responsive"><b>Stato:</b></p><p class="cart_total_price blu" style="display: inline-block; ">In elaborazione</p>
											</td>
											
										</tr>
										<tr>
											<td class="cart_product">
												<a href=""><img src="images/mercatino/borsa_chanel.jpg"  alt="" class="imm-richieste" ></a>
											</td>
											<td class="cart_description blu">
												<h4><a href="" >Nome Annuncio</a></h4>

												<p class="richieste-responsive"><b>ID annuncio:</b></p><p style="display: inline-block">1111111</p>
											</td>
											<td class="cart_price blu">
												<p class="richieste-responsive"><b>Venditore:</b></p><p style="display: inline-block; ">Nome venditore</p>
											</td>
											<td class="cart_price blu">
												<p class="richieste-responsive"><b>Prezzo:</b></p><p style="display: inline-block;">50 €</p>
											</td>
										
											<td class="cart_total blu">
												<p class="richieste-responsive"><b>Stato:</b></p><p class="cart_total_price blu" style="display: inline-block; ">In elaborazione</p>
											</td>
											
										</tr>
										<tr>
											<td class="cart_product">
												<a href=""><img src="images/mercatino/gameboy.jpeg"  alt="" class="imm-richieste" ></a>
											</td>
											<td class="cart_description blu">
												<h4><a href="" >Nome Annuncio</a></h4>

												<p class="richieste-responsive"><b>ID annuncio:</b></p><p style="display: inline-block">1111111</p>
											</td>
											<td class="cart_price blu">
												<p class="richieste-responsive"><b>Venditore:</b></p><p style="display: inline-block; ">Nome venditore</p>
											</td>
											<td class="cart_price blu">
												<p class="richieste-responsive"><b>Prezzo:</b></p><p style="display: inline-block;">50 €</p>
											</td>
										
											<td class="cart_total blu">
												<p class="richieste-responsive"><b>Stato:</b></p><p class="cart_total_price blu" style="display: inline-block; ">In elaborazione</p>
											</td>
											
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!--FINE ACQUIRENTE-->

				<!--VENDITORE-->
				<!--VALUTAZIONI-->
				<div class="col-sm-9 padding-right" id='mievendite'>
					<div class="features_items" ><!--features_items-->
						<h2 class="title text-center"><span class="title-span">Le mie vendite</span></h2>
						<div class="col-sm-4" >
							<div class="product-image-wrapper" >
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/borsa_chanel.jpg" alt="" />
										</div>
										<h2>€ 700</h2>
										<p>Borsa vintage chanel</p>
									
									</div>
									<div  class="product-overlay">
										<div class="overlay-content">
											<a  class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>			<!--<i class="fa fa-shopping-cart"></i>   id="myBtn"-->
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a class="btn btn-default add-to-cart account-click valuta-btn" data-toggle="collapse" data-parent="#accordian" href="#valutaA"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Valuta acquirente</a></li>
										<div id="valutaA" class="panel-collapse collapse">
											<div class="panel-body">
												<ul class="nav navbar-nav sottomenu_profilo sottomenu-vendite" >    
													<div>
														<p>Valuta la <b >serietà</b> :</p>
														<div class="demo-content">
															<div class="serieta">
																<input name="serieta" type="radio" id="stellaA1" value="1" />
																<label for="stellaA1"></label>
															
																<input name="serieta" type="radio" id="stellaA2" value="2" />
																<label for="stellaA2"></label>
															
																<input name="serieta" type="radio" id="stellaA3" value="3" />
																<label for="stellaA3"></label>
															
																<input name="serieta" type="radio" id="stellaA4" value="4" />
																<label for="stellaA4"></label>
															
																<input name="serieta" type="radio" id="stellaA5" value="5" checked />
																<label for="stellaA5"></label>
															</div>
														</div>
														<p>Valuta la <b >puntualità</b> :</p>
														<div class="demo-content">
															<div class="puntualita">
																<input name="puntualita" type="radio" id="stellaA6" value="1" />
																<label for="stellaA6"></label>
															
																<input name="puntualita" type="radio" id="stellaA7" value="2" />
																<label for="stellaA7"></label>
															
																<input name="puntualita" type="radio" id="stellaA8" value="3" />
																<label for="stellaA8"></label>
															
																<input name="puntualita" type="radio" id="stellaA9" value="4" />
																<label for="stellaA9"></label>
															
																<input name="puntualita" type="radio" id="stellaA10" value="5" checked />
																<label for="stellaA10"></label>
														</div>
														<button type="submit" class="btn pull-left btn-profilo" onclick="btnConferma('id01')"><i class="fa fa-check" aria-hidden="true"></i> Conferma</button>
														<div id="id01" class="modal">
															<form class="modal-content popup-modal-content">
																<div class="container popup-conferma">
																	<h4>Valutazione</h4>
																	<p>Stai per confermare la valutazione.</p> 
																	<p>Sei sicur* di voler proseguire?</p>
																	
																	<div class="clearfix">
																		<button type="button" onclick="document.getElementById('id01').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																		<button type="button" onclick="document.getElementById('id01').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																	</div>
																</div>
															</form>
														</div>										
													</div>
												</ul>
											</div>					
										</div>						
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--RISPOSTE AGLI ANNUNCI-->
				<div class="col-sm-9 padding-right" id='risposte'>
					<div class="features_items" >
						<h2 class="title text-center"><span class="title-span">Risposte ai miei annunci</span></h2>
						<div class="col-sm-12">
							<div class="product-image-wrapper" >
								<div class="single-products">
									<table>
										<tr>
											<th><img src="images/mercatino/taylorGSmini.jpg" alt="" style="width: 130px; margin: 10px;" /></th>
											<th>
												<p>Taylor GS Mini</p>
												<p>ID: 111</p>
											</th>
										</tr>
									</table>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#annuncio1"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i>Hai 3 richieste d'acquisto</a></li>
										<div id="annuncio1" class="panel-collapse collapse">
											<div class="panel-body ">
												<table class="table-risposte">
													<theadb>
														<tr class="cart_menu cart-color-richieste" >
															<td class="image" >Acquirente</td>
															<td class="description"></td> 
															<td class="price">Metodo di pagamento</td>
															<td class="total">Stato</td>
															<td></td>
														</tr>
													</thead>
											
													<tbody classe="table-risposte">
														<tr >
															<td class="cart_product">
																<a href=""><img src="images/home/gallery3.jpg"  alt="" class="imm-richieste" ></a>
															</td>
															<td class="cart_description">
																<h4><a href="">Nome Cognome</a></h4>
																<p class="richieste-responsive"><b>Email: </b></p><p style="display: inline-block;">acquirente@mail.com</p>
															</td>
															<td class="cart_price">
																<p class="richieste-responsive"><b>Metodo di pagamento: </b></p><p style="display: inline-block;">Carta di credito</p>
															</td>
															
															<td class="cart_total">
																<p class="richieste-responsive"><b>Stato: </b></p><p class="cart_total_price" style="display: inline-block;">In elaborazione</p>
															</td>
															<td class="cart_delete approvato">
																<a class="cart_quantity_delete" onclick="btnConferma('thumb1a')"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
																<div id="thumb1a" class="modal">
																	<form class="modal-content popup-modal-content">
																		<div class="container popup-conferma">
																			<h4>Risposte ai miei annunci</h4>
																			<p>Stai per CONFERMARE la richiesta d'acquisto.</p> 
																			<p>Sei sicur* di voler proseguire?</p>
																			
																			<div class="clearfix">
																				<button type="button" onclick="document.getElementById('thumb1a').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																				<button type="button" onclick="document.getElementById('thumb1a').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																			</div>
																		</div>
																	</form>
																</div>
																<a class="cart_quantity_delete" onclick="btnConferma('thumb1b')"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i></a>
																<div id="thumb1b" class="modal">
																	<form class="modal-content popup-modal-content">
																		<div class="container popup-conferma">
																			<h4>Risposte ai miei annunci</h4>
																			<p>Stai per RIFIUTARE la richiesta d'acquisto.</p> 
																			<p>Sei sicur* di voler proseguire?</p>
																			
																			<div class="clearfix">
																				<button type="button" onclick="document.getElementById('thumb1b').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																				<button type="button" onclick="document.getElementById('thumb1b').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																			</div>
																		</div>
																	</form>
																</div>
															</td>
														</tr>
														<tr>
															<td class="cart_product">
																<a href=""><img src="images/home/gallery4.jpg"  alt="" class="imm-richieste" ></a>
															</td>
															<td class="cart_description">
																<h4><a href="">Nome Cognome</a></h4>
																<p class="richieste-responsive"><b>Email: </b></p><p style="display: inline-block;">acquirente@mail.com</p>
															</td>
															<td class="cart_price">
																<p class="richieste-responsive"><b>Metodo di pagamento: </b></p><p style="display: inline-block;">Carta di credito</p>
															</td>
															
															<td class="cart_total">
																<p class="richieste-responsive"><b>Stato: </b></p><p class="cart_total_price" style="display: inline-block;">In elaborazione</p>
															</td>
															<td class="cart_delete approvato">
																<a class="cart_quantity_delete" onclick="btnConferma('thumb2a')"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
																	<div id="thumb2a" class="modal">
																		<form class="modal-content popup-modal-content">
																			<div class="container popup-conferma">
																				<h4>Risposte ai miei annunci</h4>
																				<p>Stai per CONFERMARE la richiesta d'acquisto.</p> 
																				<p>Sei sicur* di voler proseguire?</p>
																				
																				<div class="clearfix">
																					<button type="button" onclick="document.getElementById('thumb2a').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																					<button type="button" onclick="document.getElementById('thumb2a').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																				</div>
																			</div>
																		</form>
																	</div>
																<a class="cart_quantity_delete" onclick="btnConferma('thumb2b')"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i></a>
																<div id="thumb2b" class="modal">
																	<form class="modal-content popup-modal-content">
																		<div class="container popup-conferma ">
																			<h4>Risposte ai miei annunci</h4>
																			<p>Stai per RIFIUTARE la richiesta d'acquisto.</p> 
																			<p>Sei sicur* di voler proseguire?</p>
																			<div class="clearfix">
																				<button type="button" onclick="document.getElementById('thumb2b').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																				<button type="button" onclick="document.getElementById('thumb2b').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																			</div>
																		</div>
																	</form>
																</div>
															</td>
														</tr>
														<tr>
															<td class="cart_product">
																<a href=""><img src="images/home/gallery2.jpg"  alt="" class="imm-richieste" ></a>
															</td>
															<td class="cart_description">
																<h4><a href="">Nome Cognome</a></h4>
																<p class="richieste-responsive"><b>Email: </b></p><p style="display: inline-block;">acquirente@mail.com</p>
															</td>
															<td class="cart_price">
																<p class="richieste-responsive"><b>Metodo di pagamento: </b></p><p style="display: inline-block;">Carta di credito</p>
															</td>
															
															<td class="cart_total">
																<p class="richieste-responsive"><b>Stato: </b></p><p class="cart_total_price" style="display: inline-block;">In elaborazione</p>
															</td>
															<td class="cart_delete approvato">
																<a class="cart_quantity_delete" onclick="btnConferma('thumb3a')"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
																	<div id="thumb3a" class="modal">
																		<form class="modal-content popup-modal-content">
																			<div class="container popup-conferma">
																				<h4>Risposte ai miei annunci</h4>
																				<p>Stai per CONFERMARE la richiesta d'acquisto.</p> 
																				<p>Sei sicur* di voler proseguire?</p>
																				
																				<div class="clearfix">
																					<button type="button" onclick="document.getElementById('thumb3a').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																					<button type="button" onclick="document.getElementById('thumb3a').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																				</div>
																			</div>
																		</form>
																	</div>
																<a class="cart_quantity_delete" onclick="btnConferma('thumb3b')"><i class="fa fa-thumbs-down" aria-hidden="true"></i></i></a>
																	<div id="thumb3b" class="modal">
																		<form class="modal-content popup-modal-content">
																			<div class="container popup-conferma">
																				<h4>Risposte ai miei annunci</h4>
																				<p>Stai per RIFIUTARE la richiesta d'acquisto.</p> 
																				<p>Sei sicur* di voler proseguire?</p>
																				
																				<div class="clearfix">
																					<button type="button" onclick="document.getElementById('thumb3b').style.display='none'" class="popup-btn deletebtn">Conferma</button>
																					<button type="button" onclick="document.getElementById('thumb3b').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
																				</div>
																			</div>
																		</form>
																	</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--annunci pubblicati-->
				<div class="col-sm-9 padding-right" id='annunciPubblicati'>
					<div class="features_items">
						<h2 class="title text-center"><span class="title-span">Annunci pubblicati</span></h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/taylorGSmini.jpg" alt="" />
										</div>
										<h2>€ 600</h2>
										<p>Taylor GS Mini</p>
									
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified blu">
										<li><a href="modificaAnnuncio.html"><i class="fa fa-pencil" aria-hidden="true"></i> Modifica</a></li>
									</ul>
								</div>
							</div>
						</div>
				
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

</body>
</html>
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

                    <?php
                        modificaProfilo($cid);
                    ?>
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
    <script>
        document.getElementById("reg").addEventListener("focus", function(){
            popolaRegioni("reg");
        });
        document.getElementById("reg").addEventListener("change", function(){
            popolaProvince("reg","prov");
        });
        document.getElementById("prov").addEventListener("change", function(){
            popolaComuni("prov","com");
        });
    </script>

</body>
</html>

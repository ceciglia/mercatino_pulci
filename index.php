<?php
	session_start();
	include "common/connessione.php";
	include "common/funzioniFR.php";
?>

<!DOCTYPE html>
<html lang="en">
	<?php include "common/head.php";?>

<body>
	<?php include "common/navbar.php";?>	<!--NAVBAR PRINCIPALE-->

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-9 index-benvenuto">
									<h1>Benvenut* in <span>FR</span> Market</h1>
									<p>Scorri per scoprire di più! </p>
									<a href="registrazione.php"><button type="button" class="btn btn-default get">Registrati subito</button></a>
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>FR</span> Market</h1>
									<h2>100% Made in Italy</h2>
									<p class="slider-index">Prodotti made in Italy per ogni esigenza</p>

								</div>

							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>FR</span> Market</h1>
									<h2>Nuovo e usato</h2>
									<p class="slider-index">Prodotti nuovi e usati a tutti i prezzi</p>
								</div>
							</div>
						</div>
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
				<div class="col-sm-3 pull-right search2-margin">
					<div class="search_box pull-right" id=search_2>
						<input type="text" placeholder="Search"/>
					</div>
				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2><span class="title-span">Categoria</span></h2>
						<div class="panel-group category-products" id="accordian"><!--category-products-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#elettrodomestici">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											ELETTRODOMESTICI
										</a>
									</h4>
								</div>
								<div id="elettrodomestici" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a class="account-click" href="#">Aspirapolveri </a></li>
											<li><a class="account-click" href="#">Caffettiere </a></li>
											<li><a class="account-click" href="#">Tostapane </a></li>
											<li><a class="account-click" href="#">Frullatori</a></li>
											<li><a class="account-click" href="#">Altro </a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#fotoevideo">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Foto e video
										</a>
									</h4>
								</div>
								<div id="fotoevideo" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a class="account-click" href="#">Macchine fotografiche</a></li>
											<li><a class="account-click" href="#">Accessori</a></li>
											<li><a class="account-click" href="#">Telecamere</a></li>
											<li><a class="account-click" href="#">Microfoni</a></li>
											<li><a class="account-click" href="#">Altro</a></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#abbigliamento">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Abbigliamento
										</a>
									</h4>
								</div>
								<div id="abbigliamento" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a class="account-click" href="#">Vestiti</a></li>
											<li><a class="account-click" href="#">Borse</a></li>
											<li><a class="account-click" href="#">Scarpe</a></li>
											<li><a class="account-click" href="#">Accessori</a></li>
											<li><a class="account-click" href="#">Altro</a></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="account-click" data-toggle="collapse" data-parent="#accordian" href="#hobby">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											Hobby
										</a>
									</h4>
								</div>
								<div id="hobby" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
											<li><a class="account-click" href="#">Giocattoli</a></li>
											<li><a class="account-click" href="#">Film e DVD</a></li>
											<li><a class="account-click" href="#">Musica</a></li>
											<li><a class="account-click" href="#">Libri e riviste</a></li>
											<li><a class="account-click" href="#">Altro</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div><!--/category-products-->

						<div class="price-range adattivo">
							<h2><span class="title-span">Area Geografica</span></h2>    <!-- filtro comune provincia regione -->
							<div class="well text-center">
								<?php include "frontend/areaGeografica.php";?>
							</div>
						</div>				<!-- /filtro comune provincia regione -->

						<div class="price-range adattivo">		<!-- price-range -->
							<h2><span class="title-span">Price Range</span></h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="99999" data-slider-step="5" data-slider-value="[40000,70500]" id="sl2" ><br />
								 <b class="pull-left">0 €</b> <b class="pull-right">100000 €</b>
							</div>  <!-- /price-range -->
                            <!--bottone APPLICA-->
							<a href="index.php" class="btn btn-default add-to-cart applica-btn">Applica</a>
						</div>

					</div>
				</div>


				<div class="col-sm-9 padding-right">
					<div class="recommended_items">     <!--più osservati-->
						<h2 class="title text-center"><span class="title-span">Più osservati</span></h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner piùosservati-inner">
                                <?php
                                    getPiùOsservati($cid);
                                ?>
							</div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
						</div>
					</div>  <!--/più osservati-->


					<div class="features_items index-margin-top"><!--features_items-->
						<h2 class="title text-center"><span class="title-span">Annunci filtrati</span></h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products" >
										<div class="productinfo text-center">
											<div class="img-contenitore">
												<img src="images/mercatino/taylorGSmini.jpg" alt="" />
											</div>
											<h2>€ 600</h2>
											<p>Taylor GS mini</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>€ 600</h2>
												<p>Taylor GS mini</p>
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
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products" >
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/bialettiMoka.jpg" alt="" />
										</div>
										<h2>€ 22.89</h2>
										<p>Bialetti Moka express</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>€ 22.89</h2>
											<p>Bialetti Moka express</p>
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
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/borsa_chanel.jpg" alt="" />
										</div>
										<h2>€ 700</h2>
										<p>Borsa chanel classic</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>€ 700</h2>
											<p>Borsa chanel classic</p>
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
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/canon.jpg" alt="" />
										</div>
										<h2>€ 376.50</h2>
										<p>Macchina fotografica Canon</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>€ 376.50</h2>
											<p>Macchina fotografica Canon</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
										</div>
									</div>
									<img src="images/home/new.png" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Osservati</a></li>

									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/tostapaneSMEG.jpg" alt="" />
										</div>
										<h2>€ 70.80</h2>
										<p>Tostapane SMEG</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>€ 70.80</h2>
											<p>Tostapane SMEG</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
										</div>
									</div>
									<img src="images/home/sale.png" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Osservati</a></li>

									</ul>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<div class="img-contenitore">
											<img src="images/mercatino/scarpe.jpg" alt="" />
										</div>
										<h2>€ 120.60</h2>
										<p>Scarpe donna Dr. Martens</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2>€ 120.60</h2>
											<p>Scarpe donna Dr. Martens</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Osservati</a></li>
										<!-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li> -->
									</ul>
								</div>
							</div>
						</div>

					</div><!--features_items-->

					<div class="category-tab"><!--category-tab-->
						<h2 class="title text-center index-margin-top"><span class="title-span">Venditori TOP</span></h2>
					</div>		<!--/category-tab-->
					<div>
						<ul class="nav nav-tabs tab-menu" id="myTab" role="tablist">
							<li class="nav-item">
								<a id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">
									<div class="col-sm-3 clickable">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center user-information">
													<img src="images/home/gallery1.jpg" alt="" />
													<h2>Nome Cognome 1</h2>
													<p>nomecognome@top.it</p>
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
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
									<div class="col-sm-3 clickable">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center user-information">			<!--user-information-->
													<img src="images/home/gallery2.jpg" alt="" />
													<h2>Nome Cognome 2</h2>
													<p>nomecognome1@top.it</p>
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
							</li>
							<li class="nav-item">
								<a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">
									<div class="col-sm-3 clickable">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center user-information">				<!--user-information-->
													<img src="images/home/gallery3.jpg" alt="" />
													<h2>Nome Cognome 3</h2>
													<p>nomecognome2@top.it</p>
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
							</li>
							<li class="nav-item">
								<a class="nav-link disabled" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false" aria-disabled="true"  tabindex="-1">
									<div class="col-sm-3 clickable">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center user-information">		<!--user-information-->
													<img src="images/home/gallery4.jpg" alt="" />
													<h2>Nome Cognome 4</h2>
													<p>nomecognome3@top.it</p>
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
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div class="tab-pane p-4 fade" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
								<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">Venditore TOP 1</span></h2>

								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/campanini_carboni.jpg" alt="" />
												</div>
												<h2>€ 83.50</h2>
												<p>Dizionario di latino Campanini-Carboni</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 83.50</h2>
													<p>Dizionario di latino Campanini-Carboni</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/treppiede.jpg" alt="" />
												</div>
												<h2>€ 9.99</h2>
												<p>Treppiede universale cavalletto octupus</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 9.99</h2>
													<p>Treppiede universale con cavalletto octupus</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/vans.jpg" alt="" />
												</div>
												<h2>€ 44.75</h2>
												<p>Vans Atwood Canvas Trainers Black</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 44.75</h2>
													<p>Vans Atwood Canvas Trainers Black</p>
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
								</div>
							</div>

							<div class="tab-pane p-4 fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
								<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">Venditore TOP 2</span></h2>

								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/aspirapolvere_hoover.jpg" alt="" />
												</div>
												<h2>€ 69.98</h2>
												<p>HOOVER Aspirapolvere a Traino Ciclonico</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 69.98</h2>
													<p>HOOVER Aspirapolvere a Traino Ciclonico</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/citta_incantata_dvd.jpg" alt="" />
												</div>
												<h2>€ 8.49</h2>
												<p>La città incantata Hayao Miyazaki (dvd)</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 8.49</h2>
													<p>La città incantata Hayao Miyazaki (dvd)</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/frullatore.jpg" alt="" />
												</div>
												<h2>€ 119</h2>
												<p>Frullatore Professionale Ad Alta Velocità</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 119</h2>
													<p>Frullatore Professionale Ad Alta Velocità</p>
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
								</div>
							</div>
							<div class="tab-pane p-4 fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
								<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">Venditore TOP 3</span></h2>

								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/shure_sm57.jpg" alt="" />
												</div>
												<h2>€ 99</h2>
												<p>SHURE SM57</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 99</h2>
													<p>SHURE SM57</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/tostapane_smeg.jpg" alt="" />
												</div>
												<h2>€ 148.84</h2>
												<p>Smeg TSF01RDEU Tostapane 2 fette rosso</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 148.84</h2>
													<p>Smeg TSF01RDEU Tostapane 2 fette rosso</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/buzz.jpg" alt="" />
												</div>
												<h2>€ 17.99</h2>
												<p>Toy Story - Disney Pixar Buzz Lightyear</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 17.99</h2>
													<p>Toy Story - Disney Pixar Buzz Lightyear</p>
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
								</div>
							</div>
							<div class="tab-pane p-4 fade" id="tab4" role="tabpanel" aria-labelledby="tab3-tab">
								<h2 class="title text-center index-margin-top testo-normale"><span class="title-span">Venditore TOP 4</span></h2>

								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/genesis_salgado.jpg" alt="" />
												</div>
												<h2>€ 57</h2>
												<p>Genesis - Sebastião Salgado (Ediz. inglese)</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 57</h2>
													<p>Genesis - Sebastião Salgado (Ediz. inglese)</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/capitale_umano_dvd.jpg" alt="" />
												</div>
												<h2>€ 6.99</h2>
												<p>Il Capitale Umano - Paolo Virzì</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 6.99</h2>
													<p>Il Capitale Umano - Paolo Virzì</p>
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
								</div>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center annunci-vtop">
												<div class="img-contenitore">
													<img src="images/mercatino/barbie_magia_feste.jpg" alt="" />
												</div>
												<h2>€ 53.99</h2>
												<p>Barbie Magia delle Feste 2020</p>
												<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-info-circle" aria-hidden="true"></i>Dettagli annuncio</a>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2>€ 53.99</h2>
													<p>Barbie Magia delle Feste 2020</p>
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
								</div>
							</div>
						</div>
					</div>
					<!--FINE TAB prova-->
				</div>
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
	<script src="js/tendinalogin.js"></script>		<!--aggiunta-->
	<script>
        window.addEventListener("DOMContentLoaded", function(){
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

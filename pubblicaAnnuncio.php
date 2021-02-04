<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mercatino delle pulci</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/account.css" rel="stylesheet">
	<link href="css/registraAnnuncio.css" rel="stylesheet">

	<link rel="shortcut icon" href="images/ico/logo5.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img class="logo-image" src="images/home/logo_transparent.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">

						<div class="navbar-header">
							<div class="search_box pull-left" id=search_1 >
								<input type="text" placeholder="Search"/>
							</div>
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>


						<div class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="account.html"><i class="fa fa-user"></i> Account</a></li>
								<li><a href="#"><i class="fa fa-lock"></i> Logout</a></li>
								<li><a class="notification-bell"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

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
                <p class="title-3">Inserisci lo stato di usura: </p>
                <?php include "statoUsura.php";?>
                <br>
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

							<?php include "selectCategoria.php";?>

							<p class="title-3">Inseire la collocazione geografica: </p>

							<?php include "areaGeografica.php";?>

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

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="single-widget">
							<h2>Contatti</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a class="info-footer" href="#"><b>Per ulteriori informazioni:</b></a></li>
								<li><a href="#">anna.fusari@studenti.unimi.it</a></li>
								<li><a href="#">cecilia.rossi4@studenti.unimi.it</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-2 pull-right">
						<div class="companyinfo">
							<h2><span>FR</span> Market</h2>

						</div>
					</div>

					<div class="col-sm-3 pull-right">
						<div class="address">
							<img src="images/home/italia.png" alt="" />
							<p>20131 Milano Lambrate, Lombardia (IT)</p>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="footer-bottom">
			<div class="container">
				<div class="row copyright-style">
					<p class="pull-left">Copyright © 2021 FR Market Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a>Anna Fusari & Cecilia Rossi</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
	<script src="js/funzioni.js"></script>
    <script>

        window.addEventListener("DOMContentLoaded", function(){
            popolaCategorie("categoria");
        });
        document.getElementById("categoria").addEventListener("change", function(){
            popolaSottocategorie("categoria","sottocat");
        });
        window.addEventListener("DOMContentLoaded", function(){
            popolaRegioni("reg");
        });
        document.getElementById("reg").addEventListener("change", function(){
            popolaProvince("reg","prov");
        });
        document.getElementById("prov").addEventListener("change", function(){
            popolaComuni("prov","com");
        });

        window.addEventListener("DOMContentLoaded", function(){
            popolaUsura("usura");
        });


    </script>
</body>
</html>

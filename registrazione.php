<!DOCTYPE html> 			
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mercatino delle pulci</title>			<!--Home | E-Shopper-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/registraAnnuncio.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
	<!--<link rel="shortcut icon" href="images/ico/favicon.ico"> -->
	<link rel="shortcut icon" href="images/ico/logo5.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<?php include "php/navbar.php";?>

	<section>
		<div class="container">
			<div class="row"> 
				<h2 class="title text-center"><span class="title-span">Registrati</span></h2>
				<h2 class="insert-title" >Inserisci i tuoi dati</h2>
				<div class="col-sm-18 padding-right"> 
					<div class="features_items">
						<form action="php/registrazione.php" method="post"> 
							<div class="col-sm-4">
								<div class="container_imm">
									<img src="images/pubblicaAnnuncio.jpg" alt="Avatar"  class="immagine-r-a">
									<input type="file" id="file" class="invisibile" name='immagine'/>
									<button class="btn-container_imm" id="button" name="button" value="Upload" onclick="thisFileUpload();"> Upload</button>
								</div>
								
								<div class="under-imm">
									<p>Vuoi registrarti a FR Market come: </p>
									<span>
										<input type="checkbox" id="venditore" name="venditore" value="True">
										<label for="venditore" > Venditore </label><br>
										<input type="checkbox" id="acquirente" name="acquirente" value="True">
										<label for="acquirente"> Acquirente </label><br>
									</span>
		
								</div>

							</div> 

							<div class="col-sm-6">
								<input type="email"  placeholder="Email" rows="1" class="insert-data" name='emain'></input> 
								<input type="password"  placeholder="Password" rows="1" class="insert-data" name='psw'></input> 
								<input type="password"  placeholder="Conferma password" rows="1" class="insert-data" ></input>
								<input type="text"  placeholder="Nome" rows="1" class="insert-data" name='nome'></input> 
								<input type="text"  placeholder="Cognome" rows="1" class="insert-data" name='cognome'></input> 
								<input type="text"  placeholder="Codice fiscale" rows="1" class="insert-data" name='codFiscale'></input> 
								<input type="text"  placeholder="via" rows="1" class="insert-data" name='via'></input> 
								<input type="number"  placeholder="Numero civico" rows="1" class="insert-data n-cap" name='nCivico'></input> 
								<input type="text"  placeholder="CAP" rows="1" class="insert-data n-cap" name='CAP'></input> 
								<?php
                                // connessione al server
                                include "php/connessione.php";

                                $query_comune = "SELECT comune FROM areageografica ORDER BY comune;";
                                $res_comune = $cid->query($query_comune);
                                //or die("<p>impossibile eseguire query</p>". "<p>codice errore ". $cid->error. ": " . $cid->error . "</p");
                                $query_provincia = "SELECT DISTINCT provincia FROM areageografica ORDER BY provincia;";
                                $res_provincia = $cid->query($query_provincia);

                                $query_regione = "SELECT DISTINCT regione FROM areageografica ORDER BY regione;";
                                $res_regione = $cid->query($query_regione);
                                  //echo "la query è stata eseguita";
                                //while ($row = $res->fetch_row())

                                  echo"
                                  
								  <select class='select-data' name='regione'>
								  <option>-- Regione --</option>";
                                        while ($row_comune = $res_comune->fetch_row())
                                          echo "<option>$row_comune[0]</option>";
                                      echo"
                                    </select>
                                  
                                  <br>";

                                echo"
                                 
									<select class='select-data' name='provincia'>
									<option>-- Provincia --</option>";
                                        while ($row_provincia = $res_provincia->fetch_row())
                                          echo "<option>$row_provincia[0]</option>";
                                      echo"
                                    </select>
                                  </form>
                                  <br>";

                                  echo"
                                  
								    <select class='select-data' name='comune'>
								    <option>-- Comune --</option>";
                                        while ($row_regione = $res_regione->fetch_row())
                                          echo "<option>$row_regione[0]</option>";
                                      echo"
                                    </select>";

                                Unset($row_comune);
                                Unset($row_provincia);
                                Unset($row_regione);
                                // $comune = mysqli_query("select comune FROM areageografica");
                                // $comune_selez=$_POST["selezione_comune"];
                                // $provincia_selez=$_POST["selezione_provincia"];
                                // $regione_selez=$_POST["selezione_regione"];

                                // $comune=$array["comune"];
                                // $provincia=$array["provincia"];
                                // $regione=$array["regione"];

                                ?>

								<button type="button" onclick="btnConferma('modifica')" class="btn pull-right btn-r" >Registrati</button>
								<div id="modifica" class="modal">
									<form class="modal-content popup-modal-content">
										<div class="container popup-conferma">
											<h4>Registrazione</h4>
											<p>Stai per registrarti a FR Market.</p> 
											<p>Sei sicur* di voler proseguire?</p>      
											<div class="clearfix">
												<button type="submit" onclick="document.getElementById('modifica').style.display='none'" class="popup-btn deletebtn">Conferma</button>
												<button type="button" onclick="document.getElementById('modifica').style.display='none'" class="popup-btn cancelbtn">Annulla</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</form>
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
</body>
</html>
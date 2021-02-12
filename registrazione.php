

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
    					<form action="backend/registrazione-exe.php" method="post">
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
    									<label for="venditore"> Venditore </label><br>
    									<input type="checkbox" id="acquirente" name="acquirente" value="True">
    									<label for="acquirente"> Acquirente </label><br>
    								</span>
                    <?php
                    if (isset($_GET["erroreacquirente"])){
                        if ($_GET["erroreacquirente"] == true) {
                            echo '<p class="error-message">Imposta un valore tra "acquirente", "venditore" o entrambi. </p>';
                        }
                    }
                    ?>
    							</div>
    						</div>
    						<div class="col-sm-6">
                  <div class="inserimento-dati">Email:</div>
    							<input type="email"  placeholder="Email*" rows="1" class="insert-data" name='email' required></input>
                  <?php
                  if (isset($_GET["erroreemail"])){
                      if ($_GET["erroreemail"] == true) {
                          echo '<p class="error-message">Email già esistente</p>';
                      }
                  }
                  ?>
                  <div class="inserimento-dati">Password:</div>
    							<input type="password"  placeholder="Password*" rows="1" class="insert-data" name='psw' required></input>
                  <div class="inserimento-dati">Conferma password:</div>
                  <input type="password"  placeholder="Conferma password" rows="1" class="insert-data" name='pswconf' required></input>
                  <?php
                  if (isset($_GET["errorepsw"])){
                      if ($_GET["errorepsw"] == true) {
                          echo '<p class="error-message">I valori di password e conferma password non coincidono </p>';
                      }
                  }
                  ?>
                  <div class="inserimento-dati">Nome:</div>
    							<input type="text"  placeholder="Nome*" rows="1" class="insert-data" name='nome' required></input>
                  <div class="inserimento-dati">Cognome:</div>
                  <input type="text"  placeholder="Cognome*" rows="1" class="insert-data" name='cognome' required></input>
                  <div class="inserimento-dati">Codice fiscale:</div>
                  <input type="text"  placeholder="Codice fiscale*" rows="1" class="insert-data" name='codFiscale' required></input>
                  <div class="inserimento-dati">Via:</div>
                	<input type="text"  placeholder="via*" rows="1" class="insert-data" name='via' required></input>
                  <div class="inserimento-dati">Numero civico</div>
                  <input type="number"  placeholder="Numero civico*" rows="1" class="insert-data n-cap" name='nCivico' required></input>
                  <div class="inserimento-dati">CAP:</div>
                  <input type="text"  placeholder="CAP*" rows="1" class="insert-data n-cap" name='CAP' required></input>
                  <div class="inserimento-dati">Regione:</div>
                  <select id="reg" name="reg" required>
                    <option></option>
                  </select>
                  <br>
                  <br>
                  <div class="inserimento-dati">Provincia:</div>
                  <select id="prov" name="prov" required>
                    <option></option>
                  </select>
                  <br>
                  <br>
                  <div class="inserimento-dati">Comune:</div>
                  <select id="com" name="com" required>
                    <option></option>

                  </select>

                <script src="js/areaGeografica.js"></script>

    							<button type="submit"  class="btn pull-right btn-r">Registrati</button>   <!--onclick="btnConferma('modifica')"-->
                  <?php
                  if (isset($_GET["error"])){
                      if ($_GET["error"] == false) {
                          echo"
                              <div id='modifica' class='modal'>
                								<div class='modal-content popup-modal-content'>
                									<div class='container popup-conferma'>
                										<h4>Registrazione</h4>
                										<p>Stai per registrarti a FR Market.</p>
                										<p>Sei sicur* di voler proseguire?</p>
                										<div class='clearfix'>
                											<button type='submit' name='submit' class='popup-btn deletebtn'>Conferma</button>
                											<button type='button' onclick='document.getElementById('modifica').style.display='none'' class='popup-btn cancelbtn'>Annulla</button>
                										</div>
                									</div>
                								</div>
                							</div>";
                        }
                    }
                    ?>
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

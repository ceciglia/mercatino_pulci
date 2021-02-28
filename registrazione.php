<?php
    session_start();
    include "common/connessione.php";
?>

<!DOCTYPE html>
<html lang="en">
<?php include "common/head.php";?>

<body>
<?php include "common/navbar.php";?>

	<section>

    	<div class="container">
    		<div class="row">
    			<h2 class="title text-center add-margin-top"><span class="title-span">Registrati</span></h2>
    			<h2 class="insert-title" >Inserisci i tuoi dati</h2>
    			<div class="col-sm-18 padding-right">
    				<div class="features_items">
    					<form action="backend/registrazione-exe.php" method="post" enctype="multipart/form-data">
    						<div class="col-sm-4">
                                <div class="container_imm">
                                    <img src="images/pubblicaAnnuncio.jpg" alt="Impossibile caricare l\'immagine." class="immagine-r-a">
                                    <input class="btn-container_imm" type="file" id="file" name="immagine">
                                </div>
                                <div>
                                    <?php
                                    if (isset($_GET["erroreImg"]) and $_GET["erroreImg"]!=""){
                                        $errImm=$_GET["erroreImg"];
                                        echo '<p class="warning-message">' .$errImm. '</p>';
                                    }
                                    ?>
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
                                        echo '<p class="warning-message">Imposta un valore tra "acquirente", "venditore" o entrambi. </p>';
                                    }
                                }
                                ?>
    							</div>
    						</div>
    						<div class="col-sm-6">
                                <div class="inserimento-dati">Email:</div>
                                    <input type="email"  placeholder="Email*" rows="1" class="insert-data" name='email' required>
                                    <?php
                                        if (isset($_GET["erroreemail"])){
                                            if ($_GET["erroreemail"] == true) {
                                                echo '<p class="warning-message">Email già esistente</p>';
                                            }
                                        }
                                    ?>
                                <div class="inserimento-dati">Password:</div>
    							    <input type="password"  placeholder="Password*" rows="1" class="insert-data" name='psw' required>
                                <div class="inserimento-dati">Conferma password:</div>
                                <input type="password"  placeholder="Conferma password" rows="1" class="insert-data" name='pswconf' required>
                                <?php
                                if (isset($_GET["errorepsw"])){
                                    if ($_GET["errorepsw"] == true) {
                                        echo '<p class="warning-message">I valori di password e conferma password non coincidono </p>';
                                    }
                                }
                                ?>
                                <div class="inserimento-dati">Nome:</div>
    							    <input type="text"  placeholder="Nome*" rows="1" class="insert-data" name='nome' required>
                                <div class="inserimento-dati">Cognome:</div>
                                    <input type="text"  placeholder="Cognome*" rows="1" class="insert-data" name='cognome' required>
                                <div class="inserimento-dati">Codice fiscale:</div>
                                    <input type="text"  placeholder="Codice fiscale*" rows="1" class="insert-data" name='codFiscale' required>
                                <div class="inserimento-dati">Via:</div>
                	                <input type="text"  placeholder="via*" rows="1" class="insert-data" name='via' required>
                                <div class="inserimento-dati">Numero civico</div>
                                    <input type="number"  placeholder="Numero civico*" rows="1" class="insert-data n-cap" name='nCivico' required>
                                <div class="inserimento-dati">CAP:</div>
                                    <input type="text"  placeholder="CAP*" rows="1" class="insert-data n-cap" name='CAP' required>
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
							<img src="../images/home/italia.png" alt="" />
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

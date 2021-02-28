<?php
session_start();
include "common/head.php";
?>


<!DOCTYPE html>
<html lang="en">
<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img class="logo-image" src="images/home/logo_transparent.png" alt="" /></a>
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
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
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
	    <form action="backend/pubblicaAnnuncio-exe.php" method="POST" >
		<div class="container">
			<div class="row">
				<h2 class="title text-center"><span class="title-span">Nuovo annuncio</span></h2>
				<h2 class="insert-title" >Inserisci i dettagli dell'annuncio</h2>
				<div class="col-sm-18 padding-right" style="padding-left: 0;"> <!--col-sm-36-->
					<div class="features_items">

						<div class="col-sm-4">
							<div class="container_imm" >
								<img src="images/pubblicaAnnuncio.jpg" alt="Impossibile caricare l'immagine." class="immagine-r-a">
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

							<input type="number" required name="price" placeholder="Prezzo" min="0"  step=".01" class="price-container"><p class="price"> €</p>

						</div>

						<div class="col-sm-6">
							<input name="nomeAnnuncio"  placeholder="Nome annuncio" rows="1" class="insert-data" maxlength="50" required></input>
							<textarea name="descrizioneAnnuncio"  placeholder="Descrizione annuncio" rows="9" class="descrizione" maxlength="300" required></textarea>

							<input name="nomeProdotto"  placeholder="Nome prodotto" rows="1" class="insert-data" maxlength="100" required></input>
							
							<p class="title-3">Inserisci lo stato del prodotto: </p>

							 <div style="display: flow-root; color:#2a5164;">
                                    <input name="condizione" type="radio" id="nuovobtn" value="1" onclick="visualizzaDiv('nuovo', 'usato')" />
                                    <label for="nuovobtn" style="display: inline-block;"><p style="margin-right: 20px;">Nuovo</p></label>
                                    <input name="condizione" type="radio"  id="usatobtn" value="0" onclick="visualizzaDiv('usato', 'nuovo')" />
                                    <label for="usatobtn" style="display: inline-block;"><p style="margin-right: 20px;">Usato</p></label>
                             </div>
                            <?php
                             if (isset($_GET["errorenuovousato"])){
                                  if ($_GET["errorenuovousato"] == true) {
                                      echo '<p class="warning-message">Inserisci lo stato del prodotto </p>';
                                  }
                              }
                             ?>

							<div id="usato" style="display: none;">
                            <p class="title-3 add-margin-top">Inserisci lo stato di usura: </p>

                            <form action="">
                              <select id="usura" name="usura">
                                <option></option>
                              </select>
                            </form>
                            
                            <br>
								<textarea name="periodoUtilizzo" placeholder="Indicare il periodo di utilizzo" rows="2" class="descrizione" maxlength="30"></textarea>
							</div>
                            <?php
                            if (isset($_GET["erroreperiodoutilizzo"])){
                                if (($_GET["erroreperiodoutilizzo"]) == true) {
                                    echo '<p class="warning-message">Indicare il periodo di utilizzo del prodotto</p>';
                                }
                            }
                            ?>


							<div id="nuovo" style="display: none;">

								<input type="checkbox"  name="garanzia" onclick="visualizzaDiv('garanzia')" style="margin-top: 10px; ">
								<label for="garanzia" class="price" >Garanzia di copertura </label><br>
								
								<div id="garanzia" style="display: none;" class="margine-nuovo">
									<p class="price scadenza">Indica la scadenza:  </p>
									<input name="periodoCopertura" type="date" class="insert-data"/>
								</div>
							</div>
                            <?php
                            if (isset($_GET["erroregaranzia"])){
                                if (($_GET["erroregaranzia"]) == true) {
                                    echo '<p class="warning-message">Indica la data di scadenza della garanzia </p>';
                                }
                            }
                            ?>

							<p class="title-3 add-margin-top">Inserisci categoria e sottocategoria: </p>
							
							<div class="title-3">Categoria:</div>
                                <select id="categoria" name="categoria" required>
                                    <option></option>
                                </select>
                                
                            <div class="title-3 add-margin-top">Sotto categoria:</div>
                                <select id="sottocat" name="sottocat" required>
                                    <option></option>
                                </select>

                            <?php
                            if (isset($_GET["errorecategoria"])){
                                if (($_GET["errorecategoria"]) == true) {
                                    echo '<p class="warning-message">Inserisci la categoria e la sottocategoria </p>';
                                }
                            }
							?>

							<p class="title-3 add-margin-top">Inserisci la collocazione geografica: </p>

                            <div class="title-3">Regione:</div>
                                <select id="reg" name="reg" required>
                                    <option></option>
                                </select>
                                
                            <div class="title-3 add-margin-top">Provincia:</div>
                                <select id="prov" name="prov" required>
                                    <option></option>
                                </select>
                                
                            <div class="title-3 add-margin-top">Comune:</div>
                                <select id="com" name="com" required>
                                    <option></option>
                                </select>
                            <?php
                            if (isset($_GET["erroreregione"])){
                                if (($_GET["erroreregione"]) == true) {
                                    echo '<p class="warning-message">Inserisci una regione </p>';
                                }
                            }
                            if (isset($_GET["erroreprovincia"])){
                                if (($_GET["erroreprovincia"]) == true) {
                                    echo '<p class="warning-message">Inserisci una provincia </p>';
                                }
                            }
                            if (isset($_GET["errorecomune"])){
                                if (($_GET["errorecomune"]) == true) {
                                    echo '<p class="warning-message">Inserisci un comune </p>';
                                }
                            }
                            ?>

							<p class="title-3 add-margin-top">Seleziona la visibilità: </p>
							<!--<button name="pubblica" class="btn-nuovo-usato-vis">Pubblica</button>
							<button name="Privata" class="btn-nuovo-usato-vis">Privata</button>-->
                            <div style="display: flow-root; color:#2a5164;">
                                    <input name="visibilita" type="radio" id="pubblica" value="pubblica" onclick="visualizzaDiv(id1='',id2='ristretta')"/>
                                    <label for="pubblica" style="display: inline-block;"><p style="margin-right: 20px;">Pubblica</p></label>
                                    <input name="visibilita" type="radio"  id="privata" value="privata" onclick="visualizzaDiv(id1='', id2='ristretta')" />
                                    <label for="privata" style="display: inline-block;"><p style="margin-right: 20px;">Privata</p></label>
                                    <input name="visibilita" type="radio"  id="ristrettabtn" value="ristretta" onclick="visualizzaDiv(id1='ristretta', id2='')"/>
                                    <label for="ristrettabtn" style="display: inline-block;"><p style="margin-right: 20px;">Ristretta</p></label>
                             </div>
                            <?php
                            if (isset($_GET["errorevisibilita"])){
                                if (($_GET["errorevisibilita"]) == true) {
                                    echo '<p class="warning-message">Inserisci la visibilità </p>';
                                }
                            }
                            ?>
                             

							<div id="ristretta" style="display: none;" class="blu">
								<p class="title-3"> Inserisci l'area di visibilità: </p>
								<select id="regioneRistr" name="regioneRistr">
								</select>
								
								<p class="title-3 add-margin-top">Seleziona solo la regione nel caso di visibilità regionale </p>
								<select id="provinciaRistr" name="provinciaRistr">
                                  <option></option>
                                  
                                </select>
							</div>

                            <?php
                            if (isset($_GET["erroreristretta"])){
                                if (($_GET["erroreristretta"]) == true) {
                                    echo '<p class="warning-message">Inserisci un\'area di visibilità </p>';
                                }
                            }
                            ?>
							
							<button type="submit"  class="btn btn-pa" >Pubblica nuovo annuncio</button>
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
		</form>
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
	<script src="js/selectCategoria.js"></script>
	<script src="js/areaGeografica.js"></script>
	<script src="js/selectUsura.js"></script>
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
        
        window.addEventListener("DOMContentLoaded", function(){
            popolaRegioni("regioneRistr");
        });
        document.getElementById("regioneRistr").addEventListener("change", function(){
            popolaProvince("regioneRistr","provinciaRistr");
        });


    </script>
</body>
</html>

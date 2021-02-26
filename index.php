<?php
	session_start();
	include "common/connessione.php";
	include "common/funzioniFR.php";
?>

<!DOCTYPE html>
<html lang="en">
<head> <!--head-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mercatino delle pulci</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- <link href="css/prettyPhoto.css" rel="stylesheet"> -->
    <link href="css/price-range.css" rel="stylesheet">
    <!-- <link href="css/animate.css" rel="stylesheet"> -->
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/account.css" rel="stylesheet">
    <link href="css/dettagliAnnuncio.css" rel="stylesheet">
    <link href="css/registraAnnuncio.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->
    <!--<link rel="shortcut icon" href="images/ico/favicon.ico"> -->
    <link rel="shortcut icon" href="images/ico/favicon1.ico">
</head><!--/head-->
<!--	--><?php //include "common/head.php";?>

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
                                    <?php
                                        if (isset($_SESSION["logged"])){
                                            if ($_SESSION["logged"]==True){
                                                echo '<h1>Ciao <span>'.$_SESSION["nome"].' '.$_SESSION["cognome"].'</span></h1>
									                  <p>Siamo felici di riaverti tra noi <i class="fa fa-smile-o" aria-hidden="true"></i></p>
									                  <a href="account.php"><button type="button" class="btn btn-default get">Vai al mio profilo</button></a>';
                                            }
                                        } else {
                                            echo '<h1>Benvenut* in <span>FR</span> Market</h1>
									              <p>Scorri per scoprire di più! </p>
									              <a href="registrazione.php"><button type="button" class="btn btn-default get">Registrati subito</button></a>';
                                        }
                                    ?>
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>FR</span> Market</h1>
									<h2>100% Made in Italy</h2>
									<p class="slider-index">Prodotti made in Italy per ogni esigenza</p>
								</div>
                                <div class="col-sm-6">
                                    <img src="images/home/index_1.jpg" class="girl img-responsive" alt="" />
                                </div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>FR</span> Market</h1>
									<h2>Nuovo e usato</h2>
									<p class="slider-index">Prodotti nuovi e usati a tutti i prezzi</p>
								</div>
                                <div class="col-sm-6">
                                    <img src="images/home/footprint_eco_index.jpg" class="girl img-responsive" alt="" />
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
                    <form action="filtraggioAnnunci.php" method="get">  <!--form per filtraggio annunci-->
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
                                            <input type="radio" id="visualizzaTuttoEl" name="sottoCategoria" value="Elettrodomestici-Tutto">
                                            <label for="visualizzaTuttoEl"><b>Visualizza tutto</b></label><br>
                                            <input type="radio" id="aspirapolveri" name="sottoCategoria" value="Elettrodomestici-Aspirapolveri">
                                            <label for="aspirapolveri">Aspirapolveri</label><br>
                                            <input type="radio" id="caffettiere" name="sottoCategoria" value="Elettrodomestici-Caffettiere">
                                            <label for="caffettiere">Caffettiere</label><br>
                                            <input type="radio" id="tostapane" name="sottoCategoria" value="Elettrodomestici-Tostapane">
                                            <label for="tostapane">Tostapane</label><br>
                                            <input type="radio" id="frullatori" name="sottoCategoria" value="Elettrodomestici-Frullatori">
                                            <label for="frullatori">Frullatori</label><br>
                                            <input type="radio" id="altroEl" name="sottoCategoria" value="Elettrodomestici-Altro">
                                            <label for="altroEl">Altro</label>
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
                                            <input type="radio" id="visualizzaTuttoFeV" name="sottoCategoria" value="Foto e Video-Tutto">
                                            <label for="visualizzaTuttoFeV"><b>Visualizza tutto</b></label><br>
                                            <input type="radio" id="macchineFotografiche" name="sottoCategoria" value="Foto e Video-Macchine fotografiche">
                                            <label for="macchineFotografiche">Macchine fotografiche</label><br>
                                            <input type="radio" id="accessoriFev" name="sottoCategoria" value="Foto e Video-Accessori">
                                            <label for="accessoriFev">Accessori</label><br>
                                            <input type="radio" id="telecamere" name="sottoCategoria" value="Foto e Video-Telecamere">
                                            <label for="telecamere">Telecamere</label><br>
                                            <input type="radio" id="microfoni" name="sottoCategoria" value="Foto e Video-Microfoni">
                                            <label for="microfoni">Microfoni</label><br>
                                            <input type="radio" id="altroFeV" name="sottoCategoria" value="Foto e Video-Altro">
                                            <label for="altroFeV">Altro</label>
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
                                            <input type="radio" id="visualizzaTuttoAb" name="sottoCategoria" value="Abbigliamento-Tutto">
                                            <label for="visualizzaTuttoAb"><b>Visualizza tutto</b></label><br>
                                            <input type="radio" id="vestiti" name="sottoCategoria" value="Abbigliamento-Vestiti">
                                            <label for="vestiti">Vestiti</label><br>
                                            <input type="radio" id="borse" name="sottoCategoria" value="Abbigliamento-Borse">
                                            <label for="borse">Borse</label><br>
                                            <input type="radio" id="scarpe" name="sottoCategoria" value="Abbigliamento-Scarpe">
                                            <label for="scarpe">Scarpe</label><br>
                                            <input type="radio" id="accessoriAb" name="sottoCategoria" value="Abbigliamento-Accessori">
                                            <label for="accessoriAb">Accessori</label><br>
                                            <input type="radio" id="altroAb" name="sottoCategoria" value="Abbigliamento-Altro">
                                            <label for="altroAb">Altro</label>
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
                                            <input type="radio" id="visualizzaTuttoH" name="sottoCategoria" value="Hobby-Tutto">
                                            <label for="visualizzaTuttoH"><b>Visualizza tutto</b></label><br>
                                            <input type="radio" id="giocattoli" name="sottoCategoria" value="Hobby-Giocattoli">
                                            <label for="giocattoli">Giocattoli</label><br>
                                            <input type="radio" id="filmDvd" name="sottoCategoria" value="Hobby-Film e DVD">
                                            <label for="filmDvd">Film e dvd</label><br>
                                            <input type="radio" id="musica" name="sottoCategoria" value="Hobby-Musica">
                                            <label for="musica">Musica</label><br>
                                            <input type="radio" id="libriRiviste" name="sottoCategoria" value="Hobby-libri e riviste">
                                            <label for="libriRiviste">libri e riviste</label><br>
                                            <input type="radio" id="altroH" name="sottoCategoria" value="Hobby-Altro">
                                            <label for="altroH">Altro</label>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/category-products-->

                            <div class="price-range adattivo">      <!-- filtro comune provincia regione -->
                                <h2><span class="title-span">Area Geografica</span></h2>
                                <div class="well text-center">
                                    <?php include "frontend/areaGeografica.php";?>
                                </div>
                            </div>				<!-- /filtro comune provincia regione -->

                            <div class="price-range adattivo">		<!-- price-range -->
                                <h2><span class="title-span">Price Range</span></h2>
                                <div class="well text-center">
                                     <input type="text" class="span2" value="" name="priceRange" data-slider-min="0" data-slider-max="9999" data-slider-step="5" data-slider-value="[4000,7000]" id="sl2"><br/>
                                     <b class="pull-left">0 €</b> <b class="pull-right">10000 €</b>
                                </div>  <!-- /price-range -->
                                <!--bottone APPLICA-->
                                <button type="submit" class="btn btn-default add-to-cart applica-btn">Applica filtri</button>
                            </div>

                        </div>
                    </form>
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
                        <?php
                            if (!isset($_GET["categoria"]) and !isset($_GET["sottoCategoria"]) and !isset($_GET["regione"]) and !isset($_GET["provincia"]) and !isset($_GET["comune"]) and !isset($_GET["minPrice"]) and !isset($_GET["maxPrice"])){
                                getAnnunciPubblicati($cid);
                            } else {
                                getAnnunciFiltrati($cid);
                            }
                        ?>
					</div>      <!--/features_items-->

					<div class="category-tab">      <!--category-tab-->
						<h2 class="title text-center index-margin-top"><span class="title-span">Venditori TOP</span></h2>
					</div>		<!--/category-tab-->
					<div>
                        <?php
                            $listaVenditoriTop = getVenditoriTop($cid);
                            getAnnunciVenditoriTop($cid, $listaVenditoriTop);
                        ?>
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
    <script src="js/funzioni.js"></script>          <!--aggiunta-->
    <script src="js/ajax-functions.js"></script>          <!--aggiunta-->
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

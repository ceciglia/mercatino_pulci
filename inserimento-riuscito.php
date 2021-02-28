<?php
	session_start();
	include "common/connessione.php";		//DA SPOSTARE IN CARTELLA common
	include "common/funzioniFR.php";		//DA SPOSTARE IN CARTELLA common
?>

<!DOCTYPE html>
<html lang="en">
	<?php include "common/head.php";?>

<body>
	<?php include "common/navbar.php";?>	<!--NAVBAR PRINCIPALE-->
                <?php
                if (isset($_GET["messaggio"]) and $_GET["messaggio"]!="registrazione"){

                echo'
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-9 index-benvenuto">
										<h1>Operazione riuscita </h1>
										<p>Torna alla pagina principale per effettuare il login</p>
										<a href="index.php"><button type="button" class="btn btn-default get">Pagina principale</button></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>';
				}else{

				echo'
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-9 index-benvenuto">
                                        <h1>Operazione riuscita </h1>
                                        <p>Torna alla pagina principale</p>
                                        <a href="index.php"><button type="button" class="btn btn-default get">Pagina principale</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
				}

    include "common/footer.php"
	?>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
	<script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/main.js"></script>
	<script src="js/tendinalogin.js"></script>		<!--aggiunta-->


</body>
</html>

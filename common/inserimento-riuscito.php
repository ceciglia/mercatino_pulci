<?php
	session_start();
	include "connessione.php";		//DA SPOSTARE IN CARTELLA common
	include "funzioniFR.php";		//DA SPOSTARE IN CARTELLA common
?>

<!DOCTYPE html>
<html lang="en">
	<?php include "head.php";?>

<body>
	<?php include "navbar.php";?>	<!--NAVBAR PRINCIPALE-->
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-9 index-benvenuto">
										<h1>Operazione riuscita </h1>
										<p>Torna alla pagina principale per effettuare il login</p>
										<a href="../index.php"><button type="button" class="btn btn-default get">Pagina principale</button></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

	<?php
    include "footer.php"
	?>

	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.scrollUp.min.js"></script>
	<script src="../js/price-range.js"></script>
	<script src="../js/jquery.prettyPhoto.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/tendinalogin.js"></script>		<!--aggiunta-->


</body>
</html>

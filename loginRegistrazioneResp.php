<?php
	session_start();
	include "php/connessione.php";		//DA SPOSTARE IN CARTELLA common
	include "php/funzioniFR.php";		//DA SPOSTARE IN CARTELLA common
?>

<!DOCTYPE html> 			
<html lang="en">
	<?php include "common/head.php";?>

<body>
	<?php include "php/navbar.php";?>	<!--NAVBAR PRINCIPALE-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login</h2>
						<form action="#">
							<input type="email" placeholder="Email" />
							<input type="password" placeholder="Password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Resta conness*
							</span>
							<button type="submit" class="btn btn-default">Accedi</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Registrati subito!</h2>
						<form action="#">
					       <a href="registrazione.html" type="submit" class="btn btn-default signup">Registrati</a>	<!--aggiunto id="signup"-->
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
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
	
</body>
</html>
<?php
	// session_start();
	include_once "php/connessione.php";		//DA SPOSTARE IN CARTELLA common
	include_once "php/funzioniFR.php";		//DA SPOSTARE IN CARTELLA common
?>

<!--NAVBAR PRINCIPALE-->
<header id="header"><!--header-->
	<div class="header-middle"><!--header-middle-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="logo pull-left">
						<a href="index.php"><img class="logo-image logo-position" src="images/home/logo_transparent.png" alt="" /></a>
					</div>
				</div>
				<div class="col-sm-8">
					<!-- <div class="shop-menu pull-right">
						<ul class="nav navbar-nav"> -->
					
					<!--Responsive-->
					<div class="navbar-header">
						<div class="search_box pull-left" id=search_1 >	<!--aggiunto id=search_1; pull-left anzichè pull-right-->
							<input type="text" placeholder="Search"/>
						</div>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--/Responsive-->


				<!--PROVA-->
				<div id="myNav" class="overlay overlay-tendina">
					<div class="overlay-content overlay-tendina-content">
						<section id="form"> <!--form-->
							<div class="container login-line">
								<div class="row ">
									<a class="closebtn closebtn-tendina" onclick="closeNav()"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

									<div class="col-sm-4 col-sm-offset-1" style="margin-left: 200px;">
										<div class="login-form"><!--login form-->
												<h2>Login</h2>
												<form action="php/login_execution.php" method="POST">
													<input type="email" placeholder="Email" name="email"/>
													<input type="password" placeholder="Password" name="psw"/>
													<span>
														<input type="checkbox" class="checkbox">
															Resta conness*
													</span>
													<a href="index.php"><button type="submit" class="btn btn-default">Accedi</button></a>
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
												<a href="registrazione.php" type="submit" class="btn btn-default signup">Registrati</a>
											</form>
										</div><!--/sign up form-->
									</div>
								</div>
							</div>
						</section><!--/form-->
					</div>
				</div>

				<!--PROVA-->
					
					<?php if ($_SESSION["logged"]) {?>
						<?php echo "SIGNORI MIEI" ?>
						<div id="main_menu_desktop" class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li id="login-1"><a onclick="openNav()" style="cursor: pointer;"><i class="fa fa-lock"></i> Logout</a></li>
								<li id="login-2"><a href="loginRegistrazioneResp.php" style="cursor: pointer;"><i class="fa fa-lock"></i> Logout</a></li> <!--login e registrazione in responsive-->
								<li><a class="notification-bell"><i class="fa fa-bell" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					<?php } else { // chiudo if su variabile di sessione logged  ?>
						<div id="main_menu_desktop" class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li id="login-1"><a onclick="openNav()" style="cursor: pointer;"><i class="fa fa-lock"></i> Login</a></li>
								<li id="login-2"><a href="loginRegistrazioneResp.php" style="cursor: pointer;"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->

	<!-- <div class="header-bottom">	header-bottom
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
				</div>
			</div>
		</div>
	</div>			/header-bottom
	 -->
</header> <!--fine header-->


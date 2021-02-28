<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	include_once "connessione.php";
	include_once "funzioniFR.php";
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
					
					<!--Responsive-->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<!--/Responsive-->
					
					<?php if (isset($_SESSION["logged"])) {?>
						<div id="main_menu_desktop" class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
								<li id="login-1"><a href="backend/logout_execution.php"><button type="submit" class="logout-button"><i class="fa fa-lock"></i> Logout</button></a></li>
								<li id="login-2"><a href="backend/logout_execution.php"><i class="fa fa-lock"></i> Logout</a></li> <!--login e registrazione in responsive-->
							</ul>
						</div>
					<?php } else { // chiudo if su variabile di sessione logged  ?>
						<div id="main_menu_desktop" class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="account.php"><i class="fa fa-heart"></i> Osservati</a></li>       <!--onclick="document.getElementById('annunciOsservati').style.display='block'"-->
								<li id="login-1"><a onclick="openNav()"><i class="fa fa-lock"></i> Login</a></li>
								<li id="login-2"><a href="loginRegistrazioneResp.php"><i class="fa fa-lock"></i> Login</a></li> <!--login e registrazione in responsive-->
							</ul>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div><!--/header-middle-->
</header> <!--fine header-->

<!--tendina login-->
<div id="myNav" class="overlay overlay-tendina">
    <div class="overlay-content overlay-tendina-content">
        <section id="form"> <!--form-->
            <div class="container login-line">
                <div class="row">
                    <a class="closebtn closebtn-tendina" onclick="closeNav()"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

                    <div class="col-sm-4 col-sm-offset-1 overlay-tendina-content-margin" >     <!--style="margin-left: 200px;"-->
                        <div class="login-form"><!--login form-->
                                <h2>Login</h2>
                                <form action="backend/login_execution.php" method="POST">
                                    <div class="loginInput">
                                        <label for="emailLogin"></label>
                                        <input type="email" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="loginInput">
                                        <label for="pswLogin"></label>
                                        <input type="password" placeholder="Password" name="psw" required>
                                    </div>

                                    <?php
                                    if (isset($_GET["msg"])){
                                        if ($_GET["msg"]=="email o password sbagliate") {
                                            echo '<script src="js/tendinalogin.js"></script>';
                                            echo '<script type="text/javascript"> openNav(); </script>';
                                            echo '<p class="warning-message">Non hai inserito correttamente email o password.</p>';
                                        }
                                    }
                                    ?>

                                    <a href="#"><button type="submit" class="btn btn-default" onclick="invalidInput()">Accedi</button></a>
                                </form>
                        </div><!--/login form-->
                    </div>
                    <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4 signup-form">
                        <div><!--sign up form-->
                            <h2>Registrati subito!</h2>
                                <a href="registrazione.php" type="submit" class="btn btn-default signup">Registrati</a>
                        </div><!--/sign up form-->
                    </div>
                </div>
            </div>
        </section><!--/form-->
    </div>
</div>


<!--fine tendina login-->


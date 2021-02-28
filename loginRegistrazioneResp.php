<?php
	session_start();
	include "common/connessione.php";
	include "common/funzioniFR.php";
?>

<!DOCTYPE html> 			
<html lang="en">
	<?php include "common/head.php";?>

<body>
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
                        <!--/Responsive-->

                        <?php if (isset($_SESSION["logged"])) {?>
                            <div id="main_menu_desktop" class="mainmenu pull-right">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="account.php"><i class="fa fa-user"></i> Account</a></li>
                                    <li id="login-1"><a href="backend/logout_execution.php"><button type="submit" class="logout-button"><i class="fa fa-lock"></i> Logout</button></a></li>
                                    <li id="login-2"><a href="backend/logout_execution.php"><i class="fa fa-lock"></i> Logout</a></li> <!--login e registrazione in responsive-->
                                    <li><a href="account.php" class="notification-bell"><i class="fa fa-bell" aria-hidden="true"></i><span>!</span></a></li>
                                </ul>
                            </div>
                        <?php } else { // chiudo if su variabile di sessione logged  ?>
                            <div id="main_menu_desktop" class="mainmenu pull-right">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="account.php"><i class="fa fa-heart"></i> Osservati</a></li>
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


    <section id="form"><!--form-->
		<div class="container">
			<div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login</h2>
                        <form action="backend/login_execution_responsive.php" method="POST">
                            <div class="loginInput">
                                <label for="emailLogin"></label>
                                <input type="email" placeholder="Email" name="email" required>
                            </div>
                            <div class="loginInput">
                                <label for="pswLogin"></label>
                                <input type="password" placeholder="Password" name="psw" required>
                            </div>

                            <?php
                            if (isset($_GET["msgResp"])){
                                if ($_GET["msgResp"]=="email o password sbagliate") {
                                    echo '<p class="warning-message">Non hai inserito correttamente email o password.</p>';
                                }
                            }
                            ?>
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
                <div class="col-sm-4 signup-form">
                    <div><!--sign up form-->
                        <h2>Registrati subito!</h2>
                        <a href="registrazione.php" type="submit" class="btn btn-default signup">Registrati</a>	<!--aggiunto id="signup"-->
                    </div><!--/sign up form-->
                </div>
			</div>
		</div>
	</section><!--/form-->
		
	<?php
    include "common/footer.php"
	?>
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
if(!_ALLOW_ACCESS){
    die("Not Allowed");
}

if(isset($_POST["submit"]))
    $errors = $userEntry->login($_POST["username"],$_POST["pass"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png"      href="Views/public/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Views/public/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Views/public/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('Views/public/Login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">Log in</span>

                    <?php
                            if(!empty($errors)){
                                echo "<div class= wrap-input100>";
                                    foreach($errors as $error)
                                        echo "<p> * " . $error . "</p>";
                                echo "</div>";}
                    ?>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="submit">
                            Login
						</button>
					</div>
					<div class="text-center p-t-90">
						<a class="txt1" name="sign up" href="<?php $_SERVER['PHP_SELF'] ?>?sign= signup">
                            Sign Up Now?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="Views/public/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Views/public/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="Views/public/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="Views/public/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Views/public/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Views/public/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="Views/public/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="Views/public/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="Views/public/Login/js/main.js"></script>

</body>
</html>
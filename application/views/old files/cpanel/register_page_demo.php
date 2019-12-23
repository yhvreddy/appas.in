<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V8</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url('assets/images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<span style="color:green"><?=$this->session->flashdata('success')?></span>
				<span style="color:red"><?=$this->session->flashdata('failed')?></span>
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="<?=base_url('register/savenewuserdetails')?>">
					<span class="login100-form-title">
						Sign Up Account
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter name">
						<input class="input100" type="text" name="Name" placeholder="Enter Your Name" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
						<input class="input100" type="email" name="email" placeholder="Enter Your email" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter mobile">
						<input class="input100" type="tel" name="mobile" placeholder="Enter Your Mobile" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="pass" placeholder="Password" required="">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn" style="margin-top: 30px">
						<button type="submit" class="login100-form-btn">
							Register Account.
						</button>
					</div>

					<div class="flex-col-c p-t-40 p-b-40">
						<span class="txt1 p-b-9">
							I have an account..!
						</span>

						<a href="<?=base_url()?>" class="txt3">
							Login Account
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/js/main.js"></script>

</body>
</html>
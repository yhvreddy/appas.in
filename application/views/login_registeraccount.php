<?php include 'header.php';?>
<style>
    .otpScreen {
        display: none;
    }
    .pwd-error, .form-error {
        color: red;
    }
</style>



<section class="hide-md-down bg-white">
	<div class="container max-w-lg-down-none pt-5">
		<h1 class="h2 t-center m-b-30">Login or Register Account</h1>
		<div class="row cartScreen justify-content-center">

			<div class="col-md-6 leftScreen">
				<div class="card p-0">

					<div class="promoCon p-15">
						<p class="text-center">
							<span class="text-center text-success"><?php echo $this->session->flashdata('success_login'); ?></span>
							<span class="text-center text-danger"><?php echo $this->session->flashdata('failed_login'); ?></span>
						</p>
						<form method="post" id="LoginAccount" action="<?=base_url('accesss/userlogin')?>">
							<div class="minCartScreen text-center">
								<p>Login Account</p>
							</div>
							<div class="form-group p-relative">
								<label>Login Id</label>
								<input type="text" required="required" placeholder="Enter Mobile or Mail id" class="form-control" name="LoginId">
							</div>
							<div class="form-group p-relative">
								<label>Login Password</label>
								<input type="password" required="required" placeholder="Enter Password" class="form-control" name="Password">
							</div>
							<div class="d-flex align-items-center w-100 p-relative m-b-5">
								<button type="submit" class="btn primaryBtn applyPromoCode pull-left">Login Account</button>
								<a href="javascript:(0);" id="ForgetPasswordBox" class="btn btn-link pull-right">Forget Password..!</a>
							</div>
						</form>

						<form method="post" id="forgetPassword" action="<?=base_url('user/resetpassword')?>">
							<div class="minCartScreen text-center">
								<p>Reset ForgetPassword</p>
							</div>
							<div class="form-group p-relative">
								<label>Enter Register Email id</label>
								<input type="email" required="required" placeholder="Enter Register Email id." class="form-control" name="register_eMail_id">
							</div>
							<div class="d-flex align-items-center w-100 p-relative m-b-5">
								<button type="submit" class="btn primaryBtn applyPromoCode pull-left">Reset Password</button>
								<a href="javascript:(0);" id="LoginBox" class="btn btn-link pull-right">Login Account..!</a>
							</div>
						</form>
					</div>

				</div>
			</div>

			<div class="col-md-6 rightScreen">
				<div class="card p-0">
					<div class="promoCon p-15">
						<p class="text-center">
							<span class="text-center text-success"><?php echo $this->session->flashdata('success_reg'); ?></span>
							<span class="text-center text-danger"><?php echo $this->session->flashdata('failed_reg'); ?></span>
						</p>
						<form method="post" action="<?=base_url('save/registerdata')?>">
							<div class="minCartScreen text-center">
								<p> Register Account</p>
							</div>
							<div class="form-group p-relative">
								<label>First Name</label>
								<input type="text" required="required" placeholder="Enter First Name" class="form-control" name="FirstName">
							</div>
							<div class="form-group p-relative">
								<label>Last Name</label>
								<input type="text" required="required" placeholder="Enter Last Name" class="form-control" name="LastName">
							</div>
							<div class="form-group p-relative">
								<label>Mobile</label>
								<input type="tel" maxlength="10" required="required" placeholder="Enter Mobile Number" class="form-control" name="MobileNum">
							</div>
							<div class="form-group p-relative">
								<label>eMail id</label>
								<input type="email" required="required" placeholder="Enter email id" class="form-control" name="mail_id">
							</div>
							<div class="form-group p-relative">
								<label>Create Password</label>
								<input type="password" required="required" placeholder="Enter Password" class="form-control" name="Password">
							</div>
							<div class="d-flex align-items-center w-100 p-relative m-b-5">
								<button type="submit" class="btn primaryBtn pull-right">Register Account</button>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function(){
		$('#forgetPassword').hide();
		$('#ForgetPasswordBox').click(function(){
			$('#forgetPassword').show();
			$('#LoginAccount').hide();
		});

		$('#LoginBox').click(function(){
			$('#forgetPassword').hide();
			$('#LoginAccount').show();
		});
	});
</script>
<?php include 'footer.php';?>




<div class="custSideNavContent" id="loginSideNav">

	<div class="sideNavHeader d-flex align-items-center justify-content-center">
		<img src="<?=base_url()?>assets/images/logo.jpeg" alt="mutton" />
		<div class="closeSideNav d-flex align-items-center justify-content-center">
			<i class="material-icons icon-close-round"></i>
		</div>
	</div>

	<div class="sideNavBody">
		<div class="divi der-b">

			<div class="d-flex p-relative loginLocation">
				<div class="closeSideNav d-flex align-items-center justify-content-center show-md-down white-text">
					<i class="material-icons icon-close-round"></i>
				</div>
				<div class="d-flex align-items-center show-md-down my-2 p-r-25" id="locationCon">
					<i class="material-icons icon-map-pin-streamline d-flex white-text"></i>
					<span class="smallLabel m-l-5 m-r-10">Location : </span>
					<span class="locationText text-truncate smallText" id="locationText">--</span>
					<div class="searchBgOverlay"></div>
				</div>
			</div>

			<form id="loginScreen">
				<p class="sideNavBodyTitle">Login to account</p>
				<div class="form-group">
					<input type="text" class="form-control" name="loginMobile" id="mobNumber3" placeholder="Email / Mobile Number">
					<span class="formValidMsg login-email-err login-mob-err"></span>
				</div>
				<div class="form-group m-b-5">
					<input type="password" class="form-control" name="loginPassword" placeholder="Password" id="loginPwd3">
					<span class="formValidMsg login-pwd-err"></span>
					<input type="text" class="form-control d-none" name="loginOTP" placeholder="Enter OTP Here" id="loginOtp3">
					<button type="button" class="btn primaryBtn resendOtpBtn" onclick="resendOTP('loginMobile')">Resend OTP</button>
					<span class="formValidMsg login-otp-err"></span>
				</div>
				<div class="d-flex justify-content-between m-b-10">
					<span class="forgetLoginPwd smallText btn btn-link" onclick="forgotPassword('loginMobile')">
						Forgot Password?
					</span>
					<span class="loginRequestOtp smallText btn btn-link" onclick="requestOTP('loginMobile')">
						<span class="otp">Login with OTP?</span>
					</span>
					<span class="loginWithPwd smallText btn btn-link" onclick="changeToPassword('loginScreen')">
						<span class="pwd">Login with Password?</span>
					</span>
				</div>
				<div class="form-group">
					<span class="formValidMsg login-cmn-err"></span>
				</div>
				<div class="d-flex flex-column align-items-start">
					<button type="submit" class="btn btn-sm primaryBtn m-t-10 m-b-5 loginProceed w-100">Login</button>
					<a href="#" class="createNew font-w600">Create New Account</a>
				</div>
			</form>

			<form class="createAccount" id="createAccount" method="post">

				<p class="sideNavBodyTitle">Create Account</p>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Firstname" required="required" id="spFirstName" autocomplete="off" autofocus>
					<span class="formValidMsg cr-fname-err"></span>
				</div>

				<div class="form-group">
					<input type="text" class="form-control" placeholder="Lastname" required="required" id="spLastName" autocomplete="off">
					<span class="formValidMsg cr-lname-err"></span>
				</div>

				<div class="form-group">
					<input type="email" class="form-control" placeholder="Email" id="spEmail" required="required" autocomplete="off">
					<span class="formValidMsg cr-email-err"></span>
				</div>

				<div class="form-group">
					<input type="number" class="form-control" required="required" placeholder="Mobile Number" id="spMobNumber" autocomplete="off">
					<span class="formValidMsg cr-mob-err"></span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" required="required" placeholder="Password" id="spLoginPwd" autocomplete="off">
					<span class="formValidMsg cr-pwd-err"></span>
				</div>

				<div class="form-group">
					<input type="password" class="form-control" required="required" placeholder="Confirm Password" id="spLoginConfPwd" autocomplete="off">
					<span class="formValidMsg cr-cpwd-err"></span>
				</div>

				<div class="form-group">
					<span class="formValidMsg cr-cmn-err"></span>
				</div>

				<div class="d-flex flex-column align-items-start">
					<button type="submit" class="btn primaryBtn m-t-10 m-b-20 signUpBtn w-50">Sign Up</button>
					<button type="button" class="btn btn-link bg-transparent backToLogin p-l-0 white-text wrapText m-b-15" class="font-w600">Already a member ? click here to login</button>
				</div>
			</form>

			<form class="otpScreen" id="otpScreen" name="otpForm">
				<p class="sideNavBodyTitle">Confirm OTP</p>
				<label for="otp" class="col-form-label white-text">Enter OTP</label>
				<div class="form-group">
					<input type="number" name="modalActOtp" class="form-control" id="otp" placeholder="Enter OTP received on mobile">
					<button type="button" class="btn primaryBtn resendOtpBtn" onclick="resendOTP('modalActOtp')">Resend OTP</button>
					<span class="formValidMsg cr-otp-err"></span>
				</div>
				<div class="d-flex flex-column align-items-start">
					<button type="button" class="btn primaryBtn m-t-20 m-b-20 otpBtn" onclick="activateAccount('modalActOtp')">Submit OTP</button>
				</div>
			</form>

		</div>
	</div>
	<script>
		$(document).ready(function () {

			$("#createAccount").submit(function (creactaccount) {
				creactaccount.preventDefault();
                alert("+++++++++++");
            })
        })
	</script>
</div>

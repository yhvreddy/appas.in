<?php include 'header.php';?>
<style>
	.otpScreen {
		display: none;
	}
	.pwd-error, .form-error {
		color: red;
	}
</style>
<script>
				var promos = [{"0":"4","id":"4","1":"Scheduled offer","discount_name":"Scheduled offer","2":"ONSD25","promo_code":"ONSD25","3":"ALL","medium":"ALL","4":"scheduled delivery offer","description":null,"5":"discount","type":"discount","6":"0","offer_day":"0","7":"scheduled","delivery_type":"scheduled","8":"","frequency":"","9":"25","discount_amount":"25","10":"0","discount_percentage":"0","11":"","minimum_order":"","12":"0","max_discount":"0","13":"0","free_product":"0","14":"0","free_qty":"0","15":"1567276200","valid_from":"1567276200","16":"1575224999","valid_to":"1575224999","17":"-19800","regvalid_from":"-19800","18":"66599","regvalid_to":"66599","19":"1","status":null,"20":"1559887666","timestamp":"1559887666","21":null,"product_category_code":null,"22":null,"product_code":null,"23":null,"product_name":null,"24":null,"product_short_desc":null,"25":null,"product_long_desc":null,"26":null,"image_def":null,"27":null,"price":null,"28":null,"29":null,"image":null,"30":null,"update_datetime":null,"31":null,"priority":null,"32":null,"pref_cbox":null,"33":null,"remove_product":null,"34":null,"category":null,"35":null,"subcategory":null,"36":null,"37":null,"cano":null,"38":null,"config":null,"39":null,"meta":null,"40":null,"full_desc":null,"41":null,"free_product_name":null,"42":null,"free_product_config":null},{"0":"2","id":"2","1":"Existing customer discount","discount_name":"Existing customer discount","2":"ONLY45","promo_code":"ONLY45","3":"ALL","medium":"ALL","4":"Existing customer discount","description":null,"5":"discount","type":"discount","6":"0","offer_day":"0","7":"","delivery_type":"","8":"","frequency":"","9":"45","discount_amount":"45","10":"0","discount_percentage":"0","11":"100","minimum_order":"100","12":"0","max_discount":"0","13":"0","free_product":"0","14":"0","free_qty":"0","15":"1567276200","valid_from":"1567276200","16":"1575224999","valid_to":"1575224999","17":"-19800","regvalid_from":"-19800","18":"66599","regvalid_to":"66599","19":"1","status":null,"20":"1555683164","timestamp":"1555683164","21":null,"product_category_code":null,"22":null,"product_code":null,"23":null,"product_name":null,"24":null,"product_short_desc":null,"25":null,"product_long_desc":null,"26":null,"image_def":null,"27":null,"price":null,"28":null,"29":null,"image":null,"30":null,"update_datetime":null,"31":null,"priority":null,"32":null,"pref_cbox":null,"33":null,"remove_product":null,"34":null,"category":null,"35":null,"subcategory":null,"36":null,"37":null,"cano":null,"38":null,"config":null,"39":null,"meta":null,"40":null,"full_desc":null,"41":null,"free_product_name":null,"42":null,"free_product_config":null}];
		var expiredPromos = ["TESTTEST"];
	</script>
<body>
<main class="orderPage">
<header class="header m-b-30">
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD-1Q573cAUUaU5HRJ5yQ7mw5k8m3G2bFE&amp;libraries=places,drawing"></script>
<style>
    /* #locality.custom-select {
        width: auto;
        max-width: 200px;
        font-size: 12px;
    } */
    </style>
<div class="container-fluid p-0 d-flex justify-content-center hide-md-down">
<nav class="navbar justify-content-start col-lg-11 col-md-12 d-flex">
<a href="index.php" class="navbar-brand order-xl-1">
<img class="img-fluid" src="assets/logo.png" alt="logo">
</a>
<div class="d-flex justify-content-end flex-grow-1 order-xl-3">
<div class="d-flex align-items-center divider-r phoneNum">
<i class="material-icons icon-ios-telephone-outline d-flex"></i>

<a href="tel:+91-40- 40 39 38 37" class="m-l-5 m-r-5">+91 40 40393837</a>
</div>
<div class="d-flex align-items-center locationCon divider-r">
<i class="material-icons icon-map-pin-streamline d-flex"></i>

<span class="smallLabel m-l-5 m-r-10">Location : </span>
<span class="locationText text-truncate smallText" id="locationText">--</span>
<div class="searchLocation">
<h4 class="h4">Choose Your Location</h4>
<div id="closeLocation" class="closeIcon d-flex align-items-center justify-content-center">
<i class="material-icons icon-cancel-circled d-flex"></i>
</div>
<div class="form-group searchLocality m-b-0 m-t-15" id="spo">
<input type="text" name="lloocality" autocomplete="off" placeholder="Type your Locality" class="form-control custom-select custom-select-sm show-on-desktop" id="locality" value="" />
<input type="hidden" id="loc_latlong" value="" />
<input type="hidden" id="spoc" value="" />
</div>
</div>
<div class="searchBgOverlay"></div>
</div>
<div class="cart d-flex align-items-center divider-r pointer" onclick="buyNow()">
<span class="smallLabel m-r-5">Cart</span>
<div class="p-relative cartIcon">
<i class="material-icons icon-cart-fill d-flex"></i>
 

<div class="cart-number"></div>
</div>
</div>
<div class="d-flex align-items-center custSideNav pointer smallText signin" data-id="loginSideNav">
SignUp / Login
</div>
<div class="dropdown profileMenu d-flex align-items-center pointer">
<a class="dropdown-toggle d-flex align-items-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="material-icons icon-user-outline d-flex"></i>

</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item" href="profile.php">Profile</a>
<a class="dropdown-item" href="profile.php#orders">My Orders</a>
<a class="dropdown-item" href="#" onclick="logout()">Logout</a>
</div>
</div>
</div>
<form class="form-inline flex-grow-1 order-xl-2 w-lg-down-100">
<div class="p-relative m-l-10 m-r-10 w-100 searchBarCon">
<input class="form-control m-0 w-100 desk-search" type="search" placeholder="Search" aria-label="Search" onsearch="searchClicked()">
<button class="btn searchInBtn" type="button" onclick="searchClicked()"><i class="material-icons icon-search"></i></button>
</div>
</form>
</nav>
</div>
<div class="d-flex align-items-center mobileHeader show-md-down py-1">
<div class="d-flex align-items-center m-r-10 flex-grow-1">
<a class="navbar-brand">
<img class="img-fluid" src="assets/logo.png" alt="logo">
</a>
</div>
<a href="tel:+91-40- 40 39 38 37" class="m-l-5 m-r-10 phone-icon"><i class="material-icons icon-ios-telephone-outline d-flex"></i></a>
<div class="d-flex align-items-center openSeacrh">
<div class="form-inline">

<div class="p-relative searchBarCon">
<input class="form-control m-0 w-100 mob-home-search" type="search" placeholder="Search" aria-label="Search">
<button class="btn searchInBtn" type="button" onclick="searchClicked()"><i class="material-icons icon-search"></i></button>
</div>
</div>
<i class="material-icons icon-search d-flex pointer"></i>
</div>
</div>
<div class="container hide-md-down">
<ul class="nav">
<li class="nav-item">
<a class="nav-link " href="chicken.php">Chicken</a>
</li>
<li class="nav-item">
<a class="nav-link " href="fish.php">Fish</a>
</li>
<li class="nav-item">
<a class="nav-link " href="mutton.php">Mutton</a>
</li>
<li class="nav-item">
<a class="nav-link " href="prawns.php">Prawns</a>
</li>
<li class="nav-item">
<a class="nav-link " href="eggs.php">Eggs</a>
</li>
<li class="nav-item">
<a class="nav-link " href="more.php">More</a>
</li>


</ul>
</div>

<div class="flex align-items-center mobileTitleHeader show-md-down">
<div class="d-flex align-items-center m-r-10 flex-grow-1">
<i class="material-icons icon-left-open-big m-r-10 d-flex" onclick="goBack()"></i> <span class="text-capitalize">Your Cart</span>
</div>
<div class="d-flex align-items-center openSeacrh">
<div class="p-relative searchBarCon form-inline">
<input class="form-control m-0 w-100 mob-search" type="search" placeholder="Search" aria-label="Search" onsearch="searchClicked()">
<button class="btn searchInBtn p-l-10 p-r-10 p-t-0 p-b-0" type="button" onclick="searchClicked()"><i class="material-icons icon-search d-flex"></i></button>
</div>

<i class="material-icons icon-search pointer d-flex"></i>
</div>
</div>
<div class="modal fade successDialog" tabindex="-1" role="dialog" aria-labelledby="orderSuccessModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm">
<div class="modal-content">
<div class="d-flex flex-column align-items-center placeOrderMsg">

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
<circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
<polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
</svg>
Order Placed Successfully
</div>
</div>
</div>
</div>

</header>
<div id="locationModal">
<div class="container locationModal" style="min-height: 180px;">
<div class="closeLocation d-flex align-items-center justify-content-center closeIcon">
<i class="material-icons icon-close-round"></i>
</div>
<div class="form-group">
<label for="formLocation">Choose your Location</label>
<div class="input-group searchLocality">
<div class="input-group-prepend" id="spo">
<div class="input-group-text bg-white"><i class="material-icons icon-map-pin-streamline d-flex"></i></div>
</div>

<input type="text" name="lloocality" autocomplete="off" placeholder="Type your Locality" class="form-control custom-select custom-select-sm show-on-mobile" id="mobileLocality" value="" />


</div>
<div class="message success m-t-10 d-none">Woooo! We deliver to your location in 60 mins</div>
<div class="message success m-t-10 invalid-location"></div>
</div>
<div class="m-t-20">

</div>
</div>
</div>

<section class="hide-md-down">
<div class="container max-w-lg-down-none">
<h1 class="h2 t-center m-b-30">Your Order Details</h1>
<div class="row cartScreen justify-content-center">
<div class="col-md-6 leftScreen d-none">
<div id="accordion">
<div class="card">
<div class="card-header" id="headingOne">
<h5 class="mb-0">
<a class="d-flex align-items-center justify-content-between btn btn-link collapsed accordianDisable" data-toggle="collapse" data-target="#loginCollapse" aria-expanded="true" aria-controls="loginCollapse">
<span class="d-flex align-items-center">Login / Signup <i class="material-icons icon-check m-l-15 successLogin"></i></span> <i class="material-icons icon-right-open-big d-flex m-l-15"></i>
</a>
</h5>
</div>
<div id="loginCollapse" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
<div class="card-body">
<form id="cartLoginScreen" name="loginForm">

<div class="form-group p-relative">

<input type="text" name="mobile" class="form-control" placeholder="Email / Mobile Number" id="mobNumber2">
<span class="formValidMsg login-mob-err"></span>
</div>

<div class="form-group m-b-5">
<input type="password" class="form-control" name="password" placeholder="Password" id="loginPwd2">
<span class="formValidMsg login-pwd-err"></span>
<input type="text" class="form-control d-none" name="otp" placeholder="Enter OTP Here" id="loginOtp2">
<button type="button" class="btn primaryBtn resendOtpBtn">Resend OTP</button>
<span class="formValidMsg login-otp-err"></span>
</div>
<div class="form-group mb-0">
<span class="formValidMsg login-cmn-err"></span>
</div>
<div class="d-flex justify-content-between m-b-10">

<span class="forgetLoginPwd smallText btn btn-link pl-0" onclick="forgotPassword('mobile')">
Forgot Password?
</span>
<span class="loginRequestOtp smallText btn btn-link pr-0" onclick="requestOTP('mobile')">
<span class="otp">Login with OTP?</span>
</span>
<span class="loginWithPwd smallText btn btn-link pr-0" onclick="changeToPassword('cartLoginScreen')">
<span class="pwd">Login with Password?</span>
</span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="btn primaryBtn m-t-20 m-b-20" id="cartLogin">Proceed</button>
<button type="button" class="btn btn-link createBtn p-l-0" class="font-w600">Create New Account</button>
</div>
</form>
<form class="createAccount" id="cartCreateAccount">
<div class="d-flex justify-content-between cols">
<div class="form-group">
<label for="firstName" class="col-form-label">Firstname</label>
<input type="text" class="form-control" id="firstName">
<span class="formValidMsg cr-fname-err"></span>
</div>
<div class="form-group">
<label for="lastName" class="col-form-label">Lastname</label>
<input type="text" class="form-control" id="lastName">
<span class="formValidMsg cr-lname-err"></span>
</div>
</div>
<div class="form-group p-relative">
<label for="email" class="col-form-label">Email</label>
<input type="email" class="form-control" id="email">
<span class="formValidMsg cr-email-err"></span>
</div>
<div class="form-group p-relative">
<label for="mobileNumber" class="col-form-label">Mobile Number</label>
<input type="number" class="form-control" id="mobileNumber">
<span class="formValidMsg cr-mob-err"></span>
</div>
<div class="form-group p-relative">
<label for="signupPwd" class="col-form-label">Password</label>
<input type="password" class="form-control" id="signupPwd">
<span class="formValidMsg cr-pwd-err"></span>
</div>
<div class="form-group p-relative">
<label for="confirmPwd" class="col-form-label">Confirm Password</label>
<input type="password" class="form-control" id="confirmPwd">
<span class="formValidMsg cr-cpwd-err"></span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="btn primaryBtn m-t-20 m-b-20 signUpProceed w-50">Sign Up</button>
<button type="button" class="btn btn-link bg-transparent cartBackToLogin p-l-0" class="font-w600">Already a member ? click here to login</button>
</div>
</form>
<form class="otpScreen" id="otpScreen1" name="otpForm">
<p class="sideNavBodyTitle">Confirm OTP</p>
<div class="form-group p-relative">
<label for="otp1" class="col-form-label">Enter OTP</label>
<input type="number" name="cartConfirmOtp" class="form-control" id="otp1" placeholder="Enter OTP received on mobile">
<span class="formValidMsg cr-otp-err"></span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="btn primaryBtn m-t-20 m-b-20 otpBtn" onclick="activateAccount('cartConfirmOtp')">Submit OTP</button>
</div>
</form>
</div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingTwo">
<h5 class="mb-0">
<a class="d-flex align-items-center justify-content-between btn btn-link collapsed accordianDisable" data-toggle="collapse" data-target="#deliveryCollapse" aria-expanded="false" aria-controls="deliveryCollapse">
<i class="material-icons icon-left-open-big d-flex m-r-15 show-md-down"></i> <span class="flex-grow-1 t-left">Delivery Details</span> <i class="material-icons icon-right-open-big d-flex m-l-15 hide-md-down"></i>
</a>
</h5>
</div>
<div id="deliveryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
<div class="card-body">
<div class="d-flex justify-content-around m-b-20 deliverBtns">
<div class="d-flex flex-column align-items-center deliverImgBtn now">
<button type="button" class="btn primaryBtnInverse m-1 active" onclick="deliveryTypeChanged(1)" data-deliver="1">
<img class="imgIcon" src="assets/deliver-now.png">
</button>
<span class="m-t-5">Deliver Now</span>
</div>
<div class="d-flex flex-column align-items-center deliverImgBtn later">
<button type="button" class="btn primaryBtnInverse m-1" onclick="deliveryTypeChanged(2)" data-deliver="2">
<img class="imgIcon" src="assets/deliver-later.png">
</button>
<span class="m-t-5">Deliver Later</span>
</div>

</div>
<div class='py-2 smallText text-danger d-none del-warn-msg'>* Only Scheduled Delivery because cleaning of Country Chicken / Prawns will take time.</div>
<div class="m-b-30 scheduleDelivery">
<h4 class="h4 m-b-30">Select delivery date</h4>
<div class="deliveryDates d-flex flex-wrap align-items-center">
<div class="dateSlot d-flex flex-column align-items-center">
<span class="month">JAN</span>
<span class="date">19</span>
<span class="week">SAT</span>
</div>
<div class="dateSlot d-flex flex-column align-items-center">
<span class="month">JAN</span>
<span class="date">20</span>
<span class="week">SUN</span>
</div>
</div>
</div>
<div class="m-b-30 scheduleDelivery">
<h4 class="h4 m-b-30">Choose Delivery Slots</h4>
<div class="deliveryTimes d-flex flex-wrap">
<span class="timeSlot slot1 active" data-slot="1">7AM - 9AM</span>
<span class="timeSlot slot2" data-slot="2">9AM - 11AM</span>
<span class="timeSlot slot3" data-slot="3">11AM - 1PM</span>
<span class="timeSlot slot4" data-slot="4">4PM - 6PM</span>
<span class="timeSlot slot5" data-slot="5">6PM - 8PM</span>
</div>

</div>
<div class="m-b-30">
<h4 class="h4 m-b-15">Special requests - tell us</h4>
<div class="form-group">
<textarea placeholder="Type here... [mutton small pieces, chicken 2 leg pieces]" class="form-control" id="special_request" name="special_request" rows="5"></textarea>
</div>
</div>
<div class="m-b-30">
<h4 class="h4 m-b-15">Choose Delivery Address</h4>
<div class="deliveryInfo">

</div>
<form class="infoForm p-15 bodyBgColor rounded w-100 m-t-30" id="addAddrScreen">
<div class="form-group address1">
<label for="address1">Address 1 *</label>
<textarea class="form-control" id="address1" rows="2"></textarea>
<span class="form-error"></span>
</div>

<div class="form-group landmark">
<label for="landmark">Landmark *</label>
<input type="text" class="form-control form-control-sm" id="landmark">
<span class="form-error"></span>
</div>
<div class="form-group area">
<label for="area">Area *</label>
<input type="text" class="form-control form-control-sm" id="area">
<span class="form-error"></span>
</div>
<div class="form-group city">
<label for="formCity">City *</label>
<input type="text" class="form-control form-control-sm" id="formCity">
<input type="hidden" class="addressid" value="">
<span class="form-error"></span>
</div>

<div class="d-flex align-items-center my-2 p-r-25" id="addressLocationCon">
<i class="material-icons icon-map-pin-streamline d-flex"></i>
<span class="smallLabel m-l-5 m-r-10">Your Selected Location : </span>
<span class="locationText text-truncate smallText" id="locationText">--</span>
<div class="searchBgOverlay"></div>
</div>
<div class="actionBtns d-flex align-items-center m-t-20">
<button type="button" class="btn primaryBtn m-r-10 w-50" onclick="saveAddress()">Save Address</button>
<button type="button" class="btn primaryBtnInverse w-50 addAddCancelBtn">Cancel</button>
</div>
</form>
</div>
<div class="actionBtns d-flex justify-content-between align-items-center">
<button type="button" class="btn primaryBtn deliverBtn w-50">Deliver Here</button>
<button type="button" class="btn btn-link bg-transparent addAddrBtn">+ Add new address</button>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingThree">
<h5 class="mb-0">
<a class="d-flex align-items-center justify-content-between btn btn-link collapsed accordianDisable" data-toggle="collapse" data-target="#paymentCollapse" aria-expanded="false" aria-controls="paymentCollapse">
<i class="material-icons icon-left-open-big d-flex m-r-15 show-md-down"></i> <span class="flex-grow-1 t-left">Payment Options</span> <i class="material-icons icon-right-open-big d-flex m-l-15 hide-md-down"></i>
</a>
</h5>
</div>
<div id="paymentCollapse" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-around m-b-20">
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1 paymentBtn" onclick="submitOrder('Paytm')">
<img class="imgIcon" src="assets/paytm.png">
</button>
<span class="m-t-5">Paytm</span>
</div>
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1 paymentBtn" onclick="submitOrder('Online')">
<img class="imgIcon" src="assets/online.png">
</button>
<span class="m-t-5">Online</span>
</div>
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1 paymentBtn" onclick="submitOrder('CAOD')">
<img class="imgIcon" src="assets/coad.png">
</button>
<span class="m-t-5">Card On Delivery</span>
</div>
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1 paymentBtn" onclick="submitOrder('COD')">
<img class="imgIcon" src="assets/cash.png">
</button>
<span class="m-t-5">Cash On Delivery</span>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 rightScreen">
<div class="minCartScreen text-center d-none">
<p>Minimum order price is <span class="rupee">&#x20B9;</span> 75 (Excluding Delivery Charges)</p>
</div>
<div class="card p-0">
<div class="orderSummary d-flex align-items-center flex-row flex-wrap divider-b">
<h4 class="w-100">Order Summary</h4>
<div class="list col-6 pl-0">
<span class="smallText m-b-10">Items</span>
</div>
<div class="list col-4 px-0">
<span class="smallText m-b-10">Quantity</span>
</div>
<div class="list col-2 px-0 text-center">
<span class="smallText m-b-10">Price</span>
</div>
</div>
<div class="cart-items">
</div>
<div class="billInfo divider-b" style="display: none;">
<div class="d-flex delCharges">
<p class="flex-grow-1 m-b-15 col-10 pl-0">Cart Total</p>
<div class="text-right col-2 p-r-10"><span class="rupee">&#x20B9</span> <span class="cart-value">-</span></div>
</div>
<div class="d-flex delCharges">
<p class="flex-grow-1 m-b-15 col-10 pl-0">Delivery Charges</p>
<div class="text-right col-2 p-r-10"><span class="rupee">+ &#x20B9</span> <span class="del-charge">25.0</span></div>
</div>
<div class="discount-block delCharges" style="display: none;">
<p class="flex-grow-1 m-b-15 col-10 pl-0">Promo Discount</p>
<div class="text-right col-2 p-r-10"><span class="rupee">- &#x20B9</span> <span class="discount"></span></div>
</div>
<div class="d-flex billTotal">
<p class="flex-grow-1 m-b-0 col-10 pl-0">Bill Total</p>
<div class="text-right col-2 pl-0 p-r-10"><span class="rupee">&#x20B9</span> <span class="cart-total">0</span></div>
</div>
</div>
<div class="promoCon p-15" id="desktopPromo">
<form class="form-inline flex-column align-items-start promoConInner">
<span class="flex-grow-1 m-b-10">Have a Promocode ? </span>
<div class="d-flex align-items-center w-100 p-relative m-b-5">
<div class="form-group flex-grow-1 m-r-10">
<input type="text" class="form-control w-100 promoCode" placeholder="Apply Code Here">
</div>
<button type="button" class="btn primaryBtn applyPromoCode">Apply</button>
</div>
<span class="promo-error" style="display: none">Invalid Code</span>
</form>
</div>
<div class="codeApplied">
<div class="p-15">
<div class="d-flex flex-grow-1 m-r-10">
<p class="m-b-0 m-r-5">Promo Code Applied: <span class="promoText font-w600 smallText"></span></p>
<i class="material-icons icon-cancel-circled d-flex align-items-center m-l-10 primaryTextColor removePromoCode"></i>
</div>

<div class="product-offer mt-3" style="display: none;">
<p></p>
</div>
</div>
</div>
<div class="available-promos p-3 m-3 d-none" style="display: none;">
<p>Available Offers</p>
<div class="promos"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="mobilePage show-md-down">
<div class="container cartDetailInfo max-w-sm-down-none">


<div class="mob-cart-items p-md-down-0">
<p class="my-5 py-5 w-100 text-center">Loading...</p>
</div>
<div class="bg-white charges-con" style="display: none;">
<div class="delCharges d-flex align-items-center justify-content-between px-3 p-t-10">
Cart Total <span class="rupee">&#x20B9 <span class="cart-value">-</span></span>
</div>
<div class="delCharges d-flex align-items-center justify-content-between px-3 p-t-10">
Delivery Charges <span class="rupee">+ &#x20B9 <span class="del-charge"> 25.0</span></span>
</div>
<div class="delCharges discount-block align-items-center justify-content-between px-3 p-t-10" style="display: none;">
Promo Discount <span class="rupee">- &#x20B9 <span class="discount"></span></span>
</div>
<div class="cartTotal d-flex align-items-center justify-content-between p-15 mb-4">
Bill Total <span class="rupee">&#x20B9 <span class="amount">0</span></span>
</div>
<div class="proceedAction flex-grow-1">
<button type="button" class="btn primaryBtn w-100">Proceed to Checkout</button>
</div>
</div>
<div class="dummy-con"></div>
</div>
<div class="container proceedToCart max-w-sm-down-none d-none">
<div class="row cartScreen">
<div class="col">

<div class="orderLogin">
<h2 class="h1 m-b-20 p-title backToCartInfoPage">
<i class="material-icons icon-left-open-big d-flex m-r-15 show-md-down"></i>
<span class="flex-grow-1 t-left loginText">Login or Register</span>
<span class="flex-grow-1 t-left createAccText d-none">Create Account</span>
</h2>
<div class="card">
<div class="card-body">
<form id="cartMobLoginScreen" name="loginForm">

<div class="form-group">

<input type="text" name="cartLoginMobile" class="form-control" placeholder="Email / Mobile Number" id="mobNumber1">
<span class="formValidMsg login-mob-err"></span>
</div>

<div class="form-group m-b-5">
<input type="password" class="form-control" name="cartLoginPassword" placeholder="Password" id="loginPwd1">
<span class="formValidMsg login-pwd-err"></span>
<input type="text" class="form-control d-none" name="cartOtp" placeholder="Enter OTP Here" id="loginOtp1">
<button type="button" class="btn primaryBtn resendOtpBtn">Resend OTP</button>
<span class="formValidMsg login-otp-err"></span>
</div>
<div class="form-group mb-0">
<span class="formValidMsg login-cmn-err"></span>
</div>
<div class="d-flex justify-content-between m-b-10">

<span class="forgetLoginPwd smallText btn btn-link pl-0" onclick="forgotPassword('cartLoginMobile')">
Forgot Password?
</span>
<span class="loginRequestOtp smallText btn btn-link pr-0" onclick="requestOTP('cartLoginMobile')">
<span class="otp">Login with OTP?</span>
</span>
<span class="loginWithPwd smallText btn btn-link pr-0" onclick="changeToPassword('cartMobLoginScreen')">
<span class="pwd">Login with Password?</span>
</span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="btn primaryBtn m-t-20 m-b-20 w-100" id="cartRespLogin">Proceed</button>
<button type="button" class="btn btn-link createBtn p-l-0 w-100" class="font-w600">Create New Account</button>
</div>
</form>
<form class="createAccount" id="createAccount">
<div class="d-flex justify-content-between cols">
<div class="form-group">

<input type="text" class="form-control" id="firstName" placeholder="FirstName">
<span class="formValidMsg cr-fname-err"></span>
</div>
<div class="form-group">

<input type="text" class="form-control" id="lastName" placeholder="LastName">
<span class="formValidMsg cr-lname-err"></span>
</div>
</div>
<div class="form-group p-relative">

<input type="email" class="form-control" id="email" placeholder="Email">
<span class="formValidMsg cr-email-err"></span>
</div>
<div class="form-group p-relative">

<input type="number" class="form-control" id="mobileNumber" placeholder="Mobile Number">
<span class="formValidMsg cr-mob-err"></span>
</div>
<div class="form-group p-relative">

<input type="password" class="form-control" id="signupPwd" placeholder="Password">
<span class="formValidMsg cr-pwd-err"></span>
</div>
<div class="form-group p-relative">

<input type="password" class="form-control" id="confirmPwd" placeholder="Confirm Password">
<span class="formValidMsg cr-cpwd-err"></span>
</div>
<div class="form-group">
<span class="formValidMsg cr-cmn-err"></span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="btn primaryBtn m-t-20 m-b-20 signUpProceed w-50">Sign Up</button>
<button type="button" class="btn btn-link bg-transparent cartBackToLogin p-l-0" class="font-w600">Already a member ? click here to login</button>
</div>
</form>
<form class="otpScreen" id="otpScreen2" name="otpForm">
<p class="sideNavBodyTitle">Confirm OTP</p>
<div class="form-group">
<label for="otp2" class="col-form-label">Enter OTP</label>
<input type="number" name="cartActOtp" class="form-control" id="otp2" placeholder="Enter OTP received on mobile">
<span class="formValidMsg cr-otp-err"></span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="btn primaryBtn m-t-20 m-b-20 otpBtn" onclick="activateAccount('cartActOtp')">Submit OTP</button>
</div>
</form>
</div>
</div>
</div>
<div class="deliveryCard">
<h2 class="m-b-20 align-items-center p-title backToSummaryPage"><i class="material-icons icon-left-open-big d-flex m-r-15 show-md-down"></i> <span class="flex-grow-1 t-left">Delivery Details</span></h2>
<div class="card">
<div class="card-body">
<h4 class="h4 m-b-15">Delivery Type</h4>
<div class="d-flex justify-content-around m-b-20 deliverBtns">
<div class="d-flex flex-column align-items-center deliverImgBtn now">
<button type="button" class="btn primaryBtnInverse m-1 active" onclick="deliveryTypeChanged(1)" data-deliver="1">
<img class="imgIcon" src="assets/deliver-now.png">
</button>
<span class="m-t-5">Deliver Now</span>
</div>
<div class="d-flex flex-column align-items-center deliverImgBtn later">
<button type="button" class="btn primaryBtnInverse m-1" onclick="deliveryTypeChanged(2)" data-deliver="2">
<img class="imgIcon" src="assets/deliver-later.png">
</button>
<span class="m-t-5">Deliver Later</span>
</div>
</div>
<div class='py-2 smallText text-danger d-none del-warn-msg'>* Only Scheduled Delivery because cleaning of Country Chicken / Prawns will take time.</div>
</div>
</div>
<div class="card scheduleDelivery">
<div class="card-body">
<div>
<h4 class="h4 m-b-15">Select Delivery Date</h4>
<div class="d-flex deliveryDates" style="width: 100%; overflow: auto;">
<div class="form-check">
<input class="form-check-input" type="radio" name="date" id="date1" value="Jan19Saturday">
<label class="form-check-label" for="date1">Jan 19 Saturday</label>
</div>
<div class="form-check">
<input class="form-check-input" type="radio" name="date" id="date2" value="Jan20Sunday">
<label class="form-check-label" for="date2">Jan 20 Sunday</label>
</div>
</div>
</div>
</div>
</div>
<div class="card scheduleDelivery">
<div class="card-body">
<div>
<h4 class="h4 m-b-15">Choose Delivery Slot</h4>
<div class="deliveryTimes d-flex flex-wrap">
<span class="timeSlot slot1 active" data-slot="1">7AM - 9AM</span>
<span class="timeSlot slot2" data-slot="2">9AM - 11AM</span>
<span class="timeSlot slot3" data-slot="3">11AM - 1PM</span>
<span class="timeSlot slot4" data-slot="4">4PM - 6PM</span>
<span class="timeSlot slot5" data-slot="5">6PM - 8PM</span>
</div>


</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div>
<h4 class="h4 m-b-15">Special requests - tell us</h4>
<div class="form-group">
<textarea placeholder="Type here... [mutton small pieces, chicken 2 leg pieces]" class="form-control" id="special_request" name="special_request" rows="5"></textarea>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div>
<h4 class="h4 m-b-15">Choose Delivery Address</h4>
<div class="deliveryInfo m-b-15">

</div>
<form class="infoForm p-15 bodyBgColor rounded w-100 m-t-20 m-b-20" id="addAddrScreenResp">
<div class="form-group address1">

<textarea class="form-control" placeholder="Address 1 *" id="address1" rows="2"></textarea>
<span class="form-error"></span>
</div>

<div class="form-group landmark">

<input type="text" placeholder="Landmark *" class="form-control form-control-sm" id="landmark">
<span class="form-error"></span>
</div>
<div class="form-group area">

<input type="text" placeholder="Area *" class="form-control form-control-sm" id="area">
<span class="form-error"></span>
</div>
<div class="form-group city">

<input type="text" placeholder="City *" class="form-control form-control-sm" id="formCity">
<span class="form-error"></span>
<input type="hidden" class="addressid" value="">
</div>

<div class="d-flex align-items-center my-2 p-r-25" id="addressLocationCon">
<i class="material-icons icon-map-pin-streamline d-flex white-text"></i>
<span class="smallLabel m-l-5 m-r-10">Location : </span>
<span class="locationText text-truncate smallText" id="locationText">--</span>
<div class="searchBgOverlay"></div>
</div>
<div class="actionBtns d-flex align-items-center m-t-20">
<button type="button" class="btn primaryBtn m-r-10 w-50" onclick="saveAddress()">Save Address</button>
<button type="button" class="btn primaryBtnInverse w-50 addAddCancelBtn">Cancel</button>
</div>
</form>
</div>
<div class="actionBtns d-flex justify-content-between align-items-center">
<button type="button" class="btn primaryBtn deliverBtn w-50">Deliver Here</button>
<button type="button" class="btn btn-link bg-transparent addAddrBtn">+ Add new address</button>
</div>
</div>
</div>
<button type="button" class="btn primaryBtn previewOrder w-100 m-b-20 p-t-10 p-b-10">Order Preview</button>
</div>
<div class="previewCard">
<h2 class="m-b-20 d-flex align-items-center backToDeliveryPage p-title">
<i class="material-icons icon-left-open-big d-flex m-r-15 show-md-down"></i>
<span class="flex-grow-1 t-left">Order Preview</span>
</h2>
<div class="card">
<div class="card-body">
<div class="bg-white charges-con" style="display: none;">
<div class="delCharges d-flex align-items-center justify-content-between">
Cart Total <span class="rupee">&#x20B9 <span class="cart-value">-</span></span>
</div>
<div class="delCharges d-flex align-items-center justify-content-between p-t-10">
Delivery Charges <span class="rupee">+ &#x20B9 <span class="del-charge"> 25.0</span></span>
</div>
<div class="delCharges discount-block align-items-center justify-content-between p-t-10" style="display: none;">
Promo Discount <span class="rupee">- &#x20B9 <span class="discount"></span></span>
</div>
<div class="cartTotal d-flex align-items-center justify-content-between pt-3">
Bill Total <span class="rupee">&#x20B9 <span class="amount">0</span></span>
</div>
</div>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="promoCon p-t-5 p-b-5">

<form class="form-inline flex-column align-items-start promoConInner">
<span class="flex-grow-1 m-b-10">Have a Promocode ? </span>
<div class="d-flex align-items-center w-100 p-relative m-b-5">
<div class="form-group flex-grow-1 m-b-0 m-r-10">
<input type="text" class="form-control w-100 promoCode" placeholder="Apply Code Here">
</div>
<button type="button" class="btn primaryBtn applyPromoCode">Apply</button>
</div>
<span class="promo-error" style="display: none">Invalid Code</span>
</form>
</div>
<div class="codeApplied bg-white">
<div class="d-flex">
<div class="d-flex flex-grow-1 m-r-10">
<p class="m-b-0 m-r-5">Promo Code Applied: <span class="promoText font-w600 smallText"></span></p>
<i class="material-icons icon-cancel-circled d-flex align-items-center m-l-10 primaryTextColor removePromoCode"></i>
</div>

</div>
</div>
</div>
</div>
<div class="card available-promos d-none" style="display: none;">
<div class="card-body">
<div class="mt-3">
<p>Available Offers</p>
<div class="promos"></div>
</div>
</div>
</div>
<button type="button" class="btn primaryBtn proceedToPay w-100 m-b-20 p-t-10 p-b-10">Pay now</button>
</div>
<div class="paymentCard">
<h2 class="m-b-20 d-flex align-items-center backToPreviewPage p-title"><i class="material-icons icon-left-open-big d-flex m-r-15 show-md-down"></i> <span class="flex-grow-1 t-left">Payment Options</span></h2>
<div class="card">
<div class="card-body">
<div class="d-flex flex-wrap justify-content-around m-b-20">
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1" onclick="submitOrder('Paytm')">
<img class="imgIcon" src="assets/paytm.png">
</button>
<span class="m-t-5">Paytm</span>
</div>
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1" onclick="submitOrder('Online')">
<img class="imgIcon" src="assets/online.png">
</button>
<span class="m-t-5">Online</span>
</div>
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1" onclick="submitOrder('CAOD')">
<img class="imgIcon" src="assets/coad.png">
</button>
<span class="m-t-5">Card On Delivery</span>
</div>
<div class="w-50 d-flex flex-column align-items-center m-b-15">
<button type="button" class="btn primaryBtnInverse m-1" onclick="submitOrder('COD')">
<img class="imgIcon" src="assets/cash.png">
</button>
<span class="m-t-5">Cash On Delivery</span>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<footer class="m-t-20 m-md-down-0">

<div class="footerCon hide-md-down">
<div class="container-fluid">
<div class="row flex-wrap m-b-20">
<div class="col col-cust m-b-20 flex-grow-1">
<h3 class="m-b-25">Delivery Slots</h3>
<ul type="none" class="deliverySlots p-l-0 d-flex flex-wrap">
<li class="p-r-15 m-b-10 w-50">7AM - 9AM</li>
<li class="p-r-15 m-b-10 w-50">9AM - 11AM</li>
<li class="p-r-15 m-b-10 w-50">11AM - 1PM</li>
<li class="p-r-15 m-b-10 w-50">4PM - 6PM</li>
<li class="p-r-15 m-b-10 w-50">6PM - 8PM</li>
</ul>
</div>
<div class="col col-cust m-b-20 flex-grow-1">
<h3 class="m-b-25">About Us</h3>
<ul type="none" class="p-l-0">
<li class="m-r-15 m-b-10">Email: <a href="cdn-cgi/l/email-protection.php" class="__cf_email__" data-cfemail="c7b4b2b7b7a8b5b387a8a9abbeaaa2a6b3e9aea9">[email&#160;protected]</a></li>
<li class="m-r-15 m-b-10"><a href="about.php">About Us</a></li>
<li class="m-r-15 m-b-10"><a href="store-locations.php">Store Locations</a></li>

</ul>
</div>
<div class="col col-cust m-b-20 flex-grow-1">
<h3 class="m-b-25">Categories</h3>
<ul type="none" class="p-l-0">
<li class="m-r-15 m-b-10 text-capitalize"><a href="chicken.php">Chicken</a></li>
<li class="m-r-15 m-b-10 text-capitalize"><a href="fish.php">Fish</a></li>
<li class="m-r-15 m-b-10 text-capitalize"><a href="mutton.php">Mutton</a></li>
<li class="m-r-15 m-b-10 text-capitalize"><a href="prawns.php">Prawns</a></li>
<li class="m-r-15 m-b-10 text-capitalize"><a href="eggs.php">Eggs</a></li>
<li class="m-r-15 m-b-10 text-capitalize"><a href="more.php">More</a></li>
</ul>
</div>
<div class="col col-cust m-b-20 flex-grow-1">
<h3 class="m-b-25">Customer Services</h3>
<ul type="none" class="p-l-0">
 <li class="m-r-15 m-b-10"><a href="returns.php">Shipping & Returns</a></li>
<li class="m-r-15 m-b-10"><a href="terms-and-conditions.php">Terms & Conditions</a></li>
<li class="m-r-15 m-b-10"><a href="privacy-policy.php">Privacy Policy</a></li>
</ul>
</div>
</div>
<div class="socialLinks d-flex align-items-center justify-content-center hide-md-down">
<a href="https://www.facebook.com/onlymeat.in" target="_blank" class="d-flex colorDefualt"><i class="material-icons icon-facebook"></i></a>
<a href="https://www.instagram.com/onlymeat.in" target="_blank" class="d-flex colorDefualt"><i class="material-icons icon-instagram"></i></a>



</div>
</div>
</div>
<div class="mobileFooterIcos show-md-down d-flex align-items-center">
<ul class="nav justify-content-around align-items-center">
<li class="nav-item homePageIcon">
<a class="nav-link" href="index.php">
<i class="material-icons icon-home fillIcon"></i>
<i class="material-icons icon-home-house-streamline outlineIcon"></i>
</a>
</li>
<li class="nav-item cartPageIcon">
<a class="nav-link p-relative" href="checkout.php">
<i class="material-icons icon-cart-outline outlineIcon "></i>
<i class="material-icons icon-cart-fill fillIcon"></i>
<div class="cart-number"></div>
</a>
</li>
<li class="nav-item profilePageIcon">
<a class="nav-link profileLink" href="profile.php">
<i class="material-icons icon-user fillIcon"></i>
<i class="material-icons icon-user-outline outlineIcon"></i>
</a>

<span class="d-flex align-items-center custSideNav pointer smallText signin nav-link" data-id="loginSideNav">
<i class="material-icons icon-user fillIcon"></i>
<i class="material-icons icon-user-outline outlineIcon"></i>
</span>
</li>
</ul>
</div>
<div class="alertModal">
<div class="container p-md-down-0">
<div class="checkOutInner d-flex align-items-center flex-wrap flex-md-nowrap justify-content-center justify-content-md-end">
<div class="flex-grow-1 d-flex align-items-center">

<div class="d-flex flex-column m-l-20">
<span class="font-w600 h5 p-t-5 alert-message"></span>
</div>
</div>
<div class="p-t-15 p-b-15">
<button type="button" class="btn successBtn" onclick="hideCustomAlert()">Close</button>
</div>
</div>
</div>
</div> </footer>

<div class="modal fade minCartDialog" tabindex="-1" role="dialog" aria-labelledby="cartErrorModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm">
<div class="modal-content">
<div class="d-flex flex-column align-items-center p-15">
<div class="text-center">Minimum order price is <span class="rupee">&#x20B9;</span> 75 (excluding delivery charges)</div>
<button onclick="closeModal('.minCartDialog')" class="btn btn-danger btn-sm mt-3 w-25">OK</button>
</div>
</div>
</div>
</div>
<div class="custSideNavContent" id="loginSideNav">
<div class="sideNavHeader d-flex align-items-center justify-content-center">
<img src="assets/logo.png" alt="mutton" />

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
<p class="sideNavBodyTitle">Login to OnlyMeat.in</p>
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
<form class="createAccount" id="createAccount">
<p class="sideNavBodyTitle">Create Account</p>

<div class="form-group">

<input type="text" class="form-control" placeholder="Firstname" id="spFirstName">
<span class="formValidMsg cr-fname-err"></span>
</div>
<div class="form-group">

<input type="text" class="form-control" placeholder="Lastname" id="spLastName">
<span class="formValidMsg cr-lname-err"></span>
</div>

<div class="form-group">

<input type="email" class="form-control" placeholder="Email" id="spEmail">
<span class="formValidMsg cr-email-err"></span>
</div>
<div class="form-group">

<input type="number" class="form-control" placeholder="Mobile Number" id="spMobNumber">
<span class="formValidMsg cr-mob-err"></span>
</div>
<div class="form-group">

<input type="password" class="form-control" placeholder="Password" id="spLoginPwd">
<span class="formValidMsg cr-pwd-err"></span>
</div>
<div class="form-group">

<input type="password" class="form-control" placeholder="Confirm Password" id="spLoginConfPwd">
<span class="formValidMsg cr-cpwd-err"></span>
</div>
<div class="form-group">
<span class="formValidMsg cr-cmn-err"></span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="btn primaryBtn m-t-10 m-b-20 signUpBtn w-50">Sign Up</button>
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
</div>
<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="../apis.google.com/js/api_client.js"></script>
<div class="custSideNavContent" id="mobileUpdateSideNav">
<div class="sideNavBody">
<div class="closemobileUpdateSideNav d-flex align-items-center justify-content-end show-md-down white-text">
<i class="material-icons icon-close-round"></i>
</div>
<div class="mt-md-5 pt-md-5">
<form id="mobileUpdate">
<p class="sideNavBodyTitle">Update Mobile Number</p>
<span class="smallText">Please update your mobile number to receive updates related to your orders.</span>
<div class="form-group mt-4">
<input type="number" class="form-control" name="fbMobile" placeholder="Mobile Number" id="fbMobileNo">
<span class="formValidMsg per-mob-err"></span>
</div>
<div class="form-group m-b-5">

<input type="text" class="form-control d-none" name="mobileUpdateOTP" placeholder="Enter OTP Here" id="fbMobOtp">
<span class="formValidMsg per-otp-err"></span>
</div>
<div class="d-flex justify-content-between m-b-10">

</div>
<div class="form-group">
<span class="formValidMsg login-cmn-err"></span>
</div>
<div class="d-flex flex-column align-items-start">
<button type="button" class="fbRequestOtp smallText btn primaryBtn w-100" onclick="requestProfileOtp('#fbMobileNo')">
<span class="otp">Request OTP</span>
</button>
<button type="button" class="btn primaryBtn m-t-10 m-b-5 w-100 d-none btnUpdateMobile" onclick="updateUserMobile()">Update Mobile</button>
</div>
</form>
</div>
</div>
</div>
<div class="bgOverlay"></div>
<div class="pageLoader">

<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
<div> </main>

<?php include 'footer.php';?>

</html>
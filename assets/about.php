<?php include 'header.php';?>
<body>
<main class="storePage">
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
<div class="flex align-items-center mobileTitleHeader show-md-down">
<div class="d-flex align-items-center m-r-10 flex-grow-1">
<i class="material-icons icon-left-open-big m-r-10 d-flex" onclick="goBack()"></i> <span class="text-capitalize"></span>
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

<section>
<div class="container max-w-lg-down-none m-b-20">
<h2 class="h2 m-b-30 primaryTextColor">About Us</h2>
<div class="row">
<div class="col">
<p><a class="colorDefualt" href="index.php">ONLYMEAT.in</a> is India's first convenient online fresh meat ordering site based out in Hyderabad. With the wide range of options in every meat category, we give you the fresh and hygienic meat of best quality at fair prices. ONLYMEAT.in is a part of Livraison food prodcuts pvt ltd. Onlymeat is the Hyderabad's only online store for delivering fresh chicken, mutton and including all the varieties of sea food; ONLYMEAT.in is in the process of establishing production and procuring units here in Hyderabad, for the people of Hyderabad to have the delivery availability of chicken orders to their door steps. ONLYMEAT.in is has been successful in delivering Gachibowli, Kondapur, Hitech City of West Hyderabad and very soon the delivering units will start in all parts of Hyderabad, Bangalore, Chennai and some other South Indian cities.</p>
</div>
</div>
</div>
</section>
<footer>

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
<li class="m-r-15 m-b-10">Email: <a href="cdn-cgi/l/email-protection.php" class="__cf_email__" data-cfemail="3c4f494c4c534e487c5352504551595d48125552">[email&#160;protected]</a></li>
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
</main>
<?php include 'footer.php';?>

</html>
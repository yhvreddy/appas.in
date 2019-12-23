<?php include 'header.php';?>
<body>
<main class="homePage">
<header class="header m-b-30">
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
<div class="container-fluid">

<div id="carouselMobIndicators" class="mobCarousel carousel slide show-md-down" data-ride="carousel">
<ol class="carousel-indicators">

</ol>
<div class="carousel-inner">

</div>

</div>
<div class="row justify-content-center">
<div class="col-lg-11 row">
<div class="col-lg-5 d-flex flex-column justify-content-center p-relative">
<div id="carouselExampleFade" class="carousel carousel-fade hide-md-down" data-ride="carousel">
<ol class="carousel-indicators">

</ol>
<div class="carousel-inner">

</div>

</div>

<div class="hide-md-down">
<div class="d-flex justify-content-between align-items-center offerBlock m-t-30">
<img class="offerImg" src="assets/eggs.png" alt="eggs">
<div class="offerText">
Order on App &<br /><span>GET 6 EGGS FREE</span>
</div>
<div class="d-flex flex-column align-items-center">
<a href="https://play.google.com/store/apps/details?id=com.zestwings.onlymeatgateway&amp;hl=en"><img class="img-fluid appImg m-b-5" src="assets/playstore.jpg" alt="strore"></a>
<a href="https://itunes.apple.com/us/app/onlymeat/id1310521641?mt=8"><img class="img-fluid appImg" src="assets/app_store.png" alt="strore"></a>
</div>
</div>
</div>
</div>
<div class="col-lg-7 col-xl-6 offset-xl-1 curveDesign d-flex flex-column">
<div class="productsChart flex-grow-1 d-flex flex-column">
<h2 class="hide-md-down">Select and Buy</h2>
<div class="row categories-list">
<div class="col-xl-6 p-md-down-0">
<div class="card productCard product1 flex-row-reverse pointer w-100 catCustSideNav" data-id="productSideNav" onclick="selectCategory(0)">
<img class="card-img-top img-fluid align-self-center" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/images/images/category/2f7f9719284bd46b0f2cbb23e71154af.png" alt="Chicken Image">
<div class="card-body">
<h5 class="card-title">Chicken</h5>
<h6 class="card-subtitle mb-2 text-muted smallLabel">13 Customizations</h6> </div>
</div>
</div>
<div class="col-xl-6 p-md-down-0">
 <div class="card productCard product1 flex-row-reverse pointer w-100 catCustSideNav" data-id="productSideNav" onclick="selectCategory(1)">
<img class="card-img-top img-fluid align-self-center" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/images/images/category/0e7b971c040873dea51037ca9c1bd4e5.png" alt="Fish Image">
<div class="card-body">
<h5 class="card-title">Fish</h5>
<h6 class="card-subtitle mb-2 text-muted smallLabel">5 Customizations</h6> </div>
</div>
</div>
<div class="col-xl-6 p-md-down-0">
<div class="card productCard product1 flex-row-reverse pointer w-100 catCustSideNav" data-id="productSideNav" onclick="selectCategory(2)">
<img class="card-img-top img-fluid align-self-center" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/images/images/category/ec1ca2c909c721b552250693d3882286.png" alt="Mutton Image">
<div class="card-body">
<h5 class="card-title">Mutton</h5>
<h6 class="card-subtitle mb-2 text-muted smallLabel">4 Customizations</h6> </div>
</div>
</div>
<div class="col-xl-6 p-md-down-0">
<div class="card productCard product1 flex-row-reverse pointer w-100 catCustSideNav" data-id="productSideNav" onclick="selectCategory(3)">
<img class="card-img-top img-fluid align-self-center" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/images/images/category/e84887b301b6205d308e1c1d613d773b.png" alt="Prawns Image">
<div class="card-body">
<h5 class="card-title">Prawns</h5>
<h6 class="card-subtitle mb-2 text-muted smallLabel">2 Customizations</h6> </div>
</div>
</div>
<div class="col-xl-6 p-md-down-0">
<div class="card productCard product1 flex-row-reverse pointer w-100 catCustSideNav" data-id="productSideNav" onclick="selectCategory(4)">
<img class="card-img-top img-fluid align-self-center" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/images/images/category/0ba9b2a14699338538126993a05f9217.png" alt="Eggs Image">
<div class="card-body">
<h5 class="card-title">Eggs</h5>
<h6 class="card-subtitle mb-2 text-muted smallLabel">4 Customizations</h6> </div>
</div>
</div>
<div class="col-xl-6 p-md-down-0">
<div class="card productCard product1 flex-row-reverse pointer w-100 catCustSideNav" data-id="productSideNav" onclick="selectCategory(5)">
<img class="card-img-top img-fluid align-self-center" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/images/images/category/6921e32b35128fee6fe8348235d6abcd.png" alt="More Image">
<div class="card-body">
<h5 class="card-title">More</h5>
<h6 class="card-subtitle mb-2 text-muted smallLabel">7 Customizations</h6> </div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</section>
<section class="section2 hide-md-down">
<div class="container">
<h2>Why to choose OnlyMeat?</h2>
<div class="row align-items-end">
<div class="col-md-4">
<div class="card bg-trasparent pointer m-b-30 w-100 align-items-center">
<img class="card-img-top img-fluid" src="assets/freshmeat_img.png" alt="Fresh meat">
<div class="card-body d-flex justify-content-center">
<h5 class="card-title font-w900 color1">We Serve Fresh Meat</h5>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card bg-trasparent pointer m-b-30 w-100 align-items-center">
<img class="card-img-top img-fluid" src="assets/Delivery_boy.png" alt="Delivery boy">
<div class="card-body d-flex justify-content-center">
<h5 class="card-title font-w900 color2">Delivered in 60 mins</h5>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card bg-trasparent pointer m-b-30 w-100 align-items-center">
<img class="card-img-top img-fluid" src="assets/Best_quality.png" alt="Best quality">
<div class="card-body d-flex justify-content-center">
<h5 class="card-title font-w900 color3">Best Quality Assured</h5>
</div>
</div>
</div>
</div>
</div>
<div class="container-fluid">
<div class="row s3_circles d-flex justify-content-center hide-md-down">
<div class="col col-xl-11">
<img class="img-fluid w-100" src="assets/footer_img.png" alt="footer_img" />
</diV>

</div>
</div>
</section>
<footer>

<div class="seoCon">
<div class="container-fluid">
<div class="row flex-wrap m-t-15">
<div class="col col-cust m-b-10 flex-grow-1 no-pad">
<h1 class="page-title m-b-15">Only Fresh and Quality Meat</h1>
<p class="page-desc">At Only Meat, Our Top Priorities Are Always Pointed Towards How Fresh and Great The Quality Of The Meat Is At All Times. Day in and Day out.
All The Meat That Comes in And Goes Out Undergoes 3 Stages Of Manual Cleaning and Testing for Freshness, Quality and Tenderness.</p>
</div>
</div>
</div>
</div>
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
<li class="m-r-15 m-b-10">Email: <a href="cdn-cgi/l/email-protection.php" class="__cf_email__" data-cfemail="a5d6d0d5d5cad7d1e5cacbc9dcc8c0c4d18bcccb">[email&#160;protected]</a></li>
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
<div class="custSideNavContent" id="productSideNav">
<div class="sideNavHeader d-flex align-items-center justify-content-center">
<img class="headImage" src="assets/logo.jpeg" alt="sidebar image" />
<h3 class="sideNavtitle d-flex align-items-center justify-content-center"></h3>
<div class="closeSideNav d-flex align-items-center justify-content-center">
<i class="material-icons icon-close-round d-flex white-text"></i>
</div>
</div>
<div class="sideNavBody p-relative">
<div class="closeSideNav d-flex align-items-center justify-content-center show-md-down">
<i class="material-icons icon-close-round d-flex"></i>
</div>
<p class="sideNavBodyTitle">What would you like to choose?</p>
<div class="d-flex flex-lg-column justify-content-around justify-content-lg-start pt-3 sub-categories">
<figure class="chooseItem">
<a href="mutton-goat.php">
<img class="img-fluid" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/goat_chip_img.png" alt="goat_chip_img">
</a>
<figcaption>Goat</figcaption>
</figure>
<figure class="chooseItem">
<a href="mutton-sheep.php">
<img class="img-fluid" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="assets/sheep_chip_img.png" alt="sheep_chip_img">
</a>
<figcaption>Sheep</figcaption>
</figure>
</div>
</div>
</div>
<div class="checkOutModal">
<div class="closeIcon closeCheckOut d-flex align-items-center justify-content-center">
<i class="material-icons icon-close-round"></i>
</div>
<div class="container p-md-down-0">
<div class="checkOutInner d-flex align-items-center justify-content-center">
<div class="flex-grow-1 d-flex align-items-center">
<i class="material-icons icon-check d-flex"></i>
<div class="d-flex flex-column m-l-15">
<span class="font-w600 h5 p-t-5">Your Order has been placed successfully.</span>
<span>Order Id: <span class="order-number"></span></span>
</div>
</div>
<div class="p-t-15 p-b-15 m-l-10">
<button type="button" class="btn successBtn" onclick="goto('/profile#orders')">VIEW ORDER</button>
</div>
</div>
</div>
</div>
<?php include 'sidebar.php';?>
<script data-cfasync="false" src="assets/email-decode.min.js"></script>
<script src="assets/js/api_client.js"></script>
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

<script>
	 var categories = [{"name":"Chicken","url":"\/Chicken","image":"https:\/\/cdn.onlymeat.in\/assets/images\/category\/2f7f9719284bd46b0f2cbb23e71154af.png","desc":"4 Customizatoins","subCategories":[{"name":"Country","url":"\/Country","image":"https:\/\/cdn.onlymeat.in\/assets/images\/subcategory\/4e0164a01e5b66cb062b806006540557.png"},{"name":"Broiler","url":"\/Broiler","image":"https:\/\/cdn.onlymeat.in\/assets/images\/subcategory\/30ec0f3c5b7515d9613d7b97a0647b72.png"}]},{"name":"Fish","url":"\/Fish","image":"https:\/\/cdn.onlymeat.in\/assets/images\/category\/0e7b971c040873dea51037ca9c1bd4e5.png","desc":"Fish Category","subCategories":[]},{"name":"Mutton","url":"\/Mutton","image":"https:\/\/cdn.onlymeat.in\/assets/images\/category\/ec1ca2c909c721b552250693d3882286.png","desc":"2 customizations","subCategories":[]},{"name":"Prawns","url":"\/Prawns","image":"https:\/\/cdn.onlymeat.in\/assets/images\/category\/e84887b301b6205d308e1c1d613d773b.png","desc":"Prawns","subCategories":[]},{"name":"Eggs","url":"\/Eggs","image":"https:\/\/cdn.onlymeat.in\/assets/images\/category\/0ba9b2a14699338538126993a05f9217.png","desc":"Eggs","subCategories":[]},{"name":"More","url":"\/More","image":"https:\/\/cdn.onlymeat.in\/assets/images\/category\/6921e32b35128fee6fe8348235d6abcd.png","desc":"More","subCategories":[]}];
	</script>
<?php include 'footer.php';?>
</body>

</html>
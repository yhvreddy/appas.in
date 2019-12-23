<?php include 'header.php';?>
<body>
<main class="productPage">
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
<a class="nav-link active" href="chicken.php">Chicken</a>
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
<i class="material-icons icon-left-open-big m-r-10 d-flex" onclick="goBack()"></i> <span class="text-capitalize">chicken Customization</span>
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

<ul class="nav mobile-nav mb-1 show-md-down">
<li class="nav-item">
<a class="nav-link text-capitalize active" href="chicken.php">Chicken</a>
</li>
<li class="nav-item">
<a class="nav-link text-capitalize " href="fish.php">Fish</a>
</li>
<li class="nav-item">
<a class="nav-link text-capitalize " href="mutton.php">Mutton</a>
</li>
<li class="nav-item">
<a class="nav-link text-capitalize " href="prawns.php">Prawns</a>
</li>
<li class="nav-item">
<a class="nav-link text-capitalize " href="eggs.php">Eggs</a>
</li>
<li class="nav-item">
<a class="nav-link text-capitalize " href="more.php">More</a>
</li>
</ul>
<section class="productSectionInfo">
<div class="container">
 <div class="row">
<div class="col">
<div class="filterCon d-flex align-items-md-center flex-column flex-md-row">
<span class="m-r-10 filter-text">Filter By:</span>
<ul type="none" class="p-l-0 m-b-0 d-flex align-items-center">
<li class="pointer " onclick="goto('/chicken-country')">
<img src="assets/images/subcategory/4e0164a01e5b66cb062b806006540557.png"> <i class="material-icons icon-check"></i> Country </li>

<li class="pointer " onclick="goto('/chicken-broiler')">
<img src="assets/images/subcategory/30ec0f3c5b7515d9613d7b97a0647b72.png"> <i class="material-icons icon-check"></i> Broiler </li>

</ul>
</div>
</div>
</div>
<div class="row products-list">
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_1" data-price="248">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/01c9601af934253095c3161c34367845.jpg" onclick="goto('/chicken/skinless')" alt="Chicken Skinless">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/skinless.php" class="m-b-5">
<span class="prod-title">Chicken Skinless</span>
</a>
<span class="rate m-b-5">&#x20B9; 248 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Tender and Wholesome Skinless Bone In Chicken Curry Cut With Legs, Wings and Breast in Big Chunks</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 62</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 124</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 186</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 248</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 310</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 372</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 496</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 620</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 744</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 868</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 992</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(1, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(1, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_2" data-price="248">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/4254e85f60212c3e7b2940d3eaf2a2d4.jpg" onclick="goto('/chicken/skinless-small-cut')" alt="Chicken Skinless (small cut)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/skinless-small-cut.php" class="m-b-5">
<span class="prod-title">Chicken Skinless (small cut)</span>
</a>
<span class="rate m-b-5">&#x20B9; 248 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Bite Sized Curry Cut Chunks of Skinless Wholesome and Farm Bred Chicken</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 62</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 124</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 186</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 248</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 310</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 372</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 496</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 620</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 744</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 868</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 992</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(2, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(2, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_3" data-price="508">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/41e6f4d9da7feecdc27c52f0d2943428.jpg" onclick="goto('/chicken/chicken-boneless')" alt="Chicken Boneless">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/chicken-boneless.php" class="m-b-5">
<span class="prod-title">Chicken Boneless</span>
</a>
<span class="rate m-b-5">&#x20B9; 508 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Succulent and Juicy Boneless Whole of The Pinkish Fleshed Chicken Cut Into Fine Bite Sized Chunks</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 127</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 254</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 381</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 508</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 635</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 762</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 1016</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 1270</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 1524</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 1778</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 2032</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(3, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(3, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_4" data-price="420">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/eb8734724ac0c9e52717005e2114cb3b.jpg" onclick="goto('/chicken/leg-pieces')" alt="Chicken Leg Pieces">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/leg-pieces.php" class="m-b-5">
<span class="prod-title">Chicken Leg Pieces</span>
</a>
<span class="rate m-b-5">&#x20B9; 420 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Skinless, Bone In and Neatly Curry Cut Drumstick and Thigh Pieces Of Farm Fresh Chicken</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 105</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 210</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 315</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 420</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 525</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 630</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 840</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 1050</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 1260</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 1470</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 1680</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(4, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(4, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_5" data-price="420">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/e23c77edd311fb828a02c5f65018efc3.jpg" onclick="goto('/chicken/breast-with-bones')" alt="Chicken Breast (with bones)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/breast-with-bones.php" class="m-b-5">
<span class="prod-title">Chicken Breast (with bones)</span>
</a>
<span class="rate m-b-5">&#x20B9; 420 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Tender and Juicy Bone in Skinless Chicken Breast Pieces Cleaned And Uncut For A Meaty Experience</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 105</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 210</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 315</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 420</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 525</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 630</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 840</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 1050</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 1260</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 1470</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 1680</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(5, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(5, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_6" data-price="508">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/853f5ec8c7c57852b7851e3823155dd7.jpg" onclick="goto('/chicken/breast-boneless')" alt="Chicken Breast (Boneless)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/breast-boneless.php" class="m-b-5">
<span class="prod-title">Chicken Breast (Boneless)</span>
</a>
<span class="rate m-b-5">&#x20B9; 508 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Exquisitely Succulent and Tender Boneless Breast Pieces Pinkish Coloured and Neatly Cut</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 127</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 254</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 381</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 508</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 635</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 762</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 1016</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 1270</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 1524</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 1778</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 2032</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(6, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(6, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_7" data-price="216">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/1032a6445fdf6002912487a531b0e9fd.jpg" onclick="goto('/chicken/chicken-with-skin')" alt="Chicken (With Skin)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/chicken-with-skin.php" class="m-b-5">
<span class="prod-title">Chicken (With Skin)</span>
</a>
<span class="rate m-b-5">&#x20B9; 216 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Bite sized curry cut chicken with skin neatly cleaned and processed for utmost taste and experience</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 54</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 108</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 162</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 216</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 270</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 324</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 432</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 540</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 648</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 756</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 864</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(7, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(7, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_8" data-price="520">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/1d8bd4765b2adad065e1dc5209236f8a.jpg" onclick="goto('/chicken/keema-chicken')" alt="Keema Chicken">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/keema-chicken.php" class="m-b-5">
<span class="prod-title">Keema Chicken</span>
</a>
<span class="rate m-b-5">&#x20B9; 520 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Fresh and Hygienically Processed Farm Fresh Chicken Minced Into Fine Pulpy Consistency</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 130</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 260</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 390</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 520</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 650</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 780</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 1040</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 1300</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 1560</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 1820</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 2080</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(8, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(8, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_9" data-price="200">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/76f4ef2d68d2e659afec0ada816141e9.jpg" onclick="goto('/chicken/chicken-liver')" alt="Chicken Liver">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/chicken-liver.php" class="m-b-5">
<span class="prod-title">Chicken Liver</span>
</a>
<span class="rate m-b-5">&#x20B9; 200 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Bite Sized Curry Cut Chicken Liver Packed Hygienically To Retain Its Nutritional Value</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="0.25">250 gms &#x00A0;&#x00A0;&#x20B9 50</option><option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 100</option><option value="0.75">750 gms &#x00A0;&#x00A0;&#x20B9 150</option><option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 200</option><option value="1.25">1.25 kg &#x00A0;&#x00A0;&#x20B9 250</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 300</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 400</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 500</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 600</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 700</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 800</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(9, false, '')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(9, true, '')">Buy Now</button>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_10" data-price="500">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/e6376674e609204419a3791ddd9b7e5c.jpg" onclick="goto('/chicken/country-chicken-with-skin')" alt="Country Chicken (with skin)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/country-chicken-with-skin.php" class="m-b-5">
<span class="prod-title">Country Chicken (with skin)</span>
</a>
<span class="rate m-b-5">&#x20B9; 500 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Uncaged and Wildbred, 100% desi country chicken diced into delicious chunks of small, medium and large cuts.</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 500</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 750</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 1000</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 1250</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 1500</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 1750</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 2000</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(10, false, 'scheduled')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(10, true, 'scheduled')">Buy Now</button>
</div>
<span class='pt-1 d-block condition-text text-danger del-warn-msg'>* Only Scheduled Delivery</span> </div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_30" data-price="550">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/6d6d78ef80b4f1d01fc10058ac76f947.jpg" onclick="goto('/chicken/country-chicken-skinless')" alt="Country Chicken (Skinless)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/country-chicken-skinless.php" class="m-b-5">
<span class="prod-title">Country Chicken (Skinless)</span>
</a>
<span class="rate m-b-5">&#x20B9; 550 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down">Bred in Fine Wild Pastures, 100% Pure Desi Country Chicken in Curry Cut. Get Small, Medium or Large cuts.</div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
<div class="form-group m-b-0 w-75">
<select class="custom-select quantitySelector" required>
<option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 550</option><option value="1.5">1.5 kg &#x00A0;&#x00A0;&#x20B9 825</option><option value="2">2 kg &#x00A0;&#x00A0;&#x20B9 1100</option><option value="2.5">2.5 kg &#x00A0;&#x00A0;&#x20B9 1375</option><option value="3">3 kg &#x00A0;&#x00A0;&#x20B9 1650</option><option value="3.5">3.5 kg &#x00A0;&#x00A0;&#x20B9 1925</option><option value="4">4 kg &#x00A0;&#x00A0;&#x20B9 2200</option> </select>
<div class="invalid-feedback"></div>
</div>
</div>
<div class="actionBtns d-flex flex-row justify-content-between w-100">
<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart" onclick="addToCart(30, false, 'scheduled')"><i class="material-icons m-r-10">check</i> Add To Cart</button>
<button type="button" class="btn primaryBtn" onclick="addToCart(30, true, 'scheduled')">Buy Now</button>
</div>
<span class='pt-1 d-block condition-text text-danger del-warn-msg'>* Only Scheduled Delivery</span> </div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_42" data-price="450">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/9ed739cbdd7c5bf3a761eb41466f1ade.jpg" onclick="goto('/chicken/organic-chicken-with-skin')" alt="Organic chicken (With Skin)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/organic-chicken-with-skin.php" class="m-b-5">
<span class="prod-title">Organic chicken (With Skin)</span>
</a>
<span class="rate m-b-5">&#x20B9; 450 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down"></div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-15">
</div>
<div class="no-stock">
<a data-toggle="tooltip" title="out of stock">No Stock <i class="fa fa-bullseye" style="color:#F00;"></i></a>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 d-flex">
<div class="card productCard flex-grow-1" id="product_43" data-price="500">
<figure>
<div class="prodImgCon">
<img class="card-img-top pointer" onerror="this.onerror=null;this.src='assets/placeholder.png';" src="../cdn.onlymeat.in/images/products/3f866cee0e798384126ddd9c469b5634.jpg" onclick="goto('/chicken/organic-chicken-skinless')" alt="Organic chicken (Skinless)">
</div>

</figure>
<div class="card-body d-flex flex-column justify-content-between">
<h5 class="card-title d-flex flex-column">
<a href="chicken/organic-chicken-skinless.php" class="m-b-5">
<span class="prod-title">Organic chicken (Skinless)</span>
</a>
<span class="rate m-b-5">&#x20B9; 500 per Kg</span>
</h5>
<div class="prod-desc m-b-10 hide-md-down"></div>
<div class="card-text d-flex align-items-center m-b-15 m-b-xs-15">
</div>
<div class="no-stock">
<a data-toggle="tooltip" title="out of stock">No Stock <i class="fa fa-bullseye" style="color:#F00;"></i></a>
</div>
</div>
</div>
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
<li class="m-r-15 m-b-10">Email: <a href="cdn-cgi/l/email-protection.php" class="__cf_email__" data-cfemail="72010702021d0006321d1c1e0b1f1713065c1b1c">[email&#160;protected]</a></li>
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
<div class="checkOutModal">
<div class="container p-md-down-0">
<div class="checkOutInner d-flex align-items-center justify-content-end">
<div class="flex-grow-1 d-flex align-items-center">
<i class="material-icons icon-check d-flex"></i>
<div class="d-flex flex-column m-l-20">
<span>Your Cart</span>
<span class="font-w600 h5 p-t-5 mb-0"><span class="cart-text"></span> in your cart</span>
</div>
</div>
<div class="m-l-10">
<button type="button" class="btn successBtn" onclick="gotoCheckout()">CHECKOUT</button>
</div>
</div>
</div>
</div>

<div class="modal fade minCartDialog" tabindex="-1" role="dialog" aria-labelledby="cartErrorModal" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-sm">
<div class="modal-content">
<div class="d-flex flex-column align-items-center p-15">
<div>Minimum order price is <span class="rupee">&#x20B9;</span> 75</div>
<button onclick="closeModal('.minCartDialog')" class="btn btn-danger btn-sm mt-3 w-25">OK</button>
</div>
</div>
</div>
</div>
<div class="bgProductOverlay"></div>
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

<script>
        var productCategory = '1';
        var pageType = 'product';
    </script>
    <?php include 'footer.php';?>

</html>
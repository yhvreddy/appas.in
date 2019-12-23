
<!DOCTYPE html>
<html>
	
<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="UTF-8">
	<meta content="text/html">
	<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no,user-scalable=no,minimum-scale=1,maximum-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?=$page_title?></title>
	<link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" type="image/x-icon">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/slick.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/iconStyles.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/homePage.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/productPage.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/orderPage.css">
	<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/productView.css">

	<style type="text/css">
		/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
		.productCard .card-img-top {
		    left: 0;
		    right: 0;
		    top: 50%;
		    bottom: 0;
		    transform: translateY(-50%);
		    height: auto;
		    width: 40%;
		    margin: 0 auto;
		    right: -140px;
		}
		.CountIcon{
			background: red;
			color: white;
			text-align: center;
			border-radius: 50%;
			position: absolute;
			z-index: 11111111111;
			width: 20px;
			height: 20px;
			top: -3px;
			right: 3px;
			font-size: 14px;
		}
	</style>
</head>
<body>
	<main class="homePage">
		<header class="header">

			<div class="container-fluid p-0 d-flex justify-content-center hide-md-down">
				<nav class="navbar justify-content-start col-lg-11 col-md-12 d-flex">
					<a href="<?=base_url();?>" class="navbar-brand order-xl-1">
						<img class="img-fluid" src="<?=base_url()?>assets/images/logo.jpeg" alt="logo">
					</a>

					<div class="d-flex justify-content-end flex-grow-1 order-xl-3">

						<div class="d-flex align-items-center divider-r phoneNum">
							<i class="material-icons icon-ios-telephone-outline d-flex cwhite"></i>
							<a href="tel:+91-40- 40 39 38 37" class="m-l-5 m-r-5 cwhite">+91 8885537338</a>
						</div>

						<!--<div class="d-flex align-items-center locationCon divider-r">
							<form class="form-inline flex-grow-1 order-xl-2 w-lg-down-100"  autocomplete="off" action="/action_page.php">
								<div class="p-relative m-l-10 m-r-10 w-100 searchBarCon autocomplete">
									<input class="form-control m-0 w-100 desk-search" type="search" placeholder="Location" aria-label="Search" onsearch="searchClicked()" id="myInput" type="text" name="myCountry" placeholder="Country">
									<button class="btn searchInBtn" type="submit" onclick="searchClicked()"><i class="material-icons icon-search"></i></button>
								</div>
							</form>
							
							<div class="searchBgOverlay"></div>
						</div>-->


						<!-- add to cart by ajax  -->
						<div class="cart d-flex align-items-center divider-r pointer cwhite" id="Addtocart_details"></div>

						<!-- data-id="loginSideNav" -->
						<?php if($this->isAccess == 0){ ?>
							<div class="d-flex align-items-center custSideNav pointer smallText signin">
								<a href="<?=base_url('loginregister')?>" class="signup_header">SignUp or Login</a>
							</div> &nbsp;&nbsp;
						<?php }else{ ?>
							<div class="d-flex align-items-center custSideNav pointer smallText signin">
								<!-- <div class="dropdown profileMenu d-flex align-items-center pointer">
									<a class="dropdown-toggle d-flex align-items-center" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="material-icons icon-user-outline d-flex"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="profile.php">Profile</a>
										<a class="dropdown-item" href="profile.php#orders">MyOrders</a>
										<a class="dropdown-item" href="<?//=base_url('accesss/logout')?>">Logout</a>
									</div>
								</div> -->

								<a href="<?=base_url('shopping/orders')?>" class="signup_header font18">MyOrders</a>
								<a href="<?=base_url('user/profile')?>" class="signup_header font18">Profile</a>
								<a href="<?=base_url('accesss/logout')?>" class="signup_header font18">Logout</a>
							</div>
						<?php } ?>

					</div>

					
				</nav>
			</div>

			<div class="d-flex align-items-center mobileHeader show-md-down py-1">
				<div class="d-flex align-items-center m-r-10 flex-grow-1">
					<a class="navbar-brand">
						<img class="img-fluid" src="<?=base_url()?>assets/images/logo.jpeg" alt="logo">
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
							</svg>Order Placed Successfully
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
				<div class="m-t-20"></div>
			</div>
		</div>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

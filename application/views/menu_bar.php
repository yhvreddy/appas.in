<header class="header m-b-30">

	<div class="d-flex align-items-center mobileHeader show-md-down py-1">
		<div class="d-flex align-items-center m-r-10 flex-grow-1">
			<a class="navbar-brand">
				<img class="img-fluid" src="/assets/logo.png" alt="logo">
			</a>
		</div>
		<a href="tel:+91-40- 40 39 38 37" class="m-l-5 m-r-10 phone-icon"><i class="material-icons icon-ios-telephone-outline d-flex"></i></a>

		<div class="d-flex align-items-center openSeacrh">

			<div class="form-inline">
				<div class="p-relative searchBarCon">
					<input class="form-control m-0 w-100 mob-home-search" type="search" placeholder="Search" aria-label="Search">
					<button class="btn searchInBtn" type="button" onclick="searchClicked()"><i class="material-icons icon-search"></i>
					</button>
				</div>
			</div>

			<i class="material-icons icon-search d-flex pointer"></i>
		</div>
	</div>

	<div class="container hide-md-down">
		<?php //print_r($this->category); ?>
		<ul class="nav">
			<?php foreach ($this->category as $value){ ?>
				<li class="nav-item">
					<a class="nav-link text-capitalize cwhite" href="<?=base_url('product/'.$value->id.'/'.url_title(strtolower($value->category_name)))?>"> <?=$value->category_name?></a>
				</li>
			<?php } ?>
		</ul>
	</div>

	<div class="flex align-items-center mobileTitleHeader show-md-down">
		<div class="d-flex align-items-center m-r-10 flex-grow-1">
			<i class="material-icons icon-left-open-big m-r-10 d-flex" onclick="goBack()"></i> <span class="text-capitalize">more Customization</span>
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
					</svg> Order Placed Successfully
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

	<?php foreach ($this->category as $value){ ?>
		<li class="nav-item">
			<a class="nav-link text-capitalize " href="<?=base_url('product/'.$value->id.'/'.url_title(strtolower($value->category_name)))?>"> <?=$value->category_name?></a>
		</li>
	<?php } ?>

</ul>

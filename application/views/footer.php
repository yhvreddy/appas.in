<footer>

	<div class="seoCon">
		<div class="container-fluid">
			<div class="row flex-wrap m-t-15">
				<div class="col col-cust m-b-10 flex-grow-1 no-pad">
					<h1 class="page-title m-b-15">Only Fresh and Quality Meat</h1>
					<p class="page-desc">At Appas, Our Top Priorities Are Always Pointed Towards How Fresh and Great The Quality Of The Meat Is At All Times. Day in and Day out.
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
						<li class="p-r-15 m-b-10 w-50">Mon - Sat : 9AM - 9PM</li>
						<li class="p-r-15 m-b-10 w-50">Sunday : 6AM - 9PM</li>
						
					</ul>
				</div>

				<div class="col col-cust m-b-20 flex-grow-1">
					<h3 class="m-b-25">About Us</h3>
					<ul type="none" class="p-l-0">
						<li class="m-r-15 m-b-10">Email: <a>appas888553@gmail.com</a></li>
						<li class="m-r-15 m-b-10"><a href="about">About Us</a></li>
						<li class="m-r-15 m-b-10"><a href="terms_cond">Terms and Conditions</a></li>
					</ul>
				</div>

				<div class="col col-cust m-b-20 flex-grow-1">
					<h3 class="m-b-25">Categories</h3>
					<ul type="none" class="p-l-0">
						<?php foreach ($this->category as $value){ ?>
							<li class="m-r-15 m-b-10">
								<a class="text-capitalize " href="<?=base_url('product/'.$value->id.'/'.url_title(strtolower($value->category_name)))?>"> <?=$value->category_name?></a>
							</li>
						<?php } ?>
					</ul>
				</div>

			
			</div>

			<div class="socialLinks d-flex align-items-center justify-content-center hide-md-down">
				<a href="https://www.facebook.com" target="_blank" class="d-flex colorDefualt"><i class="material-icons icon-facebook"></i></a>
				<a href="https://www.instagram.com" target="_blank" class="d-flex colorDefualt"><i class="material-icons icon-instagram"></i></a>
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
	</div>
</footer>

<div class="custSideNavContent" id="productSideNav">
	<div class="sideNavHeader d-flex align-items-center justify-content-center">
		<img class="headImage" src="<?=base_url()?>assets/images/logo.jpeg" alt="sidebar image" />
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
					<img class="img-fluid" onerror="this.onerror=null;this.src='<?=base_url()?>assets/images/placeholder.png';" src="<?=base_url()?>assets/images/goat_chip_img.png" alt="goat_chip_img">
				</a>
				<figcaption>Goat</figcaption>
			</figure>
			<figure class="chooseItem">
				<a href="mutton-sheep.php">
					<img class="img-fluid" onerror="this.onerror=null;this.src='<?=base_url()?>assets/images/placeholder.png';" src="<?=base_url()?>assets/images/sheep_chip_img.png" alt="sheep_chip_img">
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

<?php //include 'sidebar.php';?>


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
		<div class="lds-roller"></div>
	</div>
	</main>

	<script data-cfasync="false" src="<?=base_url()?>assets/js/email-decode.min.js"></script>
	<script src="<?=base_url()?>assets/js/api_client.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/carousel-swipe.js"></script>
	<script src="<?=base_url()?>assets/js/main.js"></script>
	<script src="<?=base_url()?>assets/js/homePage.js"></script>
<script>
    $(document).ready(function(){


        //$('body').on('focus',".myAddtoCart",function () {

           // $('.myAddtoCart').submit(function(e){
        $(document).on('submit',"form.myAddtoCart",function (e) {
			e.preventDefault();
			var productdata = $(this).serialize();
			$.ajax({
				url:"<?=base_url('product/addproduct'); ?>",
				method:"POST",
				data:productdata,
				dataType:'json',
				success:function(data){
					console.log(data);
					$('.myAddtoCart').trigger('reset');
				}
			});
		});

        //});


		$(document).on('click', '.remove_inventory', function(e){
			e.preventDefault();
			var row_id = $(this).attr("id");
			$(this).addClass('RemovedItem');
			if(row_id != '')
			{
				alert(row_id);
				$.ajax({
					url:"<?= base_url(); ?>product/removefromcart",
					method:"POST",
					data:{row_id:row_id},
					success:function(data)
					{
						console.log(data);
						if(data == 1) {
							$('.RemovedItem').parent().parent().hide();
							$('.remove_inventory .RemovedItem').removeClass('RemovedItem');
							alert("Product removed from Cart");
						}else{
							$('.remove_inventory .RemovedItem').removeClass('RemovedItem');
							alert('Failed to remove product');
						}
					}
				});
			}
			else
			{
				return false;
			}
		});


        $('#Addtocart_details').load('<?=base_url('product/cart_count')?>');

        setInterval(function () {
            $('#Addtocart_details').load('<?=base_url('product/cart_count')?>');
        }, 2000);





    });
</script>
</body>

</html>

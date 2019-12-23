<?php include 'header.php';?>
<?php include 'menu_bar.php';?>

	<style>
		.productCard .card-img-top {
			left: 0;
			right: 0;
			top: 50%;
			bottom: 0;
			transform: translateY(-50%);
			height: auto;
			width: 70%;
			margin: 0 auto;
			/* right: -140px; */
		}
	</style>
	<section class="productSectionInfo">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="card productCard d-flex flex-row" data-price="844" id="product_16">
						<div class="prodLeft">
							<figure class="p-10">
								<div class="prodImgCon">
									<img class="card-img-top" src="<?=base_url($productdetails[0]->image)?>" alt="<?=$productdetails[0]->product_name?>">
								</div>
							</figure>
						</div>
						<div class="prodRight d-flex flex-column justify-content-between flex-grow-1">
							<div class="card-body px-0 pt-md-0">
								<div class="card-title d-flex align-items-center flex-md-column align-items-md-start">
									<h4 class="m-b-5 m-r-10 flex-grow-sm-1"><?=$productdetails[0]->product_name?></h4>
									<!--<span class="rate">&#x20B9; 844 per KG</span>-->
								</div>
								<div class="card-text d-flex align-items-center m-b-25">
									<span class="p-r-25">Select Weight</span>
									<div class="form-group m-b-0 w-50 flex-grow-sm-1">
										<?php
											$pricedetails = $this->Model_default->select_data('meat_product_price_details',array('product_id'=>$productdetails[0]->id),'updated ASC');
										?>
										<select class="custom-select quantitySelector" required>
											<option value="">Select Quantity</option>
											<?php if(count($pricedetails) != 0){
												foreach ($pricedetails as $key => $pricedetail){ ?>
													<option value="<?=$pricedetail->id?>"><?=$pricedetail->unit_size.' - '.$pricedetail->price.' rs/-'?></option>
												<?php }
											}else{ ?>
												<option value="">No data to select</option>
											<?php } ?>
										</select>
										<div class="invalid-feedback"></div>
									</div>
								</div>
								<div class="d-flex justify-content-start">
									<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart m-r-15" onclick="addToCart(16, false)"><i class="material-icons m-r-10">check</i> Add To Cart</button>
									<button type="button" class="btn primaryBtn" onclick="addToCart(16, true)">Buy Now</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container productDetailInfo pb-4">
			<div class="innerCon">
				<div class="row">
					<div class="col-md-12 bg-white">
						<div style="font-size:11.0pt;line-height:115%;" lang="EN">
							<?=$productdetails[0]->information?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include 'footer.php';?>

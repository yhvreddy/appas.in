<?php include 'header.php';?>



	<style>
		.productCard .card-img-top {
			left: 0;
			right: 0;
			top: 50%;
			bottom: 0;
			transform: translateY(-50%);
			height: auto;
			width: 75%;
			margin: 0 auto;
			/* right: -140px; */
		}
	</style>

	<?php include 'menu_bar.php';?>

	<?php if(count($submenus) != 0){ ?>
		<div class="row">
			<div class="container">
				<div class="col">
					<div class="filterCon d-flex align-items-md-center flex-column flex-md-row text-center">
						<span class="m-r-10 filter-text" style="font-size: 16px">Filter By :</span>
						<ul type="none" class="p-l-0 m-b-0 d-flex align-items-center">
							<?php foreach ($submenus as $key => $submenu){
								$category = $this->Model_default->select_data('meat_categories',array('id'=>$submenu->category_id),'updated');
								if(!empty($submenu->image)){
									$image = base_url($submenu->image);
								}else{
									$image = '';
								}
								?>
								<li class="pointer activeFilter">
									<a href="<?=base_url('product/'.$submenu->category_id.'/'.url_title(strtolower($category[0]->category_name)).'/'.$submenu->id.'/'.url_title(strtolower($submenu->sub_category_name)))?>" style="text-decoration: none">
										<img src="<?=$image?>"> <?=ucwords($submenu->sub_category_name)?>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<section class="productSectionInfo">
		<div class="container">
			<div class="row products-list">
				<?php
					if(count($products) != 0){
						foreach ($products as $key => $product){
							$category = $this->Model_default->select_data('meat_categories',array('id'=>$product->category_id),'updated');
							$pricedetails = $this->Model_default->select_data('meat_product_price_details',array('product_id'=>$product->id),'updated ASC');
							if(!empty($product->sub_category_id)){
								$subcategory = $this->Model_default->select_data('meat_sub_categories',array('status'=>1,'id'=>$product->sub_category_id),'updated');
								$subname = ' - '.ucwords($subcategory[0]->sub_category_name);
								$categoryname = ucwords($category[0]->category_name);
							}else{
								$subname = '';
								$categoryname = ucwords($category[0]->category_name);
							}
							?>

							<div class="col-lg-4 col-md-6 d-flex">
								<div class="card productCard flex-grow-1" id="product_21" data-price="5">

									<figure>

										<div class="prodImgCon">
											<a href="<?=base_url('product/'.$product->id.'/'.url_title(strtolower($product->product_name)).'/details')?>">
												<img class="card-img-top pointer" onerror="this.onerror=null;this.src='<?=base_url()?>assets/images/placeholder.png';" src="<?=base_url($product->image)?>" alt="<?=$product->product_name?>">
											</a>
										</div>

									</figure>

									<div class="card-body d-flex flex-column justify-content-between">
										<h5 class="card-title d-flex flex-column">
											<a href="<?=base_url('product/'.$product->id.'/'.url_title(strtolower($product->product_name)).'/details')?>" style="text-decoration: none" class="m-b-5">
												<span class="prod-title"><?=$product->product_name?></span></a>
											<!--<span class="rate m-b-5">&#x20B9; 5 per Pack</span>-->
										</h5>
										<div class="prod-desc m-b-10 hide-md-down"><?=$categoryname.$subname?></div>
										<form class="myAddtoCart" method="post" action="#">
											<input type="hidden" name="product_id" value="<?=$product->id?>">
											<input type="hidden" name="product_name" value="<?=$product->product_name?>">
											<div class="card-text d-flex align-items-center m-b-15 m-b-xs-10">
												<span class="p-r-25 smallText whiteSpace-nw">Select Weight</span>
												<div class="form-group m-b-0 w-75">
													<select class="custom-select quantitySelector" name="product_quantity" required>
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

											<div class="actionBtns d-flex flex-row justify-content-between w-100">
											<button type="submit" class="btn primaryBtnInverse btn-add-cart addToCart"><i class="material-icons m-r-10">check</i> Add To Cart</button>
											<button type="button" class="btn primaryBtn BuyNowItem">Buy Now</button>
										</div>
										</form>
									</div>

								</div>
							</div>

						<?php }
					}else{ ?>
						<div class="col-md-12 bg-white pt-5 pb-5">
							<h3 class="text-center">No Products</h3>
						</div>
					<?php } ?>
			</div>
		</div>
	</section>

<?php include 'footer.php';?>
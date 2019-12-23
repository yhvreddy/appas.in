<?php include 'header.php';?>
<style>
    .otpScreen {
        display: none;
    }
    .pwd-error, .form-error {
        color: red;
    }
</style>

<section class="pt-5 bg-white">
	<div class="container max-w-lg-down-none">
		<h1 class="h2 t-center m-b-30">Your Order Details</h1>
		<form method="post" action="<?=base_url('save/cartdata')?>">
			<div class="row cartScreen justify-content-center">
				<div class="col-md-6 leftScreen">
					<div id="accordion">
						<div class="card">
							<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<i class="material-icons icon-left-open-big d-flex m-r-15 show-md-down"></i> <span class="flex-grow-1 t-left">Delivery Details</span>
								</h5>
							</div>
							<div>
								<div class="card-body">
									<div class="m-b-30">
										<h4 class="h4 m-b-15">Special requests - tell us</h4>
										<div class="form-group">
											<textarea placeholder="Type here... [mutton small pieces, chicken 2 leg pieces]" class="form-control" id="special_request" name="special_request" rows="4"></textarea>
										</div>
									</div>
									<div class="m-b-30">
										<h4 class="h4 m-b-15">Delivery Details</h4>
										<div class="deliveryInfo"></div>
										<div class="form-group DName">
											<label for="DName">Billing Name *</label>
											<input type="text" name="d_name" required="required" placeholder="Enter Name" class="form-control" id="DName">
											<span class="form-error"></span>
										</div>
										<div class="row">
											<div class="col-md-6 form-group pincode">
												<label for="Pincode">Mobile *</label>
												<input type="tel" maxlength="10" name="mobile" required="required" placeholder="Mobile Number" class="form-control" id="MobileNumber">
												<span class="form-error"></span>
											</div>

											<div class="col-md-6 form-group emailId">
												<label for="emailId">eMail id *</label>
												<input type="email" name="email_id" required="required" placeholder="email id" class="form-control" id="emailId">
												<span class="form-error"></span>
											</div>
										</div>

										<div class="form-group address1">
											<label for="address1">Address 1 *</label>
											<textarea class="form-control" required="required" name="address" id="address1" rows="3" placeholder="Enter Address"></textarea>
											<span class="form-error"></span>
										</div>
										<div class="form-group landmark">
											<label for="landmark">Landmark *</label>
											<input type="text" required="required" name="landmark" class="form-control" placeholder="Landmark" id="landmark">
											<span class="form-error"></span>
										</div>
										<div class="form-group area">
											<label for="area">Area *</label>
											<input type="text" required="required" name="area" class="form-control" placeholder="Area" id="area">
											<span class="form-error"></span>
										</div>
										<div class="form-group city">
											<label for="formCity">City *</label>
											<input type="text" required="required" name="city" class="form-control" placeholder="City" id="formCity">
											<input type="hidden" class="addressid"  value="">
											<span class="form-error"></span>
										</div>
										<div class="form-group pincode">
											<label for="Pincode">Pincode *</label>
											<input type="tel" maxlength="6" name="pincode" required="required" placeholder="Pincode" class="form-control" id="Pincode">
											<span class="form-error"></span>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 rightScreen">
					<div class="minCartScreen text-center">
						<p>Minimum order price is <span class="rupee">&#x20B9;</span> 25 (Excluding Delivery Charges)</p>
					</div>
					<div class="card p-0">

						<div class="orderSummary d-flex align-items-center flex-row flex-wrap divider-b">
							<h4 class="w-100">Order Summary</h4>
							<table class="col-12 table">
								<thead class="thead-dark">
								<tr>
									<th scope="col col-6">Items</th>
									<th scope="col col-2" class="text-center">Unit Qty</th>
									<th scope="col col-2" class="text-center">Quantity</th>
									<th scope="col col-2" class="text-center">Price</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach ($this->cart->contents() as $items){
										$quty = $this->Model_default->select_data('meat_product_price_details',array('id'=>$items['options']['unit']),'updated ASC');
										//echo "<pre>";print_r($items); echo "</pre>";
										?>
										<tr>
											<td scope="row" style="padding: 15px">
												<?php if (!empty($items['options']['product_img'])){ ?>
													<img src="<?=base_url($items['options']['product_img'])?>" style="width: 25px;height: 25px;border-radius: 50%">
												<?php } ?> &nbsp;<?=$items['name']?>
											</td>
											<td scope="row" class="text-center"><?=$quty[0]->unit_size?></td>
											<td scope="row" class="text-center"><?=$items['qty']?></td>
											<td scope="row" class="text-center"><span class="rupee">₹</span> <?=$items['price']?></td>
										</tr>
									<?php @$totalamount += $items['price']; } 
									
									$totalamount = $totalamount + 25;
									
									?>
								</tbody>
							</table>
						</div>

						<div class="billInfo divider-b" style="">
							<div class="d-flex delCharges">
								<p class="flex-grow-1 m-b-15 col-10 pl-0">Cart Total</p>
								<div class="text-right col-2 p-r-10"><span class="rupee">₹</span> <span class="cart-value"><?=$totalamount?></span></div>
							</div>
							<div class="d-flex delCharges">
								<p class="flex-grow-1 m-b-15 col-10 pl-0">Delivery Charges</p>
								<div class="text-right col-2 p-r-10"><span class="rupee"> + ₹</span> <span class="del-charge"> 25.0</span></div>
							</div>
							<div class="discount-block delCharges" style="display: none;">
								<p class="flex-grow-1 m-b-15 col-10 pl-0">Promo Discount</p>
								<div class="text-right col-2 p-r-10"><span class="rupee">- ₹</span> <span class="discount"></span></div>
							</div>
							<div class="d-flex billTotal">
								<p class="flex-grow-1 m-b-0 col-10 pl-0">Bill Total</p>
								<div class="text-right col-2 pl-0 p-r-10"><span class="rupee">₹</span> <span class="cart-total"><?=$totalamount?></span></div>
								<input type="hidden" name="total_amount" value="<?=$totalamount?>">
							</div>
						</div>

						<div class="actionBtns d-flex justify-content-between align-items-center pt-3 pb-3 pl-3">
							<a href="<?=base_url('product/cancelCart')?>" onclick="return confirm('Do you want to cancel order.?');" class="btn primaryBtnInverse  addAddCancelBtn">Cancel Order</a>
							<button type="submit" class="btn primaryBtn deliverBtn mr-3">Place Order</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>

<?php include 'footer.php';?>

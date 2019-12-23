<?php include 'header.php';?>
<?php include 'menu_bar.php';?>

	<section class="hide-md-down">
		<div class="container max-w-lg-down-none">
			<h1 class="h2 t-center m-b-30">Your Order Details</h1>
			<div class="row cartScreen justify-content-center">
				<div class="col-md-8 rightScreen">
					<div class="card p-0">
						<div class="orderSummary d-flex align-items-center flex-row flex-wrap divider-b">
							<h4 class="w-100">Order Summary</h4>
							<table class="col-12 table">
								<thead class="thead-dark">
									<tr>
										<th scope="col col-5">Items</th>
										<th scope="col col-2" class="text-center">Unit Qty</th>
										<th scope="col col-2" class="text-center">Quantity</th>
										<th scope="col col-2" class="text-center">Price</th>
										<th scope="col col-1" class="text-center"></th>
									</tr>
								</thead>
								<tbody>
									<?php
										if(count($this->cart->contents()) != 0){
										foreach ($this->cart->contents() as $items){
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
											<td scope="row" class="text-center">
												<a href="javascript:;" class="remove_inventory" id="<?=$items["rowid"]?>">X</a>
											</td>
										</tr>

									<?php @$totalamount += $items['price']; } ?>
											<tr>
												<td scope="row" colspan="3"></td>
												<td scope="row" class="text-center"><span class="rupee">₹</span> <?=$totalamount?></td>
												<td></td>
											</tr>
										<?php }else{ ?>
											<tr>
												<td colspan="4" align="center">
													<span class="text-center">No Products on Cart..!</span>
												</td>
											</tr>
										<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="cart-items">
						</div>

						<div class="promoCon p-15">
							<form class="form-inline flex-column align-items-start promoConInner">
								<div class="d-flex w-100 p-relative m-b-5">
									<div class="col-6 d-flex justify-content-center">
										<a href="<?=base_url('products')?>" class="btn primaryBtn m-auto" style="color: #ffffff">Continue to Shopping</a>
									</div>
									<?php if(count($this->cart->contents()) != 0){ ?>
										<div class="col-6 d-flex justify-content-center">
											<a href="<?=base_url('cart/proceedtocart')?>" class="btn primaryBtn m-auto" style="color: #ffffff">Proceed to Checkout</a>
										</div>
									<?php } ?>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php include 'footer.php'; ?>

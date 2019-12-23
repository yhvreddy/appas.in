<?php include 'header.php';?>
<?php include 'sidebar.php';?>

<style type="text/css">
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
</style>

	<section>
		<div class="container-fluid">

			<div class="row justify-content-center">
				<div class="col-lg-12 row">

					<div class="col-lg-6 col-xl-6 d-flex flex-column">

						<div class="productsChart flex-grow-1 d-flex flex-column">

							<div class="row categories-list mt-5">
								<?php
									$colors = array('#f01716','#2aac2c','#4da5d7','#5e34d1','#f01716');
									foreach ($categories as $key => $category){
										$products = $this->Model_default->select_data('meat_products',array('status'=>1,'category_id'=>$category->id),'updated ASC');
								?>

									<div class="col-xl-6 p-md-down-0">
										<a href="<?=base_url('product/'.$category->id.'/'.url_title(strtolower($category->category_name)))?>" style="text-decoration: none">
											<div class="card productCard product1 flex-row-reverse pointer w-100 catCustSideNav" data-id="productSideNav" onclick="selectCategory(0)">
												<img class="card-img-top img-fluid align-self-center" onerror="this.onerror=null;this.src='<?=base_url('assets/images/placeholder.png')?>';" src="<?=base_url($category->image)?>" alt="Chicken Image">
												<div class="card-body">
													<h5 class="card-title"><?=ucfirst($category->category_name)?></h5>
													<h6 class="card-subtitle mb-2 text-muted smallLabel"><?=count($products)?> Items</h6>
												</div>
											</div>
										</a>
									</div>

								<?php } ?>
							</div>
						</div>

					</div>

					<?php if(count($banners) != 0){ ?>
						<div class="col-lg-6 d-flex flex-column justify-content-center p-relative">
							<div class="bg-img-home">

								<div id="demo" class="carousel slide" data-ride="carousel">
									<ul class="carousel-indicators">
										<?php foreach ($banners as $key => $banner){ ?>
										<li data-target="#demo" data-slide-to="<?=$key?>" <?php  if($key == 0){ ?> class="active" <?php } ?> ></li>
										<?php } ?>
									</ul>
									<div class="carousel-inner">
										<?php foreach ($banners as $key => $banner){ ?>
											<div class="carousel-item <?php  if($key == 0){ ?> active <?php } ?>">
												<img src="<?=base_url($banner->image)?>" alt="Banner Image" width="100%">
												<?php if(!empty($banner->information)){ ?>
													<div class="carousel-caption">
														<p><?=$banner->information?></p>
													</div>
												<?php } ?>
											</div>
										<?php } ?>
									</div>
									<a class="carousel-control-prev" href="#demo" data-slide="prev">
										<span class="carousel-control-prev-icon"></span>
									</a>
									<a class="carousel-control-next" href="#demo" data-slide="next">
										<span class="carousel-control-next-icon"></span>
									</a>
								</div>

							</div>


						</div>
					<?php } ?>

				</div>
			</div>

		</div>
	</section>

	<section class="section2 hide-md-down">
		<div class="container">
			<h2 class="text-center">Why to choose Appas?</h2>
			<div class="row align-items-end">
				<div class="col-md-4">
					<div class="card bg-trasparent pointer m-b-30 w-100 align-items-center">
					<img class="card-img-top img-fluid" src="<?=base_url()?>assets/images/freshmeat_img.jpg" alt="Fresh meat">
						<div class="card-body d-flex justify-content-center">
							<h5 class="card-title font-w900 color1">We Serve Fresh Meat</h5>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-trasparent pointer m-b-30 w-100 align-items-center">
						<img class="card-img-top img-fluid" src="<?=base_url()?>assets/images/Delivery_boy.jpg" alt="Delivery boy">
						<div class="card-body d-flex justify-content-center">
							<h5 class="card-title font-w900 color2">Delivered in 60 mins</h5>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card bg-trasparent pointer m-b-30 w-100 align-items-center">
						<img class="card-img-top img-fluid" src="<?=base_url()?>assets/images/Best_quality.jpg" alt="Best quality">
						<div class="card-body d-flex justify-content-center">
							<h5 class="card-title font-w900 color3">Best Quality Assured</h5>
						</div>
					</div>
				</div>
			</div>
		</div>

	
	</section>

<?php include 'footer.php'; ?>	

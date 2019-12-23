<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
		Edit Product
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	  <li><a href="#">Products</a></li>
      <li class="active">Edit Products</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Products</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(isset($productdata) && count($productdata) != 0){ //print_r($productdata); ?>
              <form role="form" method="post" action="<?=base_url('cpanel/dashboard/saveeditproductsdetails')?>" enctype="multipart/form-data">
                <div class="box-body">
                  <input type="hidden" name="edit_id" value="<?=$productdata[0]->id?>">
                  <div class="form-group col-md-3">
                    <label for="category_name">Select Category Name <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_name" required id="category_id">
                      <option value="">Select Category Name</option>
                      <?php foreach ($categories as $key => $category) { ?>
                        <option <?php if($productdata[0]->category_id == $category->id){ ?> selected <?php } ?> value="<?=$category->id?>"><?=$category->category_name?></option>
                      <?php } ?>
                    </select>
                  </div>
					<div class="form-group col-md-3">
						<label for="category_name">Select Sub Category </label>
						<select class="form-control" name="subcategory_id" id="sub_category_id">
							<option value="">Select Sub Category.</option>
							<?php $subcategories = $this->Model_default->select_data('meat_sub_categories', array('category_id'=>$productdata[0]->category_id), 'id');
								if(count($subcategories) != 0){ foreach ($subcategories as $subcat){ ?>
									<option value="<?=$subcat->id?>" <?php if($productdata[0]->sub_category_id == $subcat->id){ echo 'selected'; } ?>><?=$subcat->sub_category_name?></option>
								<?php } }
							?>
						</select>
					</div>
                  <div class="form-group col-md-3">
                    <label for="subcategory_name">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" required name="product_name" id="product_name" value="<?=$productdata[0]->product_name?>" placeholder="Enter SubCategory Name">
                  </div>

                  <div class="form-group col-md-3">
                    <label for="CategoryImages">Upload SubCategory Image </label>
                    <input type="file" id="CategoryImages" name="CategoryImages" accept=".png,.jpg,.jpeg">
                    <?php if(!empty($productdata[0]->image)){ ?>
                      <a href="<?=base_url($productdata[0]->image)?>" target="_blank">Uploaded Image</a>
                  <?php } ?>
                  <input type="hidden" name="uploaded_image" value="<?=$productdata[0]->image?>">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="Information">Information</label>
                    <textarea class="wik_textarea form-control" id="BannerInformation" name="Information" placeholder="Enter Information" rows="12"><?=$productdata[0]->information?></textarea>
                  </div>
					<h4 class="col-md-12 text-bold">Product Price Details </h4>
					<div class="col-md-12 col-lg-12">
						<div class="wrapperBoxList">
							<?php $pamount = $this->Model_default->select_data('meat_product_price_details', array('product_id'=>$productdata[0]->id,'status'=>1), 'id');
								if(count($pamount) != 0){
							?>
							<?php foreach ($pamount as $key => $value){ ?>
							<?php if($key == 0){ ?>
								<input type="hidden" value="<?=$value->id?>" name="insert_id[]">
								<div class="row">
									<div class="col-md-4 form-group">
										<label>w/units</label>
										<input type="text" class="form-control" value="<?=$value->unit_size?>" placeholder="Ex : 1/2 Kg" name="sizeunits[]">
									</div>
									<div class="col-md-4 form-group">
										<label>Amount</label>
										<input type="number" min="1" class="form-control" value="<?=$value->price?>" placeholder="Ex : 150" name="amountcost[]">
									</div>
									<div class="col-md-4 form-group">
										<a href="javascript:(0);" class="btn btn-success add_fields" style="margin: 25px 0px 0px 0px">Add</a>
									</div>
								</div>
							<?php }else{ ?>
								<input type="hidden" value="<?=$value->id?>" name="insert_id[]">
								<div class="row">
									<div class="col-md-4 form-group">
										<input type="text" class="form-control" value="<?=$value->unit_size?>" placeholder="Ex : 1/2 Kg" name="sizeunits[]">
									</div>
									<div class="col-md-4 form-group">
										<input type="number" min="1" class="form-control" value="<?=$value->price?>" placeholder="Ex : 150" name="amountcost[]">
									</div>
									<div class="col-md-4 form-group">
										<a href="<?=base_url('cpanel/dashbaord/product/'.$value->id.'/'.$value->product_id.'/pricedelete')?>" onclick="return confirm('Are you want to delete <?=$value->unit_size?> price..?');" class="btn btn-danger remove_fields">Remove</a>
									</div>
								</div>
							<?php }
							   	}
							}else{ ?>
								<div class="row">
									<div class="col-md-4 form-group">
										<label>w/units</label>
										<input type="text" class="form-control" placeholder="Ex : 1/2 Kg" name="sizeunits[]">
									</div>
									<div class="col-md-4 form-group">
										<label>Amount</label>
										<input type="number" min="1" class="form-control" placeholder="Ex : 150" name="amountcost[]">
									</div>
									<div class="col-md-4 form-group">
										<a href="javascript:(0);" class="btn btn-success add_fields" style="margin: 25px 0px 0px 0px">Add</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Update Product</button>
                </div>
              </form>
            <?php }else{ ?>
              <form role="form" method="post" action="<?=base_url('cpanel/dashboard/saveproductsdetails')?>" enctype="multipart/form-data">
                <div class="box-body">

                  <div class="form-group col-md-3">
                    <label for="category_name">Select Category Name <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_name" required="required" id="category_id">
                      <option value="">Select Product Category.</option>
                      <?php foreach ($categories as $key => $category) { ?>
                        <option value="<?=$category->id?>"><?=$category->category_name?></option>
                      <?php } ?>
                    </select>
                  </div>
					<div class="form-group col-md-3">
						<label for="category_name">Select Sub Category </label>
						<select class="form-control" name="subcategory_id" id="sub_category_id">
							<option value="">Select Sub Category.</option>
						</select>
					</div>
                  <div class="form-group col-md-3">
                    <label for="product_name">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" required="required" name="product_name" id="product_name" placeholder="Enter Product Name">
                  </div>
				  <div class="form-group col-md-3">
					<label for="CategoryImages">Upload Product Image</label>
					<input type="file" id="CategoryImages" name="CategoryImages" accept=".png,.jpg,.jpeg">
				  </div>
                  <div class="form-group col-md-12">
                    <label for="Information">Product Information</label>
                    <textarea class="wik_textarea form-control" id="BannerInformation" name="Information" placeholder="Enter Information" rows="8"></textarea>
                  </div>
                  <h4 class="col-md-12 text-bold">Product Price Details</h4>
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-md-4 form-group">
								<label>w/units</label>
								<input type="text" class="form-control" placeholder="Ex : 1/2 Kg" name="sizeunits[]">
							</div>
							<div class="col-md-4 form-group">
								<label>Amount</label>
								<input type="number" min="1" class="form-control" placeholder="Ex : 150" name="amountcost[]">
							</div>
							<div class="col-md-4 form-group">
								<a href="javascript:(0);" class="btn btn-success add_fields" style="margin: 25px 0px 0px 0px">Add</a>
							</div>
						</div>
						<div class="wrapperBoxList"></div>
					</div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right">Add SubCategory</button>
                </div>
              </form>
            <?php } ?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    //Add Input Fields
    $(document).ready(function() {
        var max_fields = 10; //Maximum allowed input fields
        var wrapper    = $(".wrapperBoxList"); //Input fields wrapper
        var add_button = $(".add_fields"); //Add button class or ID
        var x = 1; //Initial input field is set to 1

        //When user click on add input button
        $(add_button).click(function(e){
            e.preventDefault();
            //Check maximum allowed input fields
            if(x < max_fields){
                x++; //input field increment
                //add input field
                $(wrapper).append('<div class="row"> <div class="col-md-4 form-group"><input type="text" class="form-control" placeholder="Ex : 1/2 Kg" name="sizeunits[]"></div><div class="col-md-4 form-group"><input type="number" min="1" class="form-control" placeholder="Ex : 150" name="amountcost[]"></div><div class="col-md-4 form-group"><a href="javascript:(0);" class="btn btn-danger remove_field">Remove</a> </div></div>');
                //$(wrapper).append('<div><input type="text" name="input_array_name[]" placeholder="Input Text Here" /> <a href="javascript:void(0);" class="remove_field">Remove</a></div>');
            }
        });

        //when user click on remove button
        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault();
            $(this).parent('div').parent().remove(); //remove inout field
            //x--; //inout field decrement
        })
    });

    $(document).ready(function(){
        $("#category_id").change(function(){
            var category_id = $(this).val();
            //alert(category_id);
            if(category_id != ''){
                $.ajax({
                    method:"POST",
                    url: "<?=base_url('cpanel/pages/subcategorieslist')?>",
                    data:{category_id:category_id},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        $('#sub_category_id').empty();;
                        var toAppend = '';
                        toAppend +=  '<option value="">Select Subcategory Name</option>';
                        $.each(data,function(i,o){
                            toAppend += '<option value='+o.id+'>'+o.sub_category_name+'</option>';
                        });

                        $('#sub_category_id').append(toAppend);
                    },
                    error:function(errordata){
                        alert('Opps error : ' + errordata);
                    }
                })
            }else{
                alert("Select category id..");
            }
        });
    });
</script>

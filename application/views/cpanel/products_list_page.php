<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
		Products List
      <small></small>
    </h1>
    <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Products</a> </li>
		<li class="active">Products List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Products List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<table class="table table-striped table-bordered datatable">
				  <thead>
					<th>#</th>
					<th>Image</th>
					<th>Products Name</th>
					<th>Category</th>
					<th>Sub Category</th>
					<th>Details</th>
					<th></th>
				  </thead>
				  <tbody>
					<?php $i = 1; foreach ($products as $key => $value) { ?>
					  <tr>
						<td><?=$i++;?></td>
						  <td><?php if(!empty($value->image)){ ?> <img src="<?=base_url($value->image)?>" style="width:30px" class="img-circle"> <?php }else{ ?> No Image <?php } ?></td>
						  <td><?=$value->product_name?></td>
						<td>
						  <?php
						  	$category = $this->Model_default->select_data('meat_categories',array('id'=>$value->category_id),'id DESC');
						  	if($value->sub_category_id != ''){
								$SubCategoryName = $this->Model_default->select_data('meat_sub_categories',array('id'=>$value->sub_category_id),'id DESC');
								if(count($SubCategoryName) != 0){
									$subname = $SubCategoryName[0]->sub_category_name;
								}else{
									$subname = '';
								}

							}else{
								$subname = '';
							}
							print_r($category[0]->category_name);
						  ?>
						</td>
						<td><?=$subname?></td>
						<td><a href="#">Details</a></td>
						<td align="center">
						  <a href="<?=base_url('cpanel/dashboard/products/'.$value->id.'/edit')?>"  onclick="return confirm('You want to edit product..?');"><i class="fa fa-edit"></i></a>&nbsp;
						  <a href="<?=base_url('cpanel/dashboard/product/'.$value->id.'/delete')?>" onclick="return confirm('You want to delete product..?');"><i class="fa fa-trash-o"></i></a>
						</td>
					  </tr>
					<?php } ?>
				  </tbody>
				</table>
			</div>
          </div>
          <!-- /.box -->
          
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

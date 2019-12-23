<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
          <?php
            $users = $this->Model_default->select_data('meat_users',array('status'=> 1));
          ?>
          <div class="info-box-content">
            <span class="info-box-text">Register Users</span>
            <span class="info-box-number"><?=count($users)?><small></small></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-list"></i></span>
          <?php
            $categories = $this->Model_default->select_data('meat_categories',array('status'=> 1));
          ?>
          <div class="info-box-content">
            <span class="info-box-text">Categories</span>
            <span class="info-box-number"><?=count($categories)?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
          <?php
            $orders = $this->Model_default->select_data('meat_cart_details',array('DATE(created)'=> date('Y-m-d')));
          ?>
          <div class="info-box-content">
            <span class="info-box-text">Todays Orders</span>
            <span class="info-box-number"><?=count($orders)?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="fa fa-list"></i></span>
          <?php
            $products = $this->Model_default->select_data('meat_products',array('status'=> 1));
          ?>
          <div class="info-box-content">
            <span class="info-box-text">Products</span>
            <span class="info-box-number"><?=count($products)?></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

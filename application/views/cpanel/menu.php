<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
   
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="<?=base_url('cpanel/dashboard')?>">
          <i class="fa fa-th"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="<?=base_url('cpanel/dashboard/userslist')?>">
          <i class="fa fa-users"></i> <span>Users List</span>
        </a> 
      </li>
      
      <li>
        <a href="<?=base_url('cpanel/dashboard/banners')?>">
          <i class="fa fa-image"></i> <span>Banners</span>
        </a>
      </li>

      <li>
        <a href="<?=base_url('cpanel/dashboard/categories')?>">
          <i class="fa fa-calendar"></i> <span>Category</span>
        </a>
      </li>
      
      <li>
        <a href="<?=base_url('cpanel/dashboard/subcategories')?>">
          <i class="fa fa-calendar"></i> <span>Sub Category</span>
        </a>
      </li>
      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-product-hunt"></i>
          <span>Products</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=base_url('cpanel/dashboard/addproducts')?>"><i class="fa fa-circle-o"></i> Add Products</a></li>
          <li><a href="<?=base_url('cpanel/dashboard/productslist')?>"><i class="fa fa-circle-o"></i> Products List</a></li>
        </ul>
      </li>

	    <li><a href="<?=base_url('cpanel/dashboard/orderslist')?>"><i class="fa fa-cart-arrow-down"></i> <span>Orders</span></a> </li>

      <!-- <li>
        <a href="<?php //base_url('cpanel/dashboard/reviews'); ?>">
          <i class="fa fa-edit"></i> <span>Product Reviews</span>
        </a>
      </li> -->
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

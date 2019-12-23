<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Orders List
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Orders List</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Orders List</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
                <?php //print_r($orders); ?>
              <table class="table table-striped table-bordered datatable">
                <thead>
                  <th>#</th>
                  <th>Order Id</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Items</th>
                  <th>Amount</th>
                  <th>Order Date</th>
                  <th></th>
                </thead>
                <tbody>
                  <?php $i = 1; foreach ($orders as $key => $order) { ?>
                    <tr>
                      <td><?=$i++;?></td>
                      <td><?=$order->order_id?></td>
                      <td><?=ucwords($order->name)?></td>
                      <td><?=$order->mobile?></td>
                      <td>
                        <a href="#" data-toggle="modal" data-target="#myModal_<?=$order->id?>" style="color:green">
                          <?php
                            $items = unserialize($order->cart_items);
                            if(count($items) <= 1){
                              print_r($items[0]['product_name']);
                            }else{
                              echo count($items)." Items";
                            }
                          ?>
                        </a>
                      </td>
                      <td><?=$order->amount?></td>
                      <th><?=date('d-m-Y',strtotime($order->created))?></th>
                      <td>
                        <a href="#" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_<?=$order->id?>" style="color:green"><i class="fa fa-files-o"></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>

              <?php $i = 1; foreach ($orders as $key => $order) { ?>
                <!-- Modal -->
                <div id="myModal_<?=$order->id?>" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">
                          Order Details : 
                          <?php
                            $items = unserialize($order->cart_items);
                            if(count($items) <= 1){
                              print_r($items[0]['product_name']);
                            }else{
                              echo count($items)." Items";
                            }
                          ?>

                          (<?=$order->order_id?>)
                        </h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                            <?php //echo "<pre>"; print_r($order); echo "</pre>";?>
                            
                            <h5 class="col-md-12"><b>Order Details :</b></h5>
                            <div class="col-md-12">
                            <div class="col-md-4"><b>Name :</b> <?=$order->name?></div>
                              <div class="col-md-4"><b>Mobile :</b> <?=$order->mobile?></div>
                              <div class="col-md-4"><b>Mail Id :</b> <?=$order->email?></div>
                              <div class="col-md-4"><b>City :</b> <?=$order->city?></div>
                              <div class="col-md-4"><b>Land Mark :</b> <?=$order->landmark?></div>
                              <div class="col-md-4"><b>Area :</b> <?=$order->area?></div>
                              <div class="col-md-4"><b>Address :</b> <?=$order->address?></div>
                              <div class="col-md-4"><b>Pincode :</b> <?=$order->pincode?></div>
                            </div>
                            <h5 class="col-md-12"><b>Order Items Details :</b></h5>
                            <div class="col-md-12">
                              <table class="table table-striped table-bordered">
                                <thead>
                                  <th>Sno</th>
                                  <th>Image</th>
                                  <th>Category</th>
                                  <th>Product Name</th>
                                  <th>Qty</th>
                                  <th>Unit Qty</th>
                                  <th>Price</th>
                                  <th>Total</th>
                                </thead>
                                <tbody>
                                  <?php foreach(unserialize($order->cart_items) as $key => $items){ ?>
                                    <tr>
                                      <td><?=$key+1?></td>
                                      <td>
                                        <?php if(!empty($items['image'])){ ?>
                                          <img src="<?=base_url($items['image'])?>" style="width:25px;height:25px" class="img-circle">
                                        <?php } ?>
                                      </td>
                                      <td><?=$items['category']?></td>
                                      <td><?=$items['product_name']?></td>
                                      <td><?=$items['quntity']?></td>
                                      <td>
                                        <?php
                                          $units = $this->Model_default->select_data('meat_product_price_details',array('id'=>$items['unit_id']),'updated DESC');
                                          echo $units[0]->unit_size;
                                        ?>
                                      </td>
                                      <td><?=$units[0]->price?></td>
                                      <td><?=$units[0]->price*$items['quntity']?></td>
                                    </tr>
                                  <?php @$grandtotal += $units[0]->price*$items['quntity']; } ?>
                                    <tr>
                                      <td colspan="7"><b>Grand Total Amount :</b></td>
                                      <td><?=$grandtotal?></td>
                                    </tr>
                                </tbody>
                              </table>
                            </div>
                            <div class="col-md-12">
                              <h5><b>Special Request : </b></h5>
                              <?php if(!empty($order->special_request)){ ?>
                                <p><?=$order->special_request?></p>
                              <?php } ?>
                            </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
          <!-- /.box -->
        </div>
    </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
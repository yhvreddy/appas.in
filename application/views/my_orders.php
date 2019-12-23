<?php include 'header.php';?>

<!--<link rel='stylesheet' href='https://www.patternfly.org/components/patternfly/dist/js/patternfly.min.js'>-->
<link rel='stylesheet' href='https://www.patternfly.org/components/patternfly/dist/css/patternfly-additions.min.css'>
<!--<link rel='stylesheet' href='https://rawgit.com/patternfly/patternfly/master-dist/dist/css/patternfly.min.css'>-->
<style>
    span.pf-grab {
      content: '....';
      width: 10px;
      height: 20px;
      display: inline-block;
      cursor: move;
      cursor: grab;
      cursor: -moz-grab;
      cursor: -webkit-grab;
      line-height: 5px;
      padding: 3px 4px;
      cursor: grab;
      vertical-align: middle;
      margin-top: -1.1em;
      margin-right: 1em;
      font-size: 12px;
      font-family: sans-serif;
      letter-spacing: 2px;
      color: #cccccc;
      text-shadow: 1px 0 1px black;
    }
    span.pf-grab::after {
      content: '.. .. .. ..';
    }
.pf-grab:active {
  cursor: grabbing;
  cursor: -moz-grabbing;
  cursor: -webkit-grabbing;
}
</style>
	<section>
	<!-- partial:index.partial.html -->
<div class="container-fluid">
  <?php //print_r($orders); ?>
  <ul id="sortable" class="list-group list-view-pf list-view-pf-view">
    <?php 
      if(count($orders) != 0){    
        foreach($orders as $key => $order){ 
          
          ?>
          <li class="list-group-item" style="margin:10px 0px">
            <span class="pf-grab"></span> 
            
            <div class="list-view-pf-actions">
              <?php if($order->order_status == 1){ ?>
                    <button class="btn btn-success">Order Success</button>
                  <?php }else if($order->order_status == 2){ ?>
                    <button class="btn btn-failed">Failed to place order</button>
                  <?php }else if($order->order_status == 3){ ?>
                    <button class="btn btn-warning">Order Processing</button>
                  <?php }else if($order->order_status == 4){ ?>
                    <button class="btn btn-success">Order Delivery</button>
                  <?php }else{ ?>
                    <button class="btn btn-primary">Order Pending</button>
                  <?php } ?>
            </div>

            <div class="list-view-pf-main-info">      
              <div class="list-view-pf-left">
                <?=$order->order_id?>
              </div>
            
            <div class="list-view-pf-body">
              <div class="list-view-pf-description">

                <div class="list-group-item-text">
                  <?php
                    $items = unserialize($order->cart_items);
                    if(count($items) <= 1){
                      print_r($items[0]['product_name']);
                    }else{
                      echo count($items)." Items";
                    }
                  ?>
                </div>
              </div>
              <div class="list-view-pf-additional-info">
                <div class="list-view-pf-additional-info-item">
                  <a href="#" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal_<?=$order->id?>" style="color:green">Order Details</a>
                </div>
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
                <div class="list-view-pf-additional-info-item">
                  Price:&nbsp <strong> <?=$order->amount?> rs/- </strong> 
                </div>
              </div>
            </div>
            
          </li>
    <?php } 
      }else{ ?>
          <li class="list-group-item">
            <div class="list-view-pf-body">
              No Orders Found
            </div>
          </li>
    <?php }?>
  </ul>
</div>
	</section>
	<script>
	    $( function() {
    $( "#sortable" ).sortable({
      handle: ".pf-grab"
    });
  } );
	</script>

<?php include 'footer.php';?>

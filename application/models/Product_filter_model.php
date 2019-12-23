<?php

class Product_filter_model extends CI_Model{
    function fetch_filter_type($type){
      $this->db->distinct();
      $this->db->select($type);
      $this->db->from('ks_sub_categories');
      $this->db->where('status', '1');
      return $this->db->get();
    }

  function make_query($brand){
    $query = "SELECT * FROM ks_sub_categories WHERE status = '1'";

    // if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
    // {
    //   $query .= " AND price BETWEEN '".$minimum_price."' AND '".$maximum_price."'";
    // }

    if(isset($brand)){
      $brand = implode("','", $brand);
      $query .= " AND category_id IN('".$brand."')";
    }

    // if(isset($ram))
    // {
    //  $ram_filter = implode("','", $ram);
    //  $query .= "
    //   AND product_ram IN('".$ram_filter."')
    //  ";
    // }

    // if(isset($storage))
    // {
    //  $storage_filter = implode("','", $storage);
    //  $query .= "
    //   AND product_storage IN('".$storage_filter."')
    //  ";
    // }
    return $query;
  }


  function count_all($brand){
    $query = $this->make_query($brand);
    $data = $this->db->query($query);
    return $data->num_rows();
  }

 function fetch_data($limit, $start, $brand){
    $query = $this->make_query($brand);
    //$query .= ' LIMIT '.$start.', ' . $limit;
    $data = $this->db->query($query);
    $result = $data->result();
    $output = '';
   
    if(count($result) != 0){
      foreach ($result as $key => $value) {
        # code...
        //$output .= json_encode($value);
        $output .= '<div class="col-sm-6 col-md-4 col-lg-6 col-xl-4">
                    <article class="product">
                      <div class="product-body">
                        <div class="product-figure">';

                          if(!empty($value->image)){
                            $output .= '<img src="'.base_url($value->image).'" alt="" width="220" height="160"/>';
                          }else{
                            $output .= '<img src="'.base_url('assets/images/ks_no_image.jpg').'" alt="" width="220" height="160"/>';
                          } 
                        $output .= '</div>
                        <h5 class="product-title"><a href="'.base_url('product/details/'.$value->id.'/'.strtolower(url_title($value->sub_category_name))).'">'.$value->sub_category_name.'</a></h5>
                        <div class="product-price-wrap">
                          <div class="product-price product-price-old" style="display: none">'.$value->price.'</div>
                          <div class="product-price">$'.$value->price.'</div>
                        </div>
                      </div><!-- <span class="product-badge product-badge-sale">Sale</span> -->
                      <div class="product-button-wrap">
                        <div class="product-button">
                          <a class="button button-secondary button-zakaria fl-bigmug-line-search74" href="'.base_url('product/details/'.$value->id.'/'.strtolower(url_title($value->sub_category_name))).'"></a>
                        </div>
                        <div class="product-button">
                          <button class="button button-primary button-zakaria fl-bigmug-line-shopping202 add_cart" data-productid="'.$value->id.'" data-productname="'.$value->sub_category_name.'" data-productprice="'.$value->price.'" href="javascript:(0);"></button>
                        </div>
                      </div>
                    </article>
                  </div>';
         
      }
    }
    
    return $output;
  }
}

?>
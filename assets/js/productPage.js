var tempOrderId='',cartCount=0,isBuyNow=false;(function(){var location=window.localStorage.getItem("locality");if(location){$('#spoc').val(location);}})($);function showCartAlert(){$('.checkOutModal').addClass('open');if(isMobile){$('.productPage').addClass('p-b-70');}}
function hideCartAlert(){$('.checkOutModal').removeClass('open');$('.bgProductOverlay').fadeOut();$('body').removeClass('overflow-h');$('.productPage').removeClass('p-b-70');}
function addToCart(productId,buyNow,deliveryType=''){var quantity=$('#product_'+productId).find('.quantitySelector').val();console.log(productId,parseFloat(quantity));if($('#spoc').val().length>0){if($('#spoc').val()!='na'){updateQty(parseFloat(quantity),productId,buyNow);}else{showCustomAlert('Please enter locality within range..!')}}else{selectedProdutId=productId;isBuyNow=buyNow;if($(window).width()<=mobileWidth){openLocationModal();}else{$('.locationCon').trigger('click');$('html, body').animate({scrollTop:0});}}}
function gotoCheckout(){if(cartTotal>=75){window.location.href="/checkout";}else{$('.minCartDialog').modal('show');}}
function suppsucccountry(responce){if(responce=="country"){showCustomAlert("select scheduled delivery because cleaning country chicken  will take time");}else{}}
function updateQty(add,product_code,buyNow){showLoader();var params="&product_code="+product_code+"&qty="+add;selectedProdutId='';isBuyNow=false;if(tempOrderId&&tempOrderId!=='undefined'){params+="&temp_order_id="+tempOrderId;}else{var temp=window.localStorage.getItem("tempOrderId");if(temp!=''&&temp!=null&&temp!=='undefined'){tempOrderId=temp;params+="&temp_order_id="+tempOrderId;}else{params+="&temp_order_id=";}}
$.ajax({type:"GET",url:apiPath+"?cartmethod=1"+params,success:function(response){hideLoader();if(response.result=='success'){tempOrderId=response.temp_order_id;cartCount=response.cart_count;cartTotal=response.sumofcart;$('.cart-number').text(cartCount).addClass('cartCount');window.localStorage.setItem("tempOrderId",tempOrderId);var cartText=cartCount+' item'+(cartCount==1?'':'s');$('.cart-text').text(cartText);showCartAlert();if(buyNow){gotoCheckout();}}},error:function(err){console.log('Add to cart fail',err);hideLoader();}});}
function getProducts(){var params="get_products=1&pro_category="+productCategory;$.ajax({type:"GET",url:apiPath+"?"+params,success:function(response){if(response.result=='success'){if(response.items&&response.items.length>0){var html='';for(var i=0;i<response.items.length;i++){var product=response.items[i];var image=product.image.replace('products/','onlymeatnewtesting/products/images/');html+='<div class="col-lg-4 col-md-6">'+
'<div class="card productCard" id="product_'+product.product_code+'"'+
' data-price="'+product.price+'">'+
'<figure class="p-10">'+
'<div class="prodImgCon">'+
'<img class="card-img-top" src="'+image+'" alt="'+product.name+'">'+
'</div>'+
'<!-- <figcaption class="offers">'+
'1 combo available'+
'</figcaption> -->'+
'</figure>'+
'<div class="card-body">'+
'<h5 class="card-title d-flex flex-column">'+
'<span class="m-b-5">'+product.name+'</span>'+
'<span class="rate">&#x20B9; '+product.price+' per KG</span>'+
'</h5>'+
'<div class="card-text d-flex align-items-center m-b-25">'+
'<span class="p-r-25 smallText font-w600 whiteSpace-nw">Select Weight</span>'+
'<div class="form-group m-b-0 w-75">'+
'<select class="custom-select quantitySelector" required>'+
'<option value="0.5">500 gms &#x00A0;&#x00A0;&#x20B9 '+(product.price/2)+'</option>'+
'<option value="1">1 kg &#x00A0;&#x00A0;&#x20B9 '+product.price+'</option>'+
'<option value="2">2 kgs &#x00A0;&#x00A0;&#x20B9 '+(product.price*2)+'</option>'+
'</select>'+
'<div class="invalid-feedback">Example invalid custom select feedback</div>'+
'</div>'+
'</div>'+
'<div class="actionBtns d-flex flex-row justify-content-between w-100">'+
'<button type="button" class="btn primaryBtnInverse btn-add-cart addToCart"'+
' onclick="addToCart('+product.product_code+')"><i class="material-icons icon-check m-r-10"></i> Add To Cart</button>'+
'<button type="button" class="btn primaryBtn"'+
' onclick="buyNow('+product.product_code+')">Buy Now</button>'+
'</div>'+
'</div>'+
'</div>'+
'</div>';}
$('.products-list').html(html);}else{handleEmptyCart();}}else{handleEmptyCart();}},error:function(response){console.log('Error occurred',response);}});}
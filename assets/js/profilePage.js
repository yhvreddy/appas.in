var user = window.localStorage.getItem('user');
  user = JSON.parse(user);
  var address_list = [];

(function(){

  if (!user) {
    showCustomAlert("You must login first to view this page");
    $('.signin').trigger('click');
    //window.location.href = '/';
    return false;
  }

  $('#formFirstName').val(user.name);
  $('#formLastName').val(user.last_name);
  $('#formEmail').val(user.email);
  $('#formMobileNum').val(user.mobile);
  $('.user-name').text(user.name);
  $('.listOfLinks').on('click', 'li', function(e){
    var tabId = this.dataset.id;
    if(tabId && $(window).width() <= 991.98){
        $('.listInfo').show(); 
        $('.listInfo .listInfoItem, .listOfLinks').hide();
        $('#'+tabId).show();
        return;
    }
    if(tabId){
      $('.listInfo .listInfoItem').hide();
      $('#'+tabId).show();
    }
    e.stopPropagation();
  });
  $('.backToList, .cancelPwdChange').on('click', function(){
    if(isMobile){
      $('.listInfo').hide();
      $('.listOfLinks').show();
    }else{
      $('.listInfoItem').hide();
      $('#personalInfo').show();
    }
  });
  $('.addAddrScrBtn, .cancelAddr').on('click', function(){
    $('#addAddrScreen').toggleClass('d-none');
    $('.addAddrScrBtn').toggleClass('d-none');
  });

  $('.addAddrBtn').on('click', saveAddress);
  $('.editLink, .cancelProfileEdit').on('click', function(){
    $('.otpField, .editText, .cancelText, .profile-save, .cancelProfileEdit').toggleClass('d-none');
    $('.resendOtp').addClass('d-none')
    $('.sendOtp').removeClass('d-none')
  });
  $('.sendOtp').on('click', function (){
    $('.sendOtp').prop('disabled', true);
    setTimeout(function(){
      $('.sendOtp').addClass('d-none');
      $('.resendOtp').removeClass('d-none');
    }, 10000);
  });

  if (location.hash) {
    var hash = location.hash.substr(1);
    if (hash == 'orders') {
      $('.my-orders').trigger('click');
    }
  }

  getUserAddresses();
  getPreviousOrders();
})($);

function changePassword() {
  if (user && (user.mobile  || user.email)) {
    var username = (user.mobile || user.email);
    var newpwd = $('#formNewPwd').val(),
      retypepwd = $('#formRetypeNewPwd').val(),
      oldpwd = $('#formCurrPwd').val();
    $('.formValidMsg').fadeOut();
    if (newpwd.length == 0 || retypepwd.length == 0 || oldpwd.length == 0) {
      $('.per-pwd-err, .per-npwd-err, .per-rpwd-err').text('Password fields cannot be empty').fadeIn();
      return;
    }
    if (newpwd !== retypepwd) {
      $('.per-npwd-err, .per-rpwd-err').text('Passwords do not match. Please enter again').fadeIn();
      return;
    }
    if (newpwd.length < 6) {
      $('.per-npwd-err').text('New Password should be minimum 6 characters').fadeIn();
      return;
    }
    
    showLoader();
    $('.pwd-error').text('');

  // updatepassowrd=1,mobile=mobile,newpass=newpassword,oldpass=oldpassword
    var data = { updatepassowrd: 1, mobile: username, newpass: newpwd, oldpass: oldpwd };
    $.ajax({
      type: "POST",
      url: apiPath,
      data: data,
      //dataType: 'application/json',
      success: function(resp) {
        console.log('Password update response is ', resp);
        if (resp.result === 'success') {
          showCustomAlert('Password is updated successfully');
          $('.cancelPwdChange').trigger('click');
        } else {
          $('.per-pwd-err').text(resp.message).fadeIn();
        }
        hideLoader();
      },
      error: function(resp) {
        console.log('Password updation failed', resp);
        hideLoader();
      }
    });
  } else {
    showCustomAlert('You must be logged in to view profile');
  }
}

function saveAddress() {
  if (user && (user.mobile  || user.email)) {
    var username = (user.mobile || user.email);
    var city = $('#formCity').val(),
      // postalCode = $('#formPostal').val(),
      address1 = $('#address1').val(),
      // address2 = $('#address2').val(),
      landmark = $('#landmark').val(),
      area = $('#area').val();
    var formValid = true;
    var addressid = $('.addressid').val();

    $('.formValidMsg').fadeOut();
    if (city.length == 0) {
      $('.per-city-err').text('Please enter City').fadeIn();
      formValid = false;
    }
    /*if (postalCode.length == 0) {
      $('.per-postal-err').text('Please enter Postal Code').fadeIn();
      formValid = false;
    }*/
    if (address1.length == 0) {
      $('.per-addr1-err').text('Please enter Address1').fadeIn();
      formValid = false;
    }
    if (landmark.length == 0) {
      $('.per-landm-err').text('Please enter Landmark').fadeIn();
      formValid = false;
    }
    if (area.length == 0) {
      $('.per-area-err').text('Please enter Area').fadeIn();
      formValid = false;
    }
    
    if (!formValid) {
      return;
    }

    $('.form-error').text('');
    showLoader();

  // updatepassowrd=1,mobile=mobile,newpass=newpassword,oldpass=oldpassword
    // var data = { add_address: 1, username: mobile, address1: address1, address2: address2 || "",
    //  area: area, landmark: landmark, city: city, pincode: postalCode };

    var spocId = window.localStorage.getItem("spocId"),
          loc_latlong = window.localStorage.getItem("loc_latlong");

    var data = "username=" + username +
      "&area=" + area +
      "&landmark=" + landmark +
      "&loc_latlong=" + loc_latlong +
      "&spoc=" + spocId +
      "&city=" + city;
      
    if (addressid) {
      data += "&address_id=" + addressid +
        "&update_address=1" +
        "&add1=" + address1;
        // "&add2=" + (address2 || "")
        // "&zipcode=" + postalCode;
    } else {
      data += "&add_address=1" +
        "&address1=" + address1;
        // "&address2=" + (address2 || "");
        // "&pincode=" + postalCode;
    }
    $.ajax({
      type: "POST",
      url: apiPath,
      data: data,
      //dataType: 'application/json',
      success: function(resp) {
        console.log('Address update response is ', resp);
        if (resp.result === 'success') {
          showCustomAlert('Address updated successfully');
          $('#addAddrScreen, .addAddrScrBtn').toggleClass('d-none');
          if (resp.address_list) {
            updateAddresses(resp.address_list);
          } else {
            getUserAddresses();
          }
        } else {
          $('.per-postal-err').text(resp.message).fadeIn();
        }
        hideLoader();
      },
      error: function(resp) {
        console.log('Address updation failed', resp);
        hideLoader();
      }
    });
  } else {
    showCustomAlert('You must me logged in to update Address', true);
  }
}

function getUserAddresses() {
  var user = window.localStorage.getItem("user");
  user = JSON.parse(user);
  if (user) {
    showLoader();
    $.ajax({
      type: "POST",
      url: apiPath,
      data: "address_list=1&username=" + (user.mobile || user.email),
      success: function(response) {
        if (response.result == 'success') {
          console.log(response);
          address_list = response.address_list;
          if (address_list && address_list.length > 0) {
            updateAddresses(address_list);
            $('#addresses').removeClass('d-none');
            // selectedAddress = address_list[0];
          } else {
            handleEmptyAddress();
          }
        } else {
          handleEmptyAddress();
        }
        hideLoader();
      },
      error: function(response) {
        console.log('Error occurred', response);
        hideLoader();
      }
    });
  }
}

function updateAddresses(list) {
  var html = '';
  address_list = list;
  for(var i = 0; i < address_list.length; i++) {
    var address = address_list[i];
    var addString = address.addr1 +', ' + address.landmark +' '+ address.area +' '+ address.city;
    html += '<div class="position-relative mb-3">' +
      '<textarea class="form-control" id="address_box'+ i +'" rows="3" >'+ addString + '</textarea>' +
      '<a href="#" onclick="deleteAddress(event, '+ address.address_id +')" class="editLink">Delete</a>' +
      '</div>';
  }

  $('#addresses .list').html(html);
}

function handleEmptyAddress() {
  $('#addresses .list').html('<p>No Addresses found. Please Add your Address for quick order processing.</p>');
  $('#addresses').removeClass('d-none');
}

function getPreviousOrders() {
  var user = window.localStorage.getItem("user");
  user = JSON.parse(user);
  if (user) {
    showLoader();
    $.ajax({
      type: "GET",
      url: apiPath + "?getpreviousorders=1&username=" + (user.mobile || user.email),
      success: function(response) {
        if (response.result == 'success') {
          console.log(response);
          var list = response.productlist;
          if (list && list.length > 0) {
            var html = '';
            for(var i = 0; i < list.length; i++) {
              var order = list[i];
              //var product = order.productlist[0];
              html += '<div class="card cartCard p-0">' +
                '<div class="cartInfo row m-0 px-0 divider-b">';

                for(var j = 0; j < order.productlist.length; j++) {
                  var product = order.productlist[j];
                  var image = '/assets/placeholder.png';
                  if (product.p_image) {
                    var splitPaths = product.p_image.split('/');
                    image = imageBaseUrl + 'products/' + splitPaths[splitPaths.length - 1];
                  }
                  
                  html += '<div class="col-12 col-md-6 d-flex align-items-center">' +
                   '<figure class="p-10">' +
                    '<img class="card-img-top" src="'+ image +'" alt="'+ product.p_name +'">' +
                  '</figure>' +
                  '<div class="card-body flex-grow-1">' +
                    '<h5 class="card-title d-flex flex-column mb-0">' +
                      '<span class="m-b-5">'+ product['p_name'] +'</span>' +
                    '</h5>' +
                    '<span class="rate">Net weight: '+ (product['p_qty'] * 1000) +' grms</span>' +
                    '<div class="card-text d-flex align-items-center m-b-25">' +
                      '<span class="p-r-5 smallText">Price: &#x20B9; '+ product['p_cost'] +'</span>' +
                    '</div>' +
                    '</div>' +
                  '</div>';
                }
                //'<div class="actionBtns d-flex justify-content-end flex-grow-1">' +
                //  '<button type="button" class="btn primaryBtn">Track Status</button>' +
                //'</div>' +
                var orderedDate = formatDate(order.order_placed_on);
                var deliveredDate = formatDate(order.order_delivered_on);

                /*if(address_list.length > 0) {
                  var address = address_list[0];
                  address = (address.addr1 ? address.addr1 +', ' : '') + (address.addr2 || '') +' '+ (address.landmark || '') +' '+ (address.area || '') +' '+ (address.city || '') + (address.pincode ? ' - '+ address.pincode : '');
                } else {
                  address = '--';
                }*/
              html += '</div>' +
              '<div class="d-flex align-items-start flex-column-reverse flex-sm-row align-items-sm-center">' +
                '<div class="deliveryInfo col-md">' +
                  '<h6 class="m-b-10 font-w600">Delivery Address</h6>' +
                  '<div class="d-flex smallText">' +
                    '<p class="flex-grow-1 m-b-0 m-r-10">'+ (order.order_address || '--') + '</p>' +
                    // '<a href="#">Edit</a>' +
                  '</div>' +
                '</div>' +
                '<div class="d-flex flex-column flex-sm-row align-items-sm-center col-md">' +
                '<div class="dateInfo smallText flex-grow-1">' +
                  '<div class="orderDate">' +
                    '<span class="font-w600">Order Number    :</span> '+ order.order_number +
                  '</div>' +
                  '<div class="orderDate">' +
                    '<span class="font-w600">Ordered on  :</span> '+ orderedDate +
                  '</div>';
                  if (order.order_delivered_on) {
                    html += '<div class="deliveryDate">' +
                      '<span class="font-w600">Delivered on :</span> ' + deliveredDate +
                    '</div>';
                  }
                html += '</div>' +
                '<div class="statusInfo smallText d-flex flex-sm-column">' +
                  '<span class="font-w600">Status</span>' +
                  '<span class="statusType successTextColor">'+ order.order_status +'</span>' +
                '</div>' +
              '</div>' +
              '</div>'+
            '</div>';
            }

            $('#myAccOrders .orders').html(html);
            //selectedAddress = address_list[0];
          } else {
            $('#myAccOrders .orders').html('Looks like you haven\'t ordered yet from us.');
          }
        } else {
          $('#myAccOrders .orders').html('Looks like you haven\'t ordered yet from us.');
        }
        hideLoader();
      },
      error: function(response) {
        console.log('Error occurred', response);
        hideLoader();
      }
    });
  }
}

function formatDate(date) {
  var formattedDate = '';
  if (date) {
    var dt = date.split(' ')[0].split('-');
    var orderDate = new Date(dt[2], dt[1] - 1, dt[0]);
    formattedDate = orderDate.getDate() + " " + months[orderDate.getMonth()] + ", " + orderDate.getFullYear();
  }
  return formattedDate;
}

function deleteAddress(event, id) {
  if (event) {
    event.preventDefault();
  }
  showLoader();
  $.ajax({
    type: "GET",
    url: apiPath + "?removeaddress=1&address_id=" + id,
    success: function(response) {
      if (response.result == 'success') {
        console.log('Address deleted successfully');
        getUserAddresses();
      }
      hideLoader();
    },
    error: function(resp) {
      console.log('Delete Address failed', resp);
      hideLoader();
    }
  }); 
}

function updateProfile() {
  // if (user && user.mobile) {
    var mobile = user.mobile || '';
    var first_name = $('#formFirstName').val(),
      last_name = $('#formLastName').val(),
      newEmail = $('#formEmail').val(),
      formOtp = $('#formOtp').val(),
      newMobile = $('#formMobileNum').val();
    $('.formValidMsg').fadeOut();
    if (first_name.length == 0 || newEmail.length == 0 || newMobile.length == 0) {
      if (first_name.length == 0) {
        $('.per-fname-err').text('Name cannot be empty').fadeIn();
      }
      if (newEmail.length == 0) {
        $('.per-email-err').text('Email cannot be empty').fadeIn();
      }
      if (newMobile.length == 0) {
        $('.per-mob-err').text('Mobile cannot be empty').fadeIn();
      }
      return;
    }
    var emailReg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!emailReg.test(newEmail))
    {
      $('.per-email-err').text('Please enter a valid email address.').fadeIn();
      return;
    }
    var intRegex = /[0-9 -()+]+$/;
    if (intRegex.test(newMobile)) {
      if (newMobile.length !== 10) {
        $('.per-mob-err').text('Please Enter a valid Mobile number').fadeIn();
        return;
      }
    }
    if (!formOtp || formOtp.length < 6) {
      $('.per-otp-err').text('Please enter a valid OTP').fadeIn();
      return;
    }
    
    showLoader();
    // $('.pwd-error').text('');

    // updateprofile=1,username=username,mobile=mobile,new_mobile=new mobile no,email=email,first_name=first name,last_name=last name,
    var data = { updateprofile: 1, username: (user.mobile || user.email),
       mobile: mobile, new_mobile: newMobile, email: newEmail,
       first_name: first_name, last_name: last_name, otp: formOtp };
    $.ajax({
      type: "POST",
      url: apiPath,
      data: data,
      //dataType: 'application/json',
      success: function(resp) {
        console.log('Profile update response is ', resp);
        if (resp.result === 'success') {
          showCustomAlert(resp.message);
          delete resp.message;
          delete resp.incoming;
          delete resp.result;
          user = resp;
          window.localStorage.setItem("user", JSON.stringify(user));
          // $('#deliveryCollapse').collapse('show');
        } else {
          $('.per-otp-err').text(resp.message).fadeIn();
        }
        hideLoader();
      },
      error: function(resp) {
        console.log('Profile updation failed', resp);
        hideLoader();
      }
    });
  // } else {
   // showCustomAlert('You must be logged in to view profile');
  // }
}

function logout() {
  window.localStorage.removeItem("user");
  window.location.href = '/';
}

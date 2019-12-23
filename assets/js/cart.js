var address_list = [];
var deliveryDate = '',
    deliverySlot = '',
    deliverySlots = ["7AM - 9AM", "9AM - 11AM", "11AM - 1PM", "4PM - 6PM", "6PM - 8PM"],
    weekDayNames = ["SUNDAY", "MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY"],
    deliveryType = 1,
    cartItemsCount = 0,
    deliveryCharge = 25,
    discountAmount = 0,
    discountPercentage = 0,
    minOrderValue = 0,
    freeProduct = '',
    freeQty = 0,
    selectedPromo = '',
    validFrom = '',
    validTo = '',
    promoCode = '',
    availed_offers = [],
    selectedAddress = "";

var today = new Date();
deliveryDate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();

var errorMsgs = {
    invalidCode: "Invalid Promo Code",
    expiredCode: "Promo code you entered is Expired",
    minOrderValue: "Min order value for the offer to be applied is "
};

var device = getSource();

(function () {

    (function disableDeliveryBtn() {
        var currDate = new Date();
        // if(currDate.toLocaleTimeString().split(':')[0] >= 7 && currDate.toLocaleTimeString().indexOf('PM') >= 0){
        if (!(currDate.getHours() >= 8 && currDate.getHours() < 19)) {
            $('[data-deliver=1]').attr('disabled', 'disabled');
            deliveryTypeChanged(2)
        }
    })();


    renderAvailablePromos();

    /*var currentTimestamp = new Date().getTime();
    console.log(device);
    for (var i = 0; i < promos.length; i++) {
        var promo = promos[i];
        var valid_from = parseInt(promo.valid_from) * 1000,
            valid_to = parseInt(promo.valid_to) * 1000;
        // console.log(currentTimestamp, promo.valid_from, promo.valid_to);
        if ((promo.medium == 'ALL' || promo.medium.toLowerCase() == device) && promo.promo_code == '') {
            if (promo.type == 'delivery') {
                applyDeliveryDiscount(promo);
                break;
            }
            if (promo.type == 'discount') {
                applyCartDiscount(promo);
                break;
            }
        }
    } */

    if (selectedPromo) {
        validFrom = new Date(parseInt(selectedPromo.valid_from) * 1000);
        validTo = new Date(parseInt(selectedPromo.valid_to) * 1000);
    }



    $('.billInfo, .charges-con').hide();
    if ($(window).width() <= 992) {
        $('.hide-md-down').remove();
        $('.mobileTitleHeader').show();
    } else {
        $('.show-md-down').remove();
    }

    $('#instaPayment, #addAddrScreen, #addAddrScreenResp').hide();
    if (window.localStorage.getItem('user')) {
        user = window.localStorage.getItem('user');

        if (user && user.length > 0) {
            user = JSON.parse(user);
            if (user.mobile || user.email) {
                $('#deliveryCollapse').collapse('show');
            }
            getAvailedOffers();
        }
    }

    $('.previewOrder').on('click', deliverySelected);
    $('.proceedToPay').on('click', showPayment);

    $('.backToDeliveryPage').on('click', function () {
        if ($(window).width() <= 992) {
            // $('.mobileTitleHeader').toggle();
            $('.deliveryCard').addClass('active');
            $('.previewCard').removeClass('active');
            return false;
        }
    });

    $('.backToPreviewPage').on('click', function () {
        if ($(window).width() <= 992) {
            // $('.mobileTitleHeader').toggle();
            $('.previewCard').addClass('active');
            $('.paymentCard').removeClass('active');
            return false;
        }
    });

    $('.backToCartInfoPage').on('click', function () {
        if ($(window).width() <= 992) {
            $('.cartDetailInfo').removeClass('d-none');
            $('.proceedToCart').addClass('d-none');
            $('.mobileTitleHeader').show();
            return false;
        }
    });

    $('.removePromoCode').on('click', function () {
        resetPromo();
        applyOffer();
    });

    $('.applyPromoCode').on('click', function () {
        var promoCon = $(this).parents('.promoCon');
        var enteredCode = $(promoCon).find('.promoCode').val();

        applyPromoCode(enteredCode);

    });

    $('#cartLogin').on('click', function () {
        var mobile = $('[name=mobile]').val().trim();

        if (otpLogin) {
            var password = $('[name=otp]').val().trim();
        } else {
            var password = $('[name=password]').val().trim();
        }

        validateLogin(mobile, password);
    });

    $('#cartRespLogin').on('click', function () {
        var mobile = $('[name=cartLoginMobile]').val().trim();
        if (otpLogin) {
            var password = $('[name=cartOtp]').val().trim();
        } else {
            var password = $('[name=cartLoginPassword]').val().trim();
        }

        validateLogin(mobile, password);
        $('.mobileTitleHeader').hide();
    });

    $('.backToSummaryPage').on('click', function () {
        if ($(window).width() <= 992) {
            if (user) {
                $('.cartDetailInfo, .proceedToCart').toggleClass('d-none');
            } else {
                $('.orderLogin').toggle();
            }
            $('.deliveryCard').toggleClass('active');
            $('.mobileTitleHeader').show();
            return false;
        }
        // var mobile = $('#mobNumber').val();
        // var password = $('#loginPwd').val();

        // validateLogin(mobile, password);
        // $('#deliveryCollapse').collapse('show');
    });

    $('.signUpProceed').on('click', function () {
        var mobile = $('#mobileNumber').val().trim();
        var password = $('#signupPwd').val().trim();
        var confirmPwd = $('#confirmPwd').val().trim();
        var email = $('#email').val().trim();
        var firstName = $('#firstName').val().trim();
        var lastName = $('#lastName').val().trim();

        validateSignup(mobile, password, confirmPwd, email, firstName, lastName);
    });

    $('.havePromoCode').on('click', function () {
        $(this).toggleClass('d-none')
        $('.promoCode').toggleClass('d-none')
    });

    $('.deliverBtn').on('click', deliverySelected);

    getCartDetails();
    getUserAddresses();

    $('.createBtn, .cartBackToLogin').on('click', function (e) {
        if (e) e.stopPropagation();
        if ($(window).width() <= 992) {
            $('#createAccount, #cartMobLoginScreen, #loginScreen').toggle();
            $('.loginText, .createAccText').toggleClass('d-none')
        } else {
            $('#cartCreateAccount, #cartLoginScreen').toggle();
        }

    });

    $('.addAddrBtn').on('click', function () {

        $('#formCity').val('');
        // $('#formPostal').val('');
        $('#address1').val('');
        $('#address2').val('');
        $('#landmark').val('');
        $('#area').val('');
        $('.addressid').val('');

        $('#addAddrScreen, #addAddrScreenResp').show();
        if (isMobile) {
            $('html, body').animate({ scrollTop: $('#addAddrScreenResp').offset().top - 30 })
        }
    });
    $('.addAddCancelBtn').on('click', function () {
        $('#addAddrScreen, #addAddrScreenResp').hide();
    });

    $('.deliveryDates').on('click', '.dateSlot', function () {
        deliveryDate = $(this).data('date');
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
        setDeliverySlot(deliveryDate);
        renderAvailablePromos();
        if (promoCode || selectedPromo) {
            $('.applyPromoCode').click();
        } else {
            $('input[name=offer-id]:checked').click();
        }
    });

    $('.deliveryTimes').on('click', '.timeSlot', function () {
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    });

    var datesHtml = '';

    var today = new Date(), startIndex = 0;
    if (today.getHours() > 18) {
        startIndex = 1;
    }
    for (var i = 0; i < 7; i++) {
        var day = new Date(today.getFullYear(), today.getMonth(), today.getDate() + (startIndex + i));
        var date = day.getFullYear() + '-' + (day.getMonth() + 1) + '-' + day.getDate();
        datesHtml += '<div class="dateSlot d-flex flex-column align-items-center ' + (i == 0 ? 'active' : '') + '" data-date="' + date + '">' +
            '<span class="month">' + months[day.getMonth()] + '</span>' +
            '<span class="date">' + day.getDate() + '</span>' +
            '<span class="week">' + weekDays[day.getDay()] + '</span>' +
            '</div>';
    }

    $('.deliveryDates').html(datesHtml);

    $('.proceedAction').on('click', function () {
        if (cartItemsCount <= 0) {
            showCustomAlert('There are no items in your cart. Please add items to proceed');
            return;
        }
        if (cartTotal < 75) {
            $('.minCartDialog').modal('show');
            return;
        }
        $('.cartDetailInfo, .createAccText').addClass('d-none');
        $('.proceedToCart, .loginText').removeClass('d-none');
        $('#createAccount').hide();
        $('#cartMobLoginScreen').show();
        $('.mobileTitleHeader').hide();
        if ($(window).width() <= 992) {
            if (user) {
                $('.orderLogin').hide();
                $('.deliveryCard').addClass('active');
            } else {
                $('.orderLogin').show();
            }
        }

    })

})($);


function deliverySelected() {
    if (cartItemsCount <= 0) {
        showCustomAlert('There are no items in your cart. Please add items to proceed');
        return;
    }

    var type = $('.deliverImgBtn button.active').data('deliver');
    if (type) {
        if (type == 2) {
            if (!deliveryDate || !deliverySlot) {
                showCustomAlert('Please select Delivery Date and Slot');
                return;
            }
        }
        var delAddress = $('[name=deliveryAddress]:checked').val();
        if (!delAddress) {
            showCustomAlert('Please select / Add an Address to proceed', true);
            return;
        }
        if (isMobile) {
            $('.deliveryCard').removeClass('active');
            $('.previewCard').addClass('active');
        } else {
            $('[data-target="#deliveryCollapse"], [data-target="#paymentCollapse"]').removeClass('accordianDisable');
            $('#paymentCollapse').collapse('show');
        }
    } else {
        showCustomAlert('Please select Delivery Method');
    }

}

function showPayment() {
    $('.previewCard').removeClass('active');
    $('.paymentCard').addClass('active');
}

function deliveryTypeChanged(type) {
    // var type = $('[name=deliveryType]').val();
    deliveryType = type;

    $('.deliverImgBtn button').removeClass('active');
    if (type == 1) {
        $('.scheduleDelivery').hide();
        $('.deliverImgBtn.now button').addClass('active')
    } else {
        $('.scheduleDelivery').show();
        $('.deliverImgBtn.later button').addClass('active')
        if (!deliveryDate) {
            var today = new Date();
            deliveryDate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        }
        if (!deliverySlot) {
            deliverySlot = '7AM - 9AM';
            setDeliverySlot('');
        }
    }
}

function setDeliverySlot(dd) {
    var date = dd ? new Date(dd) : new Date();
    var today = new Date();
    $('.timeSlot').removeClass('active disabled').prop('disabled', false);
    if (date.getDate() == today.getDate()) {
        var hrs = today.getHours();
        if (hrs < 7) {
            $('.timeSlot.slot1').addClass('active');
        } else if (hrs < 9) {
            $('.timeSlot.slot1').prop('disabled', true).addClass('disabled');
            $('.timeSlot.slot2').addClass('active');
        } else if (hrs < 11) {
            $('.slot1, .slot2').prop('disabled', true).addClass('disabled');
            $('.timeSlot.slot3').addClass('active');
        } else if (hrs < 16) {
            $('.slot1, .slot2, .slot3').prop('disabled', true).addClass('disabled');
            $('.timeSlot.slot4').addClass('active');
        } else if (hrs <= 18) {
            $('.slot1, .slot2, .slot3, .slot4').prop('disabled', true).addClass('disabled');
            $('.timeSlot.slot5').addClass('active');
        } else {
            $('.timeSlot.slot1').addClass('active');
            deliveryDate = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + (today.getDate() + 1);
        }
    } else {
        $('.timeSlot.slot1').addClass('active');
        deliverySlot = $('.timeSlot.slot1').text();
    }
}

function editAddress(event, i) {
    var address = address_list[i];
    if (event) {
        event.preventDefault();
    }

    $('#formCity').val(address.city);
    // $('#formPostal').val(address.pincode);
    $('#address1').val(address.addr1);
    $('#address2').val(address.addr2);
    $('#landmark').val(address.landmark);
    $('#area').val(address.area);
    $('.addressid').val(address.address_id);

    $('#addAddrScreen, #addAddrScreenResp').show();
    if (isMobile) {
        $('html, body').animate({ scrollTop: $('#addAddrScreenResp').offset().top - 30 })
    }
}

// function activePaymentBtn(e){
//   $('.paymentBtn').removeClass('active');
//   $(e.currentTarget).addClass('active');
// }

// function openPayment(e) {
//   // Instamojo.open("https://instamojo.com/@ONLYMEAT");
//   Instamojo.open("https://test.instamojo.com/@anand_de64b");
//   activePaymentBtn(e)
// }


function updateQty(product_code, qty, type, increment, base_qty, unit_type, max_qty) {
    // /testingadmin/api.php?cartmethod=1
    // &temp_order_id=tempid&product_code=product_code&qty=quantity

    showLoader();
    if (type === 'plus') {
        var new_increment = (unit_type == 'kg' && qty >= 1.5) ? 0.5 : increment;
        qty += new_increment;
    } else {
        new_increment = (unit_type == 'kg' && qty > 1.5) ? 0.5 : increment;
        qty -= new_increment;
    }

    if (qty == 0 || qty < base_qty) {
        removeItem(product_code);
        return;
    }

    if (qty > max_qty) {
        return;
    }

    var params = "&product_code=" + product_code + "&qty=" + qty;

    var tempOrderId = window.localStorage.getItem("tempOrderId");
    if (tempOrderId) {
        params += "&temp_order_id=" + tempOrderId;
    }
    $.ajax({

        type: "GET",
        url: apiPath + "?cartmethod=1" + params,
        success: function (response) {
            if (response.result == 'success') {
                tempOrderId = response.temp_order_id;
                cartCount = response.cart_count;
                cartTotal = response.sumofcart;
                $('.cart-number').text(cartCount).addClass('cartCount');

                window.localStorage.setItem("tempOrderId", tempOrderId);
                var cartText = cartCount + ' item' + (cartCount == 1 ? '' : 's');
                $('.cart-text').text(cartText);
                getCartDetails();
            }
            hideLoader();
        },
        error: function (err) {
            console.log('Update Quantity error', err);
            hideLoader();
        }
    });

    // console.log("code:" + product_code + ", qty: " + quantity + ", add: " + add);

}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

function submitOrder(paymentMode) {

    var spoc = window.localStorage.getItem("spocId");
    ;
    $('.paymentBtn').removeClass('active');
    $(this).addClass('active');
    showLoader();

    var user = window.localStorage.getItem("user");
    if (!user || user == 'undefined') {
        return;
    }
    user = JSON.parse(user);
    var tempOrderId = window.localStorage.getItem("tempOrderId"),
        delAddress = $('[name=deliveryAddress]:checked').val(),
        paymentType = paymentMode;
    var slot = $('.timeSlot.active').data('slot'),
        deliverySlot = (deliveryType == 1) ? 'NOW' : deliverySlots[slot - 1];
    // deliverySlot = $('input[name=delivery_slot]').val();
    //activePaymentBtn();
    var data = "order=1&temp_order_id=" + tempOrderId +
        "&mobile=" + (user.mobile || user.email) +
        "&address_id=" + (delAddress || selectedAddress.address_id) +
        "&delivery_type=" + deliveryType +
        "&delivery_date=" + deliveryDate +
        "&delivery_slot=" + deliverySlot +
        "&special_request=" + $('#special_request').val().trim() +
        "&payment_type=" + paymentType;

    if (selectedPromo) {
        data += '&promo_code=' + selectedPromo.promo_code + '&offer_id=' + selectedPromo.id;
    }
    if (spoc && spoc !== 'undefined') {
        data += '&spoc=' + spoc;
    }
    if (getCookie("source") !== undefined)
        data += '&source=' + getCookie("source");

    console.log(data);
    // return;
    window.localStorage.setItem('orderData', data);

    $.ajax({
        type: "POST",
        url: apiPath,
        data: data,
        success: function (response) {
            console.log(response);
            if (response.result == 'success') {
                var order_number = response.ordnumber;
                window.localStorage.setItem('ongoingOrder', order_number);
                if (paymentType == "COD" || paymentType == "CAOD") {
                    hideLoader();
                    window.localStorage.setItem("tempOrderId", "");
                    window.localStorage.setItem('orderStatus', 'success');
                    // showCustomAlert('Order placed successfully');
                    // $('.checkOutModal').addClass('open');
                    $('.successDialog').modal('show');
                    setTimeout(function () {
                        // window.location.href = '/profile#orders';
                        goto('/order-confirmation?order_number=' + order_number);
                    }, 2000);

                } else if (paymentType == "Online" || paymentType == "Paytm") {
                    // alert('Redirecting to Payment page');
                    var paymentUrl = '/';
                    var params = '?uniqid=' + order_number +
                        '&purpose=onlymeat&amount=' + response.amount +
                        '&buyer_name=' + response.customername +
                        '&mobile=' + response.custmob +
                        '&email=' + response.custemail;
                    if (paymentType == "Online") {
                        paymentUrl += 'instamojo/pay.php' + params;
                    } else if (paymentType == "Paytm") {
                        paymentUrl += 'paytm_web/pgRedirect.php' + params;
                    }
                    window.localStorage.setItem("tempOrderId", "");
                    window.location.href = paymentUrl;
                }
                // $('#product' + p_code).remove();
                // if (response.cart_count == 0) {
                //   handleEmptyCart();
                // } else {
                //   $('.cart-number').text(response.cart_count);
                // }
            } else {
                hideLoader();
                showCustomAlert(response.message, true);
            }
        },
        error: function (err) {
            hideLoader();
            showCustomAlert('Order submission failed : ' + err);
        }
    });
}

function removeItem(p_code) {
    var tempOrderId = window.localStorage.getItem("tempOrderId");
    if (tempOrderId != '' && tempOrderId != null) {
        showLoader();
        $.ajax({
            type: "GET",
            url: apiPath + "?removefromcart=1&temp_order_id=" + tempOrderId + '&product_code=' + p_code,
            success: function (response) {
                if (response.result == 'success') {
                    // showCustomAlert('Removed successfully');
                    $('#product' + p_code).remove();
                    getCartDetails();
                    if (response.cart_count == 0) {
                        handleEmptyCart();
                    } else {
                        $('.cart-number').text(response.cart_count);
                    }
                }
                hideLoader();
            },
            error: function (err) {
                console.log('Cart Remove Item error', err);
                hideLoader();
            }
        });
    }
}

function resetPromo() {
    selectedPromo = '';
    deliveryCharge = 25;
    minOrderValue = 0;
    discountAmount = 0;
    discountPercentage = 0;
    promoCode = '';
    freeProduct = '';
    freeQty = 0;

    $('.promoCon').show();
    $('.codeApplied').hide();
}

function renderAvailablePromos() {
    return false;
    var promosHtml = '';
    resetPromo();
    applyOffer(false);
    for (var i = 0; i < promos.length; i++) {
        var promo = promos[i];
        if (promo.medium == 'ALL' || promo.medium == 'NON-MANUAL' || promo.medium.toLowerCase() == device) {
            if (promo.promo_code == '' && !selectedPromo) {
                console.log(promo.promo_code, promo);
                validateOffer(promo, false);
            }
            promosHtml += getPromoHtml(promo);
        }
    }
    if (promosHtml.length > 0) {
        $('.available-promos .promos').html(promosHtml);
        $('.available-promos').show();
    } else {
        $('.available-promos .promos').html('');
        $('.available-promos').hide();
    }
}

function getPromoHtml(promo) {

    var validPromo = validateOffer(promo, false);

    if (!validPromo) {
        return '';
    }

    var text = '(';
    if (promo['minimum_order']) {
        text += 'Min Order Value: ' + promo['minimum_order'];
    }
    if (promo['max_discount'] && promo['max_discount'] > 0) {
        text += ' Max Discount: ' + promo['max_discount'];
    }
    if (promo['promo_code']) {
        text += ' Promo Code: ' + promo['promo_code'];
    }
    text += ')';
    return ('<div class="d-flex mt-3">' +
        '<input type="radio" name="offer-id" value="' + promo.id + '" ' +
        (selectedPromo && selectedPromo.id == promo['id'] ? 'checked=true' : '') +
        ' onclick="offerSelected(' + promo.id + ')" />' +
        '<p class="smallText flex-grow-1 mb-0 m-r-5 m-l-10 text-capitalize">' + promo['discount_name'] + '</p>' +
        // '<a href="#" onclick="editAddress(event, ' + i + ')">Edit</a>' +
        '</div>' +
        (text.length > 2 ? '<p class="smallText ml-4">' + text + '</p>' : ''));
}

function applyPromoCode(enteredCode) {
    $('.promo-error').hide();

    if (expiredPromos.indexOf(enteredCode.toUpperCase()) > -1) {
        $('.promo-error').text(errorMsgs['expiredCode']).show();
        return false;
    }

    if (expiredPromos.indexOf(enteredCode.toLowerCase()) > -1) {
        $('.promo-error').text(errorMsgs['expiredCode']).show();
        return false;
    }

    if (promos.length == 0) {
        $('.promo-error').text(errorMsgs['invalidCode']).show();
        return false;
    }
    for (var i = 0; i < promos.length; i++) {
        var promo = promos[i];
        if (promo.promo_code.toLowerCase() == enteredCode.toLowerCase()) {
            promoCode = enteredCode;
            // selectedPromo = promo;

            // promoCon.find('.formValidMsg').fadeOut();
            if ((promo.medium == 'ALL' || promo.medium == 'NON-MANUAL' || promo.medium.toLowerCase() == device)) {
                validateOffer(promo, true);
            }
            var status = applyOffer(true);
            if (status) {
                $('.promoCon').toggle();
                $('.codeApplied').toggle();
                $('.codeApplied .promoText').text(enteredCode);
                $('.promo-error').hide();
            }
            break;
        } else {
            $('.promo-error').text(errorMsgs['invalidCode']).show();
            // promoCon.find('.formValidMsg').fadeIn();
        }
    }
}

function offerSelected(id) {
    for (var i = 0; i < promos.length; i++) {
        var promo = promos[i];
        if (promo.id == id) {
            if (promo.promo_code != '') {
                applyPromoCode(promo.promo_code);
            } else {
                validateOffer(promo, true);
                applyOffer(true);
            }
            break;
        }
    }
}

function validateOffer(promo, showErrors) {
    resetPromo();
    var valid_from = parseInt(promo.valid_from) * 1000,
        valid_to = parseInt(promo.valid_to) * 1000,
        offer_day = parseInt(promo.offer_day),
        validOffer = false,
        msg = '';

    var dd = deliveryDate.split('-'),
        del_date = new Date(dd[0], dd[1] - 1, dd[2]);
    var del_time = del_date.getTime(),
        del_day = del_date.getDay() + 1;

    if (valid_from <= del_time && valid_to >= del_time) {
        validOffer = true;
    } else {
        msg = "Offer is applicable for Orders with delivery date between " + formatDate(valid_from) + " and " + formatDate(valid_to);
    }
    if (validOffer) {
        if (offer_day > 0) {
            if (offer_day == del_day) {
                validOffer = true;
            } else {
                msg = "Offer is applicable only if delivery is on " + weekDayNames[offer_day - 1];
                validOffer = false;
            }
        }
    }
    for (var i = 0; i < availed_offers.length; i++) {
        var offer = availed_offers[i];
        if (offer.offer_id == promo.id && promo.frequency > 0 && offer.count >= promo.frequency) {
            validOffer = false;
            msg = "You have already Availed this offer";
        }
    }
    if (promo.delivery_type == 'scheduled') {
        if (deliveryType == 1 || (deliveryType == 2 && !(del_date >= today))) {
            validOffer = false;
            msg = "Offer is applicable only on Scheduled delivery orders with delivery date different from current day";
        }
    }

    console.log(del_day, validOffer);

    if (validOffer) {
        if (promo.type == 'delivery' || promo.type == 'discount' || promo.type == 'product') {
            selectedPromo = promo;
        }
    } else if (showErrors) {
        $('.promo-error').text(msg).show();
    }

    return validOffer;
}

function formatDate(timestamp) {
    var dt = new Date(timestamp);

    return (dt.getDate() + '-' + (dt.getMonth() + 1) + '-' + dt.getFullYear());
}

function applyDeliveryDiscount(promo) {
    // selectedPromo = promo;
    discountAmount = parseInt(promo.discount_amount || 0);
    $('.del-charge').text(deliveryCharge.toFixed(1));
}

function applyCartDiscount(promo) {
    // selectedPromo = promo;
    var percentage = parseInt(promo.discount_percentage || 0),
        discount = parseInt(promo.discount_amount || 0);
    minOrderValue = (parseInt(promo.minimum_order) || 0);
    if (percentage && percentage > 0) {
        discountPercentage = percentage;
    } else {
        if (discount && discount > 0) {
            discountAmount = discount;
        }
    }
}

function applyProductOffer(promo) {
    freeProduct = promo.free_product;
    freeQty = promo.free_qty;
    $('.product-offer').show();
    console.log(promo.free_product_config);
    var config = JSON.parse(selectedPromo.config)
    $('.product-offer p').text('You got ' + freeQty + ' ' + config.unit_type + '(s) of ' + promo.free_product_name + ' Free');
}

function applyOffer(showErrors) {
    if (selectedPromo.type == 'delivery') {
        applyDeliveryDiscount(selectedPromo);
    }
    if (selectedPromo.type == 'discount') {
        applyCartDiscount(selectedPromo);
    }
    if (selectedPromo.type == 'product') {
        applyProductOffer(selectedPromo);
    } else {
        $('.product-offer').hide();
    }

    var discountedCartValue = 0, discount = 0,
        isValidOffer = true,
        maxDiscount = parseInt(selectedPromo.max_discount || 0);

    if (cartTotal >= minOrderValue) {
        if (discountAmount) {
            discount = discountAmount;
        } else if (discountPercentage) {
            discount = Math.floor((cartTotal * discountPercentage) / 100);
        }
    } else {
        if (showErrors) {
            $('.promo-error').text(errorMsgs['minOrderValue'] + minOrderValue).show();
        }
        isValidOffer = false;
    }

    if (maxDiscount > 0 && discount > maxDiscount) {
        discount = maxDiscount;
    }
    discountedCartValue = (cartTotal - discount);

    console.log(discount, discountAmount, discountPercentage, maxDiscount, minOrderValue);

    if (isMobile) {
        $('.cartTotal .amount').text((discountedCartValue + deliveryCharge).toFixed(1));
    } else {
        $('.cart-total').text((discountedCartValue + deliveryCharge).toFixed(1)).show();
    }

    if (discount) {
        $('.discount').text(discount.toFixed(1));
        $('.discount-block').addClass('d-flex');
    } else {
        $('.discount-block').removeClass('d-flex');
    }

    if (!selectedPromo) {
        isValidOffer = false;
    }

    if (isValidOffer) {
        $('.promo-error').hide();
    }

    return isValidOffer;
}

function getCartDetails() {
    var tempOrderId = window.localStorage.getItem("tempOrderId");
    if (tempOrderId != '' && tempOrderId != null) {
        showLoader();
        $.ajax({
            type: "GET",
            url: apiPath + "?cartdetails=1&temp_order_id=" + tempOrderId,
            //url: "https://alpha.onlymeat.in/admin/api.php?cartdetails=1&temp_order_id=M-4XW7EM",
            success: function (response) {
                if (response.result == 'success') {
                    cartTotal = response.cartvalue;
                    if (!isMobile) {
                        if (cartTotal < 75) {
                            $('.minCartScreen').removeClass('d-none');
                            $('.leftScreen').addClass('d-none');
                            // $('.cartScreen').addClass('justify-content-center');
                            // $('.minCartDialog').modal('show');
                        } else {
                            $('.minCartScreen').addClass('d-none');
                            $('.leftScreen').removeClass('d-none');
                        }
                    }
                    if (response.productlist && response.productlist.length > 0) {
                        $('.cart-number').text(response.productlist.length).addClass('cartCount');
                        var html = '', delivery_type = '';
                        cartItemsCount = response.productlist.length;
                        // var cartValue = response.cartvalue;
                        applyOffer();
                        // console.log(cartValue, discountedCartValue, discount, deliveryCharge);

                        if (!isMobile) {
                            for (var i = 0; i < response.productlist.length; i++) {
                                var product = response.productlist[i];
                                if (product.delivery_type == 'scheduled') {
                                    delivery_type = product.delivery_type;
                                }
                                html += '<div class="orderSummary d-flex align-items-center flex-row flex-wrap divider-b" id="product' + product.p_code + '">' +
                                    '<div class="list col-6 pl-0">' +
                                    '<span>' + product.p_name + '</span>' +
                                    '</div>' +
                                    '<div class="list col-4 px-0">' +
                                    '<div class="d-flex align-items-center primaryTextColor">' +
                                    '<i class="material-icons icon-minus d-flex pointer" onclick="updateQty(' + product.p_code + ', ' + product.p_qty + ', \'minus\', ' + product.increment_qty + ', ' + product.base_qty + ', \'' + product.unit_type + '\', ' + product.max_qty + ')"></i>' +
                                    '<span class="smallText qty-text text-center p-r-10 p-l-10">' + product.p_qty + (product.unit_type == 'kg' ? ' Kg' : '') + '</span>' +
                                    '<i class="material-icons icon-plus d-flex pointer" onclick="updateQty(' + product.p_code + ', ' + product.p_qty + ', \'plus\', ' + product.increment_qty + ', ' + product.base_qty + ', \'' + product.unit_type + '\', ' + product.max_qty + ')"></i>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="list col-2 pl-0 text-right">' +
                                    '<span><span class="rupee">&#x20B9</span> ' + product.p_cost.toFixed(1) + '</span>' +
                                    '</div>' +
                                    '</div>';
                            }
                            $('.cart-items').html(html);
                            // $('.cart-total').text((discountedCartValue + deliveryCharge).toFixed(1)).show();
                            $('.billInfo').show();
                        } else {
                            for (var i = 0; i < response.productlist.length; i++) {
                                var product = response.productlist[i];
                                if (product.delivery_type == 'scheduled') {
                                    delivery_type = product.delivery_type;
                                }
                                var image = '/assets/placeholder.png';
                                if (product.p_image) {
                                    var splitPaths = product.p_image.split('/');
                                    image = imageBaseUrl + 'products/' + splitPaths[splitPaths.length - 1];
                                }
                                html += '<div class="card cartCard p-0 bg-white m-b-5">' +
                                    '<div class="cartInfo d-flex flex-row divider-b flex-column">' +
                                    '<div class="d-flex align-items-center">' +
                                    '<figure class="p-10 pb-0">' +
                                    '<img class="card-img-top" src="' + image + '" alt="' + product.p_name + '">' +
                                    '</figure>' +
                                    '<div class="card-body flex-grow-1 bg-transparent">' +
                                    '<h5 class="card-title d-flex flex-column p-r-10 m-b-5">' +
                                    '<span class="m-b-5">' + product.p_name + '</span>' +
                                    // '<span class="rate">Net weight: '+ (product.p_qty * 1000) +' grms</span>'+
                                    // '<!-- <span class="p-r-5 smallText">Price: &#x20B9; '+ product.p_cost +'</span> -->'+
                                    '</h5>' +
                                    '<div class="card-text d-flex align-items-center m-b-25">' +
                                    '<span class="p-r-5 smallText">Price per ' + product.unit_type.toUpperCase() + ': <span class="rupee">&#x20B9</span> ' + product.p_price + '</span>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="d-flex align-items-center justify-content-between qtyPrc">' +
                                    '<div class="list d-flex justify-content-between p-0">' +
                                    '<div class="d-flex align-items-center primaryTextColor">' +
                                    '<i class="material-icons icon-minus d-flex pointer" onclick="updateQty(' + product.p_code + ', ' + product.p_qty + ', \'minus\', ' + product.increment_qty + ', ' + product.base_qty + ', \'' + product.unit_type + '\', ' + product.max_qty + ')"></i>' +
                                    '<span class="smallText p-r-10 p-l-10 text-center">' + product.p_qty + (product.unit_type == 'kg' ? ' Kg' : '') + '</span>' +
                                    '<i class="material-icons icon-plus d-flex pointer" onclick="updateQty(' + product.p_code + ', ' + product.p_qty + ', \'plus\', ' + product.increment_qty + ', ' + product.base_qty + ', \'' + product.unit_type + '\', ' + product.max_qty + ')"></i>' +
                                    '</div>' +

                                    '</div>' +
                                    '<div class="list col-4 pr-0 t-right">' +
                                    '<span><span class="rupee">&#x20B9</span> ' + product.p_cost.toFixed(1) + '</span>' +
                                    '</div>' +
                                    '<div class="list actionBtns p-0 t-center p-absolute">' +
                                    '<button type="button" class="btn primaryBtnInverse p-0 l-h-1 removeCartList" onclick="removeItem(' + product.p_code + ')"><i class="material-icons icon-trash-bin d-flex"></i></button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>';
                            }
                            $('.mob-cart-items').html(html);
                            // $('.cartTotal .amount').text((discountedCartValue + deliveryCharge).toFixed(1));
                            $('.charges-con').show();
                        }

                        $('.cart-value').text(cartTotal.toFixed(1));

                        if (delivery_type == 'scheduled') {
                            $('[data-deliver=1]').attr('disabled', 'disabled');
                            $('.del-warn-msg').removeClass('d-none');
                            deliveryTypeChanged(2);
                        }
                    } else {
                        handleEmptyCart();
                    }
                } else {
                    handleEmptyCart();
                }
                hideLoader();
            },
            error: function (response) {
                console.log('Error occurred', response);
                hideLoader();
            }
        });
    } else {
        handleEmptyCart();
    }

    // $('#totcost').text(cartcost);
}

function handleEmptyCart() {
    $('.cart-number').text('').removeClass('cartCount');
    $('.cart-total, .cartTotal .amount').text('0');
    $('.billInfo, .charges-con').hide();
    $('.cart-items, .mob-cart-items').html('<div class="text-center p-5">No Items in your Cart</div>');
}

function getAvailedOffers() {
    // $('.cart-total').hide();
    var user = window.localStorage.getItem("user");
    user = JSON.parse(user);
    if (user) {
        // showLoader();
        $.ajax({
            type: "GET",
            url: apiPath,
            data: "availed_offers=1&username=" + (user.mobile || user.email),
            success: function (response) {
                if (response.result == 'success') {
                    // console.log(response);
                    availed_offers = response.availed_offers;
                    if (selectedPromo) {
                        validateOffer(selectedPromo, true);
                        applyOffer(false);
                    }
                }
            },
            error: function (response) {
                console.log('Error occurred', response);
            }
        });
    }
}

function getUserAddresses() {
    // $('.cart-total').hide();
    var user = window.localStorage.getItem("user");
    user = JSON.parse(user);
    if (user) {
        showLoader();
        $.ajax({
            type: "POST",
            url: apiPath,
            data: "address_list=1&username=" + (user.mobile || user.email),
            success: function (response) {
                if (response.result == 'success') {
                    // console.log(response);
                    // address_list = response.address_list;
                    if (response.address_list && response.address_list.length > 0) {
                        updateAddresses(response.address_list);
                        $('[name=deliveryAddress]:first').prop('checked', true);
                        selectedAddress = address_list[0];
                    } else {
                        // handle no addresses
                    }
                } else {
                    // handle no addresses
                }
                hideLoader();
            },
            error: function (response) {
                console.log('Error occurred', response);
                hideLoader();
            }
        });
    }
}

function updateAddresses(list) {
    if (typeof list == "string") {
        return;
    }
    address_list = list;
    var html = '';
    for (var i = 0; i < address_list.length; i++) {
        var address = address_list[i];
        html += '<div class="d-flex">' +
            '<input type="radio" name="deliveryAddress" value="' + address.address_id + '"/>' +
            '<p class="smallText flex-grow-1 m-b-0 m-r-5 m-l-10 text-capitalize">' + address.addr1 + ', ' + ' ' + address.landmark + ' ' + address.area + ' ' + address.city + '</p>' +
            '<a href="#" onclick="editAddress(event, ' + i + ')">Edit</a>' +
            '</div>';
    }

    $('.deliveryInfo').html(html);
}


function saveAddress() {
    var user = window.localStorage.getItem('user');
    user = JSON.parse(user);

    if (user && (user.mobile || user.email)) {
        var username = (user.mobile || user.email);
        var city = $('#formCity').val().trim(),
            // postalCode = $('#formPostal').val().trim(),
            address1 = $('#address1').val().trim(),
            // address2 = $('#address2').val().trim(),
            landmark = $('#landmark').val().trim(),
            area = $('#area').val().trim();
        var formValid = true;
        var addressid = $('.addressid').val();

        if (city.length == 0) {
            $('.city .form-error').text('Please enter City');
            formValid = false;
        }
        /*if (postalCode.length == 0) {
            $('.postal .form-error').text('Please enter Postal Code');
            formValid = false;
        }*/
        if (address1.length == 0) {
            $('.address1 .form-error').text('Please enter Address1');
            formValid = false;
        }
        if (landmark.length == 0) {
            $('.landmark .form-error').text('Please enter Landmark');
            formValid = false;
        }
        if (area.length == 0) {
            $('.area .form-error').text('Please enter Area');
            formValid = false;
        }

        if (!formValid) {
            return;
        }

        $('.form-error').text('');
        showLoader();

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
            // "&add2=" + (address2 || "");
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
            success: function (resp) {
                console.log('Address update response is ', resp);
                if (resp.result === 'success') {
                    showCustomAlert('Address updated successfully');
                    $('.addAddCancelBtn').trigger('click');
                    if (resp.address_list) {
                        hideLoader();
                        updateAddresses(resp.address_list);
                    } else {
                        getUserAddresses();
                    }
                    // user = resp;
                    // window.localStorage.setItem("user", JSON.stringify(user));
                    // $('#deliveryCollapse').collapse('show');
                } else {
                    hideLoader();
                    showCustomAlert(resp.message, true);
                }
            },
            error: function (resp) {
                console.log('Address updation failed', resp);
                hideLoader();
            }
        });
    } else {
        showCustomAlert('You must be logged in to update Address', true);
    }
}

function gotoOrders() {
    window.location.href = '/profile#orders';
}
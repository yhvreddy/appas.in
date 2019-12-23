<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
| my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//main-website links

$route['products']											=	'welcome/productsList';
$route['product/:num/:any']									=	'welcome/productsList';
$route['product/:num/:any/:num/:any']						=	'welcome/productsList';
$route['product/:num/:any/details']							=	'welcome/productDetails';
$route['cart/checkout']										=	'welcome/checkOut';
$route['cart/proceedtocart']								=	'welcome/withoutlogincheck';

/*Add to cart*/
$route['product/addproduct']								=	'welcome/addToCartProduct';
$route['product/cart_count']								=	'welcome/productsCartCountlist';
$route['product/removefromcart']							=	'welcome/productRemove';
$route['product/cancelCart']								=	'welcome/CancelOrder';

$route['save/cartdata']										=	'welcome/saveCartdata';

$route['loginregister']										=	'welcome/loginRegister';
$route['save/registerdata']									=	'welcome/saveregisterData';
$route['accesss/userlogin']									=	'welcome/userLoginAccount';
$route['accesss/logout']									=	'welcome/logout';
$route['user/profile']					                    =	'welcome/editprofile';
$route['shopping/orders']					                =	'welcome/myOrders';

$route['user/resetpassword']                                =   'welcome/Resetpassword';

$route['user/:num/updatedetails']                             =   'welcome/UpdateuserDetails';
$route['user/:num/updatepassword']                            =   'welcome/UpdateuserPassword';

//footer links
$route['terms_cond']										=	'welcome/termsCond';
$route['returns']											=	'welcome/returnsDetails';
$route['privacy']											=	'welcome/privacyPolicy';
$route['about']												=	'welcome/about';

$route['failed']                                            =   'welcome/statusFailed';
$route['success']                                           =   'welcome/statusSuccess';

//cpanel-panel links
$route['admin']												=	'cpanel/User_page';
$route['cpanel/login']										=	'cpanel/User_page/loginPage';
$route['cpanel/login/user']									=	'cpanel/User_page/userLoginDetails';
$route['cpanel/user/register']								=	'cpanel/User_page/registerPage';
$route['cpanel/user/savenewuserdetails']					=	'cpanel/User_page/saveRegisterDetails';
$route['cpanel/dashboard']									=	'cpanel/User_page/welcomePage';
$route['cpanel/logout']										=	'cpanel/User_page/logout';

$route['cpanel/dashboard/banners']							=	'cpanel/Banners';
$route['cpanel/dashboard/banners/uplaod']					=	'cpanel/Banners/uplaodBanners';
$route['cpanel/dashboard/banners/:num/delete'] 				= 	'cpanel/Banners/deleteBanners';
$route['cpanel/dashboard/banners/:num/edit'] 				= 	'cpanel/Banners/editBanners';
$route['cpanel/dashboard/banners/saveEditdetails'] 			= 	'cpanel/Banners/saveEditdetails';

$route['cpanel/dashboard/categories']						=	'cpanel/Categories/Categories';
$route['cpanel/dashboard/savecategories']					=	'cpanel/Categories/saveCategories';
$route['cpanel/dashboard/categories/:num/delete'] 			= 	'cpanel/Categories/deleteCategories';
$route['cpanel/dashboard/categories/:num/edit'] 			= 	'cpanel/Categories/editCategories';
$route['cpanel/dashboard/categories/saveEditdetails'] 		= 	'cpanel/Categories/saveEditdetails';

$route['cpanel/dashboard/subcategories']					=	'cpanel/Categories/SubCategories';
$route['cpanel/dashboard/savesubcategories']				=	'cpanel/Categories/saveSubCategories';
$route['cpanel/dashboard/subcategories/:num/delete'] 		= 	'cpanel/Categories/deleteSubCategories';
$route['cpanel/dashboard/subcategories/:num/edit'] 			= 	'cpanel/Categories/editSubCategories';
$route['cpanel/dashboard/subcategories/saveEditsubdetails'] = 	'cpanel/Categories/saveEditSubdetails';

$route['cpanel/dashboard/addproducts']						=	'cpanel/Categories/productsAdd';
$route['cpanel/dashboard/saveproductsdetails']				=	'cpanel/Categories/productsaveDetails';
$route['cpanel/dashboard/productslist']						=	'cpanel/Categories/productsList';
$route['cpanel/dashboard/products/:num/edit']				=	'cpanel/Categories/productsEdit';
$route['cpanel/dashbaord/product/:num/:num/pricedelete']	=	'cpanel/Categories/deleteproductPricedata';
$route['cpanel/dashboard/saveeditproductsdetails']			=	'cpanel/Categories/productsaveEditDetails';
$route['cpanel/pages/subcategorieslist']					=	'cpanel/Categories/subcategoriesListAjax';
$route['cpanel/dashboard/product/:num/delete']				=	'cpanel/Categories/productDelete';

$route['cpanel/dashboard/sitedetails']                      =   'cpanel/Sitedetails/sitedetails';
$route['cpanel/dashboard/savesitedetails']					=	'cpanel/Sitedetails/saveSiteDetails';
$route['cpanel/dashboard/saveeditsitedetails']				=	'cpanel/Sitedetails/saveEditSiteDetails';

$route['cpanel/dashboard/reviews']							=	'cpanel/Reviews';
$route['cpanel/dashboard/review/:num/:any']					=	'cpanel/Reviews/publishReview';
$route['cpanel/dashboard/orderslist']                       =   'cpanel/Orders';
$route['cpanel/dashboard/userslist']                        =   'cpanel/User_page/registerUsersList';

$route['orders/:num/:num/updatestatus']                     =   'cpanel/Orders/updateOrderStatus';
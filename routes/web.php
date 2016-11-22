<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::resource('/','ProductController@index');

Route::get('/redir', ['as'=>'redirole', 'uses'=>'RedirectController@redirectRoles']);
Route::get('/testroute', ['as'=>'testroute', function(){
	return view('test');
}])->middleware('auth');

Auth::routes();


// Search routes
Route::get('/search', ['as'=>'search','uses'=>'SearchController@keySearch']);
Route::get('/getq',['as'=>'getq', 'uses'=>'SearchController@getqauto']);
Route::get('/bycategory/{cat}',['as'=>'bycategory', 'uses'=>'SearchController@categorizedSearch']);
Route::get('/bybrand/{bnd}',['as'=>'bybrand', 'uses'=>'SearchController@brandedSearch']);
Route::get('/byNameAsc/',['as'=>'sortaz', 'uses'=>'SearchController@sortAZ']);
Route::get('/byNameDesc/',['as'=>'sortza', 'uses'=>'SearchController@sortZA']);
Route::get('/byPriceHL/',['as'=>'sorthl', 'uses'=>'SearchController@sortPriceHL']);
Route::get('/byPriceLH/',['as'=>'sortlh', 'uses'=>'SearchController@sortPriceLH']);
Route::get('/sortedCategory/',['as'=>'catSortSearched', 'uses'=>'SearchController@catSortSearched']);
Route::get('/sortedBrand/',['as'=>'bndSortSearched', 'uses'=>'SearchController@bndSortSearched']);
Route::get('/onsale/',['as'=>'onsale', 'uses'=>'SearchController@saleSearch']);
// Search routes

Route::get('/detail/{id}',['as'=>'product.detail', 'uses'=>'ProductController@detail']);


Route::get('register/verify/{confirmationCode}', ['as' => 'verify.confcode','uses' => 'AccountVerificationController@confirm'])->middleware('auth');
Route::get('/register/sendcode', ['as' => 'verify.sendcode','uses' => 'AccountVerificationController@sendmail'])->middleware('auth');



// Route::get('/admin', function(){
// 	return view('admin.index');
// })->middleware('auth');


// Route::group(['middleware' => ['web','auth','ckeckrole']], function () {
//     //
//     Route::resource('admin/users','AdminUsersController@index');

// });


Route::get('/addtocart/{id}',['uses'=>'ProductController@addToCart','as' =>'cart.add']);

   
Route::group(['middleware'=>['subscriber']], function(){
	

// cart

// Route::resource('/basketcart','ProductController');
   
// });




Route::get('/receipt',[
    'uses'=>'ProductController@getReceipt',
    'as'=>'receipt'
]);


Route::get('/showcart',[
    'uses'=>'ProductController@getCart',
    'as'=>'cart.show',
    'middleware'=>'auth'

]);

Route::get('checkout',[
    'uses'=>'ProductController@getCheckout',
    'as'=>'checkout',
    'middleware'=>'auth'

]);

Route::get('shipping',[
    'uses'=>'AdvanceUser@index',
    'as'=>'shipping',
    'middleware'=>'auth'

]);

Route::get('shippingupdate',[
    'uses'=>'AdvanceUser@update',
    'as'=>'shipping',
    'middleware'=>'auth'

]);


Route::post('pay',[
    'uses'=>'ProductController@postCheckout',
    'as'=>'pay',
    'middleware'=>'auth'
]);

Route::post('AU',[
    'uses'=>'AdvanceUser@create',
    'as'=>'AU',
    'middleware'=>'auth'
]);






//cart



   Route::post('/addfeedback/{id}',['as'=>'feedback.add','uses'=>'FeedbackController@addfeedback']);
   Route::delete('/deletefeedback/{id}',['as'=>'feedback.delete','uses'=>'FeedbackController@deletefeedback']);



// AdvancedUserInfo
   Route::get('/usersinfo' ,['as'=>'users.info','uses'=>'UserInfoController@usersInfoView']);
   Route::get('/usersinfocreate' ,['as'=>'users.info.create','uses'=>'UserInfoController@usersInfoCreate']);
   Route::post('/usersinfostore' ,['as'=>'users.info.store','uses'=>'UserInfoController@usersInfoStore']);
   
   Route::get('/changepassword' ,['as'=>'password.change','uses'=>'UserInfoController@changePasswordView']);
   Route::post('/passwordupdate' ,['as'=>'password.update','uses'=>'UserInfoController@changePassword']);

// AdvancedUserInfo
});


Route::group(['middleware'=>'manager'],function(){
	
	Route::get('/manager', ['as'=>'manager.index', 'uses'=>'ManagerDashboardController@managerView']);

	Route::resource('/products', 'AddProductsController');

	Route::resource('/categories', 'AddCategoriesController');
	
	Route::resource('/brands', 'AddBrandsController');


	Route::resource('/sales', 'SalesController');
	Route::get('/previous-sales', ['as' => 'sales.previous','uses' => 'SalesController@showPrevious']);
	Route::get('/add/{id}/sale', ['as' => 'sales.add.product','uses' => 'SalesController@addSaleProduct']);
	Route::post('/attach/{sid}', ['as' => 'sales.attach','uses' => 'SalesController@attachProduct']);
	Route::delete('/detach/{sid}', ['as' => 'sales.detach','uses' => 'SalesController@detachProduct']);

});



Route::group(['middleware'=>'admin'],function(){
	Route::get('/admin', ['as'=>'admin.index', 'uses'=>'AdminDashboardController@adminView']);

	// Route::resource('/admin/','AdminUsersController');

	Route::resource('/admin/users','AdminUsersController');

	// Route::resource('/admin/products','AddProductsController');
	
	// Route::resource('/admin/categories','AddCategoriesController');

	// Route::resource('/admin/categories','AdminCategoriesController');

	// Route::get('/home', 'HomeController@index');

});
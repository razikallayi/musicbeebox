<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([
             'prefix' => 'admin',
             'middleware' => 'admin'], function () {

		// ------------------------- admin dashboard -------------------------//

             	Route::get('/', 'DashboardController@index');
                Route::get('/dashboard','DashboardController@index');
             	Route::get('/subscriptions','DashboardController@subscriptions');

                Route::get('my-account', 'DashboardController@myAccount');
                Route::put('my-account', 'DashboardController@updateAccount');

		// -------------------------- upload videos --------------------------- //

             	// Route::get('/upload-video','VideoController@addVideos');
             	// Route::post('/upload-video','VideoController@uploadVideos');
             	// Route::get('/manage-video','VideoController@manageVideo');
             	// Route::get('/edit-video/{id}','VideoController@editVideo');
             	// Route::put('/update-video/{id}','VideoController@updateVideo');
             	// Route::delete('/delete-video/{id}','VideoController@deleteVideo');

		// ------------------------- manage users ----------------------------- //

             	// Route::get('/manage-users','UserController@manageUsers');
             	// Route::get('/edit-user/{id}','UserController@editUser');
             	// Route::put('/update-user/{id}','UserController@updateUser');
             	// Route::delete('/delete-user/{id}','UserController@deleteUser');


		// -------------------------- send newsletter ------------------------------- //
        // Route::get('/send-newsletter/{token}','UserController@sendNewsletter');
 });

Route::get('/','MasterController@index');
Route::get('/about-us','MasterController@about_us');
Route::get('/terms','MasterController@terms');
Route::get('/contact-us','MasterController@contact_us');
// Route::get('/user-videos','MasterController@userVideo');

// ---------------------- subscription ------------------------------- //

// Route::get('/subscribe','MasterController@subscriptionForm');
// Route::get('/subscribe','UserController@subscriptionForm');
// Route::post('/subscribe','UserController@subscribe');
// Route::get('/signout','UserController@sign_out');
// Route::get('/confirm-subscription/{token}','UserController@confirmSubscription');
// Route::get('/unsubscribe/{token}','UserController@unSubscribe');

// Route::get('/create-credentials/{token}','UserController@createCredentials');
// Route::post('/save-credentials','UserController@saveCredentials');



// Route::get('/foo', function () {
// 	$exitCode = Artisan::call('MonthlySubscription:email', [
// 	                          'user' => 1, '--queue' => 'default'
// 	                          ]);

//     //
// });



// Login Routes...
    Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

// Registration Routes...
    Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
    Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

// Password Reset Routes...
    Route::get('password/reset', ['as' => 'password.reset', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset/{token}', ['as' => 'password.reset.token', 'uses' => 'Auth\ResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'password.reset.post', 'uses' => 'Auth\ResetPasswordController@reset']);

    Route::get('paypal/done', ['as' => 'paypal.done', 'uses' => 'SubscriptionController@getDone']);
    Route::get('paypal/cancel', ['as' => 'paypal.cancel', 'uses' => 'SubscriptionController@getCancel']);

    Route::get('/subscribe','SubscriptionController@showSubscriptionForm');
    Route::post('/subscribe','SubscriptionController@subscribe');

Route::group(['prefix' => 'user',
             'middleware' => ['is_payed']], function () {
	Route::get('/', 'UserController@showDashboard');
	Route::get('/dashboard', 'UserController@showDashboard');
	// Route::get('/videos/{id?}', 'UserController@showVideos');
    // Route::get('/upgrade/{id?}', 'UserController@upgradePlan');
    Route::get('/subscribe', 'UserController@showSubscribeForm');
    Route::get('/subscriptions','SubscriptionController@showSubscriptions');

});

Route::group(['prefix' => 'admin'], function () {
	Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
	Route::post('/login', 'AdminAuth\LoginController@login');
	Route::post('/logout', 'AdminAuth\LoginController@logout');

	Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
	Route::post('/register', 'AdminAuth\RegisterController@register');

	Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
	Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
	Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
	Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

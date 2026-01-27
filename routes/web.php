<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\LoginController;
use Mail;
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

// api login test
Route::get('api-login', function(){
  return view('auth.api-login');
});

Route::get('/', function () {
	return view('home');
})->name('home');
Route::get('/login', function()
{
	if (Auth::check()) {
		return redirect()->route('dashboard');
	}
	return view('login');
})->name('auth.login');
Route::post('/login', [LoginController::class, 'loginPost'])->name('login.post');

// Language switching route
Route::get('/language/{locale}', function($locale) {
    if (in_array($locale, ['en', 'bn'])) {
        // Set the locale in session
        session(['locale' => $locale]);
        
        // Set the application locale
        app()->setLocale($locale);
        
        // Store in cookie for persistence
        cookie()->queue('locale', $locale, 60 * 24 * 365); // 1 year
        
        // Log the language change for debugging
        \Illuminate\Support\Facades\Log::info('Language changed', [
            'from' => session('locale'),
            'to' => $locale,
            'user_agent' => request()->userAgent()
        ]);
        
        // Force redirect to dashboard to ensure the new locale is applied
        if (Auth::check()) {
            return redirect()->route('dashboard')->with('language_changed', $locale);
        }
    }
    
    // Redirect back to the previous page
    return redirect()->back()->with('language_changed', $locale);
})->name('language.switch');

// Test route to check if routing is working
Route::get('/test-language', function() {
    return response()->json([
        'current_locale' => app()->getLocale(),
        'session_locale' => session('locale'),
        'available_locales' => ['en', 'bn']
    ]);
});

// About page route
Route::get('/about', function() {
    return view('about');
})->name('about');

// Contact page route
Route::get('/contact', function() {
    return view('contact');
})->name('contact');

// Pricing page route
Route::get('/pricing', function() {
    return view('pricing');
})->name('pricing');

Route::get('/signup', 'HomeCtrl@signup');

Route::middleware(['auth'])->group(function()
{
	Route::get('/dashboard', 'HomeCtrl@index')->name('dashboard');
	Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

  //======================= CASTOM ROUTE ====================
	Route::get('/user/delete/{id}','UserCtrl@destroy')->name('user.delete');
	Route::get('/category/delete/{id}','CategoryCtrl@destroy')->name('category.delete');
	Route::get('/sub_category/delete/{id}','SubCategoryCtrl@destroy')->name('sub_category.delete');
	Route::get('/vendor/delete/{id}','SupplierCtrl@destroy')->name('vendor.delete');
	Route::get('/product/delete/{id}','ProductCtrl@destroy')->name('product.delete');
	Route::get('/customer/delete/{id}','CustomerCtrl@destroy')->name('customer.delete');


	Route::get('/payment/{id}/get', 'PaymentCtrl@getPayment')->name('get.payment');
	Route::get('/payment/{id}/index', 'PaymentCtrl@index')->name('index.payment');
	Route::get('/payment/{id}/read', 'PaymentCtrl@show')->name('show.payment');
	Route::get('/payment/{id}/delete','PaymentCtrl@destroy')->name('payment.delete');

	//password change
	Route::get('/change_password', 'UserCtrl@changePassword')->name('user.password.change');
	Route::put('/change_password', 'UserCtrl@updatePassword')->name('user.change.password');

	//========================== CASTOM ROUTE END  ===================
	
	//user routes
	Route::resource('/user', 'UserCtrl');
	Route::resource('/category', 'CategoryCtrl');
	Route::resource('/brand', 'BrandCtrl');

	Route::resource('/sub_category', 'SubCategoryCtrl');
	Route::get('/get_sub_cats/{catid}', 'SubCategoryCtrl@subCats');

	Route::resource('/purchase', 'PurchaseCtrl');
	Route::resource('/product', 'ProductCtrl');
	Route::resource('/vendor', 'SupplierCtrl');
	Route::resource('/customer', 'CustomerCtrl');

  Route::controller(UnitCtrl::class)->group(function(){
    Route::get('/units/get-unit', 'getUnits')->name('unit.get-unit');
  });

  Route::controller(ProductUnitCtrl::class)->group(function(){
    Route::get('/product-units/get-product-unit/{p?}/{u?}', 'getUnitPrice')->name('product-unit.get-unit');
    Route::post('/product-unit-convert', 'unitConverter')->name('product-unit.convert');
  });

  Route::controller(CustomerCtrl::class)->group(function(){
    Route::get('/customers/get-customer/{mobile}', 'getCustomer')->name('customer.get-customer');
  });
	
	Route::post('/search/customer', 'CustomerCtrl@searchCustomer')->name('customer.search');
	Route::resource('/sale', 'SaleCtrl');
  Route::controller(SaleCtrl::class)->group(function()
  {
    // Route::get('/sale/{customer}/product', 'SaleCtrl@saleProduct');
    Route::get('/sale/{id}/print', 'print');
    Route::get('/sale/delete/{id}','destroy')->name('sale.delete');
    Route::get('/search/orders/{value}', 'search');
    Route::get('/sale/{type}/{view}', 'viewSalesByType');
  });

  Route::resource('/sale-return', 'SaleReturnCtrl');
  Route::controller(SaleReturnCtrl::class)->group(function()
  {
    Route::get('/get-sale/{id}', 'getSale')->name('sale-return.get-sale');
  });

  Route::controller(ProductCtrl::class)->group(function()
  {
    Route::get('/products/get-product/{name?}', 'getProducts')->name('product.get.name');
  });

  Route::controller(ProductUnitCtrl::class)->group(function()
  {
    Route::get('/products/get-product-unit/{id?}', 'getUnit')->name('product.get-unit');
  });

	Route::get('/sale/print/{id}/change', 'SaleCtrl@changePrintStatus');

	//payments
	Route::resource('/payment', 'PaymentCtrl');
	Route::get('/payment/{type}/view', 'PaymentCtrl@getPaymentByType');

	//return order
	Route::resource('/return', 'OrderReturnCtrl');
	Route::get('/return/{id}/order', 'OrderReturnCtrl@getReturn');
	Route::post('/return', 'OrderReturnCtrl@storeReturn')->name('return.store');
	Route::get('/return/{id}/delete', 'OrderReturnCtrl@delete');	
	
});

// cache clear
Route::get('reboot', function () {
  Artisan::call('cache:clear');
  Artisan::call('view:clear');
  Artisan::call('route:clear');
  Artisan::call('config:cache');
  Artisan::call('view:cache');
  dd('Done');
});
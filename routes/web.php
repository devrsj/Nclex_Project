<?php
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\Front\AppointmentController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\LocalizationController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\EmailController;


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


Auth::routes(['register' =>false]);
Auth::routes(['verify' => true]);
Route::get('/user/login',[LoginController::class,'login_page']);

//normal user routes
Route::group(['prefix' => '/'], function () {
Auth::routes();
Route::get('/', [IndexController::class,'index']);
Route::get('/userform/{name}/{email}/{number}', [IndexController::class,'userstore']);
Route::get('/answerform/{question}/{answer}/{number}', [IndexController::class,'answerform']);
Route::get('/user/register',[LoginController::class,'user_register'])->name('user.register.form');
Route::post('/user/register',[GuestController::class,'user_register'])->name('user.register'); 
Route::post('/newsletter',[AppointmentController::class,'newsletter'])->name('newsletter.store');
Route::post('/create', [IndexController::class, 'store']);
Route::post('/event',[IndexController::class,'event_store'])->name('bookingevent.store');
Route::get('/search', [IndexController::class,'search'])->name('search');
Route::get('/about/{slug}', [IndexController::class, 'readabout'])->name('readabout');    
Route::get('/{slug}', [IndexController::class,'pageslug'])->name('page.slug');
Route::get('/page/{privacy}', [IndexController::class,'privacy'])->name('page.privacy'); 
Route::get('/blog/tags/{tag}', [IndexController::class,'tags'])->name('tags.group');
Route::get('/blog/{blogslug}', [IndexController::class,'blog_detail'])->name('blog.detail');
Route::get('/event/{event}', [IndexController::class,'event_detail'])->name('event.detail');
Route::get('/blog/category/{slug}',[IndexController::class,'categorydetail'])->name('category.slug');
});





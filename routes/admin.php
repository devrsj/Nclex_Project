<?php

use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PopupQuestionController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\NotesController;
use App\Http\Controllers\Admin\NoteBookController;
use App\Http\Controllers\Admin\SubNoteController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\LoginSecurityController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\MaintenaceController;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DeliveryBoyController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\SubUnderCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\TagProductController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\Admin\FlashDealController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\ProductAttributeValueController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Front\LocalizationController;


 
// routes for admin and b2b
Route::middleware(['auth','is_admin','user_login','2fa'])->group(function () {
    Route::group(['prefix' => '/admin'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/invoice',function(){
    return view('admin.chat.invoice');
   });
    Route::get('/cs',function(){
    return view('admin.chat.contact');
   });
    Route::get('/calendar',function(){
    return view('admin.chat.calendar');
   });
    Route::get('/2fa',[LoginSecurityController::class,'show2faForm']);
    Route::post('/generateSecret',[LoginSecurityController::class,'generate2faSecret'])->name('generate2faSecret');
    Route::post('/enable2fa',[LoginSecurityController::class,'enable2fa'])->name('enable2fa');
    Route::post('/disable2fa',[LoginSecurityController::class,'disable2fa'])->name('disable2fa');
      // 2fa middleware
    Route::post('/2faVerify', function () {
      return redirect(URL()->previous());
    })->name('2faVerify');
    Route::get('/clear-cache', [LocalizationController::class,'clear_cache']);
    Route::get('/unverifyusers',[NotesController::class,'unverify_user']);
    Route::post('/unverifyusers/{id}',[NotesController::class,'verify_user'])->name('unverfiyuser.status');   
    Route::get('/event', [HomeController::class,'event_index']);
    Route::delete('/event/delete/{id}',[HomeController::class,'event_destroy']);
    Route::get('change/lang',[LocalizationController::class,'lang_change'])->name('changeLang');
    Route::get('/weeklyproduct',[ProductController::class,'weekly']);
    Route::delete('/weeklyproduct/delete/{id}',[ProductController::class,'weekly_delete']);
    Route::get('/all/newsletter',[OrderController::class,'newsletter']);
    Route::delete('/delete/newsletter/{id}',[OrderController::class,'newsletter_destroy']);
    Route::delete('/delete/order/{id}',[OrderController::class,'cancel_order']);
    Route::get('/orderquestion/view/{id}',[OrderQuestionController::class,'view_order']);    
    Route::get('/product/review/', [ProductController::class,'review']);
    Route::get('/mychat',[MaintenaceController::class,'chat_index']);
    Route::get('/ticket',[TicketController::class,'index']);
    Route::post('/ticket',[TicketController::class,'store'])->name('ticket.store');
    Route::get('/ticket-create',[TicketController::class,'create']);
    Route::get('/ticket-view',[TicketController::class,'view'])->name('ticket.view');
    Route::get('/mychat/{id}/',[MaintenaceController::class,'chat'])->name('vendor.chat');
    Route::get('/subclas/{id}',[NoteBookController::class,'subclass']);
    Route::get('/search_class',[NoteBookController::class,'search_class'])->name('class.search');
    Route::get('/search_note',[NoteBookController::class,'search_note'])->name('note.search');
    Route::get('/search_user',[NoteBookController::class,'search_user'])->name('user.search');
    Route::get('/editflashproduct/{findproduct}',[FlashDealController::class,'editflashproduct']);
    Route::get('/flashproduct/{findproduct}',[FlashDealController::class,'flashproduct']);
    Route::get('/locationproduct/{findproduct}',[FlashDealController::class,'findproduct']); 
    Route::get('/salesproducts', [OrderController::class,'view_sale']);
    Route::get('/products/all', [OrderController::class,'view_all']);
    Route::get('/products/pending',[OrderController::class,'pending'])->name('products.pending');
    Route::get('/products/processing',[OrderController::class,'process']);
    Route::get('/products/completed',[OrderController::class,'completed']);
    Route::get('/products/cancel',[OrderController::class,'cancel']);
    Route::get('/most_view_product',[TicketController::class,'most_view']);
    Route::get('/change-password',[ChangePasswordController::class, 'index'])->name('change.password');
    Route::post('/change-password', [ChangePasswordController::class, 'store'])->name('change.password');
    Route::get('/profile', [HomeController::class, 'show']);
    Route::get('/profilechange', [HomeController::class, 'changeprofile']);
    Route::put('/profile/update/{user}', [HomeController::class, 'updateprofile']);
    Route::post('/review/status/{id}', [ProductController::class, 'review_status']);
    Route::get('/review/show/{id}', [ProductController::class, 'review_show']);
    Route::get('/review/reply/{id}', [ProductController::class, 'review_reply']);
    Route::delete('/review/delete/{id}',[ProductController::class,'review_delete']);
    Route::post('/product/status/{id}',[ProductController::class, 'status']);
    Route::post('/country/status/{id}',[CountryController::class,'status']);     
    Route::post('/state/status/{id}',[StateController::class,'status']);
    Route::post('/city/status/{id}',[CityController::class,'status']);
    Route::post('/area/status/{id}',[AreaController::class,'status']);
    Route::post('/subundercategory/status/{id}',[SubUnderCategoryController::class,'status']);
    Route::post('/subcategory/status/{id}', [SubCategoryController::class, 'status']);
    Route::post('/category/status/{id}', [CategoryController::class, 'status']);
    Route::post('/gallerycategory/status/{id}', [GalleryCategoryController::class, 'status']);
    Route::post('/blogcategory/status/{id}', [BlogCategoryController::class, 'status']);
    Route::post('/branch/status/{id}', [BranchController::class, 'status']);
     Route::post('/meeting/{id}',[LocalizationController::class,'meeting']);
    Route::post('/site/{id}',[LocalizationController::class,'site']);
    Route::post('/coupon/status/{id}', [CouponController::class, 'status']);
    Route::post('/news/status/{id}', [NewsController::class, 'status']);
    Route::post('/page/status/{id}', [PageController::class, 'status']);
    Route::post('/maintenace/status/{id}',[MaintenaceController::class,'status']);
    Route::post('/brand/status/{id}',[BrandController::class,'status']);
    Route::post('/productattribute/status/{id}',[ProductAttributeController::class,'status']);
    Route::post('/productattributevalue/status/{id}',[ProductAttributeValueController::class,'status']);
    Route::post('/block/status/{id}',[BlockController::class,'status']);
    Route::post('/office/status/{id}',[OfficeController::class,'status']);
    Route::post('/media/status/{id}', [MediaController::class, 'status']);
    Route::post('/blog/status/{id}', [BlogController::class, 'status']);
    Route::post('/people/status/{id}', [PeopleController::class, 'status']);
    Route::get('/subcategoryid/{catgeory_id}',[SubCategoryController::class,'category_id']);
    Route::get('/lstate/{state}',[CityController::class,'cstate']);
    Route::get('/lcity/{city}',[CityController::class,'city']);
    Route::get('/subundercategoryid/{subcategory_id}',[SubCategoryController::class,'subcategory_id']);
    Route::get('/currency/exchange/{exchange}',[CurrencyController::class,'currencyexchange'])->name('currency.exchange');
    Route::get('/linkedtype/{linked_type}',[CouponController::class,'linked_type']);
    Route::get('/attribute/{attr}',[ProductAttributeController::class,'attribute']); 
    Route::get('/liveusers',[LocalizationController::class,'liveusers']);
    Route::delete('/liveusers/{id}',[LocalizationController::class,'liveusers_destroy']);
    Route::get('/search_product',[ContactController::class,'searchproduct']);
    Route::get('/search/order',[ContactController::class,'search_order']);
    Route::get('/search_seller_order',[ContactController::class,'search_seller_product']);
    Route::get('/onlinenote',[NoteBookController::class,'note']);
    Route::get('/onlineclass',[NoteBookController::class,'class']);
    Route::get('/onlinenote/{id}',[NoteBookController::class,'note_id'])->name('notecategory.index');
    Route::get('/onlineclass/{id}',[NoteBookController::class,'class_id'])->name('classcategory.index');
    Route::post('/answer/{id}',[PopupQuestionController::class,'answer_store']);
    Route::get('/zoom',[NoteController::class,'zoom'])->name('zoom.meeting');
    Route::get('/sub/onlinenote/{id}',[NoteBookController::class,'subnote_id'])->name('notesubcategory.index');
    Route::get('/sub/onlineclass/{id}',[NoteBookController::class,'subclass_id'])->name('classsubcategory.index');
    Route::get('/readmore/pdf/{id}',[NoteBookController::class,'pdf'])->name('readmore.pdf');
    Route::get('/search/service_product',[ContactController::class,'service_product']); 
    Route::get('/searchproduct',[ContactController::class,'search_variantproduct']);
    Route::get('/search_seller_product',[ContactController::class,'search_sellervariant_product']);
    Route::get('/search_order',[ContactController::class,'search_order']);
    Route::get('/order',[ContactController::class,'order_question']);
    
    Route::resources([
      'page' => PageController::class,
      'country' => CountryController::class,
      'state'=>StateController::class,
      'city' =>CityController::class,
      'category' =>CategoryController::class,
      'subcategory'=>SubcategoryController::class,
      'subundercategory' =>SubUnderCategoryController::class,
      'productcategory' =>ProductCategoryController::class,
      'product'=>ProductController::class,
      'categoryblog' =>CategoryBlogController::class,
      'media' =>MediaController::class,
      'tag'=>TagController::class,
      'blog'=>BlogController::class,
      'people'=>PeopleController::class,
      'branch'=>BranchController::class,
      'contact'=>ContactController::class,
       'roles'=>RoleController::class,
       'users'=>UserController::class,
      'permissions'=>PermissionController::class,
      'contactus'=>ContactusController::class,
      'seo'=>SeoController::class,
      'gallerycategory'=>GalleryCategoryController::class,
      'blogcategory'=>BlogCategoryController::class,
      'tagproduct'=>TagProductController::class,
      'coupon'=>CouponController::class,
      'vendor'=>VendorController::class,
      'deliveryboy'=>DeliveryBoyController::class,
      'currency'=>CurrencyController::class,
      'maintenace'=>MaintenaceController::class,
      'attribute'=>AttributeController::class,
      'productattribute'=>ProductAttributeController::class,
      'productattributevalue'=>ProductAttributeValueController::class,
      'block'=>BlockController::class,
      'brand'=>BrandController::class,
      'advertisement'=>AdvertisementController::class,
      'variant'=>VariantProductController::class,
      'office'=>OfficeController::class,
      'grade'=>GradeController::class,
      'flashdeals'=>FlashDealController::class,
      'area'=>AreaController::class,
      'setting'=>SettingController::class,
      'ticket'=>TicketController::class,
       'chat'=> ChatController::class,
       'news'=>NewsController::class,
       'class'=>NoteController::class,
       'subclass'=>SubNoteController::class,
       'classes'=>NotebookController::class,
       'popupquestion'=>PopupQuestionController::class,
       'note'=>ClassController::class,
       'notes'=>NotesController::class
  ]);
  
      Route::group(['prefix' => '/seller'], function () {
      Route::get('/category',[SellerController::class,'category'])->name('sellercategory.index');
      Route::get('/subcategory',[SellerController::class,'subcategory'])->name('sellersubcategory.index');
      Route::get('/subundercategory',[SellerController::class,'subundercategory'])->name('sellersubundercategory.index'); 
      Route::get('/brand',[SellerController::class,'brand'])->name('sellerproduct.brand');
      Route::get('/tagproduct',[SellerController::class,'tagproduct'])->name('sellerproduct.tagproduct');     
      Route::get('/product',[SellerController::class,'product'])->name('sellerproduct.index');
      Route::get('/productattribute',[SellerController::class,'productattribute']);
      Route::get('/productattributevalue',[SellerController::class,'productattributevalue']);
      Route::get('/flashdeals',[SellerController::class,'flashdeals']);
      Route::get('/weeklyproduct',[SellerController::class,'weeklyproduct']);
      Route::get('/product/review',[SellerController::class,'productreview']);
      Route::get('/product/review',[SellerController::class,'productreview']);
      Route::get('/products/pending',[SellerController::class,'pending']);
      Route::get('/products/processing',[SellerController::class,'processing']);
      Route::get('/products/completed',[SellerController::class,'completed']);
      Route::get('/products/cancel',[SellerController::class,'cancel']);
      Route::get('/products/all',[SellerController::class,'all']);
      Route::get('/most_view_product',[SellerController::class,'most_view_product']);
      Route::get('/salesproducts',[SellerController::class,'sales']);
    });
});

// end of route group for admin
// start of auth user Route
Route::get('/profile',[IndexController::class,'profile'])->name('user.profile');
Route::post('/profile/update',[IndexController::class,'profileUpdate'])->name('user.profile.update');
Route::post('/profile/password',[IndexController::class,'changePassword'])->name('user.profile.changePassword');
// end of auth user route
});

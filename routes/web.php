<?php

use Illuminate\Support\Facades\Route;

// Front Routes
Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index'])->name('home');
Route::get('/product_detail/{id}',[\App\Http\Controllers\Front\FrontProductController::class,'productDetail'])->name('product.detail');
Route::post('/store_user_comment',[\App\Http\Controllers\Admin\CommentController::class,'storeComment'])->name('store.user.comment');
Route::post('/store/card/{id}',[\App\Http\Controllers\Front\CartController::class,'storeToCart']);
Route::post('/remove/card/{id}',[\App\Http\Controllers\Front\CartController::class,'removeFromCart']);
Route::get('/shipping_payment',[\App\Http\Controllers\Admin\PaymentController::class,'showPayment'])->name('show.payment');
Route::post('/store/payment',[\App\Http\Controllers\Admin\PaymentController::class,'savePayment'])->name('save.payment');
Route::get('/payment/callback',[\App\Http\Controllers\Admin\PaymentController::class,'callback']);
Route::post('/add_user_address',[\App\Http\Controllers\Front\AddressController::class,'addUserAddress'])->name('add.user.address');
Route::get('/blog',[\App\Http\Controllers\Front\BlogController::class,'index'])->name('blog.list');
Route::get('/blog_details/{id}',[\App\Http\Controllers\Front\BlogController::class,'article'])->name('blog.article.details');
Route::get('/serach_product',[\App\Http\Controllers\Admin\ProductController::class,'searchProduct'])->name('search.product');
Route::get('/get_url',[\App\Http\Controllers\Admin\ProductController::class,'getUrl'])->name('get.url');
// Admin Routes
Route::prefix('admin')->middleware(['auth:sanctum', 'verified','admin'])->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\PanelController::class,'index'])->name('admin.dashboard');
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/brands',\App\Http\Controllers\Admin\BrandController::class);
    Route::resource('/products',\App\Http\Controllers\Admin\ProductController::class);
    Route::get('/create_product_gallery/{id}',[\App\Http\Controllers\Admin\GalleryController::class,'addGallery'])->name('create.product.gallery');
    Route::post('/store_product_gallery/{id}',[\App\Http\Controllers\Admin\GalleryController::class,'storeGallery'])->name('store.product.gallery');
    Route::delete('/delete_product_gallery/{id}',[\App\Http\Controllers\Admin\GalleryController::class,'deleteGallery'])->name('delete.product.gallery');
    Route::resource('/colors', \App\Http\Controllers\Admin\ColorController::class);
    Route::resource('/property_groups', \App\Http\Controllers\Admin\PropertyGroupController::class);
    Route::resource('/properties',\App\Http\Controllers\Admin\PropertyController::class);
    Route::get('/create_product_properties/{id}',[\App\Http\Controllers\Admin\ProductController::class,'createProductProperties'])->name('create.product.properties');
    Route::post('/store_product_properties/{id}',[\App\Http\Controllers\Admin\ProductController::class,'storeProductProperties'])->name('store.product.properties');
    Route::resource('users',\App\Http\Controllers\Admin\UserController::class);
    Route::get('/create_user_roles/{id}',[\App\Http\Controllers\Admin\UserController::class,'createUserRoles'])->name('create.user.roles');
    Route::post('/store_user_roles/{id}',[\App\Http\Controllers\Admin\UserController::class,'storeUserRoles'])->name('store.user.roles');
    Route::resource('/roles',\App\Http\Controllers\Admin\RoleController::class);
    Route::get('/create_role_permissions/{id}',[\App\Http\Controllers\Admin\RoleController::class,'createRolePermission'])->name('create.role.permission');
    Route::post('/store_role_permissions/{id}',[\App\Http\Controllers\Admin\RoleController::class,'storeRolePermission'])->name('store.role.permission');
    Route::resource('/permissions',\App\Http\Controllers\Admin\PermissionController::class);
    Route::get('/user_comments', [\App\Http\Controllers\Admin\CommentController::class, 'listComment'])->name('list.comment');
    Route::post('/submit_user_commnet/{id}',[\App\Http\Controllers\Admin\CommentController::class,'submitComment'])->name('submit.comment');
    Route::resource('/articles',\App\Http\Controllers\Admin\ArticleController::class);
    Route::get('/export_excel',[\App\Http\Controllers\Admin\BrandController::class,'exportExcel'])->name('export.excel');
    Route::get('/import_excel',[\App\Http\Controllers\Admin\BrandController::class,'importExcell'])->name('import.excel');
    Route::post('/insert_excel',[\App\Http\Controllers\Admin\BrandController::class,'insertExcel'])->name('insert.excel');
    Route::get('/logs', [\App\Http\Controllers\Admin\LogViewerController::class,'index'])->name('logs.index');
    Route::post('/get_checked_user', [\App\Http\Controllers\Admin\UserController::class,'checkedUser']);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

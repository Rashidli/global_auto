<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\BrendController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewBrandController;
use App\Http\Controllers\OilProductController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/rest',function (){
   \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

Route::get('/storage_link',function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
});

Route::group(['prefix' => 'admin'], function (){

    Route::get('/', [PageController::class,'login'])->name('login');
    Route::get('/register', [PageController::class,'register'])->name('register');
    Route::post('/login_submit',[AuthController::class,'login_submit'])->name('login_submit');
    Route::post('/register_submit',[AuthController::class,'register_submit'])->name('register_submit');

    Route::group(['middleware' =>'auth'], function (){

        Route::get('/home', [PageController::class,'home'])->name('home');
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');

        Route::resource('users',UserController::class);
        Route::resource('roles',RoleController::class);
        Route::resource('permissions',PermissionController::class);

        Route::resource('blogs',BlogController::class);
        Route::resource('heroes',HeroController::class);
        Route::resource('services',ServiceController::class);
        Route::resource('brands',BrandController::class);
        Route::resource('newbrands',NewBrandController::class);
        Route::resource('testimonials',TestimonialController::class);
        Route::resource('features',FeatureController::class);
        Route::resource('abouts',AboutController::class);
        Route::resource('words',WordController::class);
        Route::resource('cards',CardController::class);
        Route::resource('shops',ShopController::class);
        Route::resource('images',ImageController::class);
        Route::resource('mains',MainController::class);


        Route::get('brends/{id}', [BrendController::class, 'index'])->name('brends.index');
        Route::get('brends/create/{id}', [BrendController::class,'create'])->name('brends.create');
        Route::get('brends/{brend}/edit', [BrendController::class,'edit'])->name('brends.edit');
        Route::post('brends', [BrendController::class,'store'])->name('brends.store');
        Route::put('brends/{brend}', [BrendController::class,'update'])->name('brends.update');
        Route::delete('brends/{brend}', [BrendController::class,'destroy'])->name('brends.destroy');


        Route::get('products/{id}', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create/{id}', [ProductController::class,'create'])->name('products.create');
        Route::get('products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');
        Route::post('products', [ProductController::class,'store'])->name('products.store');
        Route::put('products/{product}', [ProductController::class,'update'])->name('products.update');
        Route::delete('products/{product}', [ProductController::class,'destroy'])->name('products.destroy');


        Route::get('oilproducts/{id}', [OilProductController::class, 'index'])->name('oilproducts.index');
        Route::get('oilproducts/create/{id}', [OilProductController::class,'create'])->name('oilproducts.create');
        Route::get('oilproducts/{oilproduct}/edit', [OilProductController::class,'edit'])->name('oilproducts.edit');
        Route::post('oilproducts', [OilProductController::class,'store'])->name('oilproducts.store');
        Route::put('oilproducts/{oilproduct}', [OilProductController::class,'update'])->name('oilproducts.update');
        Route::delete('oilproducts/{oilproduct}', [OilProductController::class,'destroy'])->name('oilproducts.destroy');


        Route::get('/contact_list', [FrontController::class,'contact_list'])->name('contact_list');
        Route::get('/apply_credit_list', [FrontController::class,'apply_credit_list'])->name('apply_credit_list');

    });

});

Route::group(['middleware' => 'lang'], function (){

    Route::get('/change-locale/{locale}', [FrontController::class, 'changeLocale'])->name('change.locale');
    Route::get('/', [FrontController::class, 'home'])->name('main_page');
    Route::get('/service_single/{service}', [FrontController::class, 'service_single'])->name('service_single');
    Route::get('/blog_single/{blog}', [FrontController::class, 'blog_single'])->name('blog_single');
    Route::get('/blogs', [FrontController::class, 'blogs'])->name('blogs');
    Route::get('/about', [FrontController::class, 'about'])->name('about');
    Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
    Route::get('/brands', [FrontController::class, 'brands'])->name('brands');
    Route::get('/shops', [FrontController::class, 'shops'])->name('shops');
    Route::get('/card_single/{card}', [FrontController::class, 'card_single'])->name('card_single');
    Route::post('/contact_form', [FrontController::class, 'contact_form'])->name('contact_form');
    Route::get('/credit_form', [FrontController::class, 'credit_form'])->name('credit_form');
    Route::post('/apply_credit', [FrontController::class, 'apply_credit'])->name('apply_credit');
    Route::get('/products/{id}', [FrontController::class,'products'])->name('brand_products');
    Route::get('/oilproducts/{id}', [FrontController::class,'oilproducts'])->name('oil_products');
    Route::get('/oilproducts/{id}', [FrontController::class,'oilproducts'])->name('oil_products');
    Route::get('/all_products', [FrontController::class,'all_products'])->name('all_products');
    Route::get('/all_brends/{id}', [FrontController::class,'all_brends'])->name('all_brends');

});

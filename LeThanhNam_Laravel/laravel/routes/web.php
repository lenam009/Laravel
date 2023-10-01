<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Project\HomeController as ProjectController;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

//use App\Http\Controllers\Api\HomeController as Home1;


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
//..........Project
Route::prefix('project')->name('project.')->group(function () {

    Route::prefix('admin')->middleware('auth.permission')->group(function () {
        Route::get('index', [ProjectController::class, 'index'])->name('index');

        //Get product theo page
        Route::get('index/page/{page}', [ProjectController::class, 'getProductByPage'])->name('getProductByPage');

        //Get product theo idType
        Route::get('index/{idTypeProduct}', [ProjectController::class, 'getProductByIdTypeProduct'])->name('getProductByIdTypeProduct');

        //Get product theo idType
        Route::get('index/{idTypeProduct}/page/{page}', [ProjectController::class, 'getProductByPageByIdTypeProduct'])->name('getProductByPageByIdTypeProduct');

        //Trang chi tiết
        Route::get('product/{idProduct}', [ProjectController::class, 'productDetail'])->name('productDetail');

        //Chức năng thêm product
        Route::get('newProduct', [ProjectController::class, 'newProduct'])->name('newProduct');

        Route::post('newProduct', [ProjectController::class, 'handleNewProduct']);

        //Chức năng xóa product
        Route::get('deleteProduct/{action}/{idProduct}', [ProjectController::class, 'deleteProduct'])->name('deleteProduct');

        //Chức năng sửa product
        Route::get('updateProduct/{idProduct}', [ProjectController::class, 'updateProduct'])->name('updateProduct');

        Route::post('updateProduct', [ProjectController::class, 'handleUpdateProduct'])->name('handleUpdate');

        //Xử lý khi người dùng mua product (nhấp nút buy)
        Route::get('handleBuyProduct/{idProduct}', [ProjectController::class, 'handleBuyProduct'])->name('handleBuyProduct');

        //Trang giỏ hàng
        Route::get('cart', [ProjectController::class, 'cart'])->name('cart');

        //Chức năng thanh toán (payment)
        Route::get('payment', [ProjectController::class, 'payment'])->name('payment');

        //Logout
        Route::get('logout', [ProjectController::class, 'logout'])->name('logout');
    });

    //Chức năng login
    Route::get('login', [ProjectController::class, 'login'])->name('login');
    Route::post('login', [ProjectController::class, 'handleLogin']);
});

<?php

use App\Http\Controllers\PageController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cart;
use App\Models\Product;

//import admin
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\DanhMucController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Services\UploadService;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\NhaCungCapController;
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

Route::get('/', function () {
    return view('page.trangchu');
});

// Route::get('index',[
//     'as' => 'trang-chu',
//     'uses' => 'PageController@getIndex',
// ]);

// Route::get('index', 'PageController@getIndex')->name('trang-chu');
Route::get('index', [PageController::class, 'getIndex'])->name('trangchu');
Route::get('loai-san-pham/{type}', [PageController::class, 'getLoaiSanPham'])->name('loaisanpham');
Route::get('chi-tiet-san-pham/{id_sp}', [PageController::class, 'getChiTietSp'])->name('chitietsanpham');
Route::get('lien-he', [PageController::class, 'getLienHe'])->name('lienhe');
Route::get('gioi-thieu', [PageController::class, 'getGioiThieu'])->name('gioithieu');
Route::get('them-gio-hang/{id_product}', [PageController::class, 'getThemGioHang'])->name('themgiohang');
Route::get('xoa-gio-hang/{id_product}', [PageController::class, 'getXoaGioHang'])->name('xoagiohang');
Route::get('dat-hang', [PageController::class, 'getDatHang'])->name('dathang');
Route::post('dat-hang', [PageController::class, 'postDatHang'])->name('dathang');
Route::get('dang-nhap', [PageController::class, 'getDangNhap'])->name('dangnhap');
Route::post('dang-nhap', [PageController::class, 'postDangNhap'])->name('dangnhap');
Route::get('dang-ky', [PageController::class, 'getDangKy'])->name('dangky');
Route::post('dang-ky', [PageController::class, 'postDangKy'])->name('dangky');
Route::get('dang-xuat', [PageController::class, 'getDangXuat'])->name('dangxuat');
Route::get('tim-kiem', [PageController::class, 'getTimKiem'])->name('timkiem');


//admin
Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class  ,'store']);

Route::middleware(['auth'])->group(function() {

    Route::prefix('admin')->group(function() {

        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        //Menu
        Route::prefix('menu')->group(function() {
                //sản phẩm
                Route::get('add', [MenuController::class, 'create']);
                Route::post('add', [MenuController::class, 'store']);
                Route::get('list', [MenuController::class, 'index']);
                Route::get('edit/{MaSP}', [MenuController::class, 'show']);
                Route::post('edit/{MaSP}', [MenuController::class, 'update']);
                Route::delete('destroy', [MenuController::class, 'destroy']);
                //danh mục
                // Route::get('listdanhmuc', [DanhMucController::class, 'index2']);
                // Route::get('editdanhmuc/{MaDanhMuc}', [DanhMucController::class, 'show2']);
                // Route::post('editdanhmuc/{MaDanhMuc}', [DanhMucController::class, 'update2']);
                // Route::get('adddanhmuc', [DanhMucController::class, 'create2']);
                // Route::post('adddanhmuc', [DanhMucController::class, 'store2']);
                // Route::delete('destroy', [DanhMucController::class, 'destroy2']);
                // //nhà cung cấp
                // Route::get('listnhacungcap', [NhaCungCapController::class, 'index3']);
                // Route::get('editnhacungcap/{MaNCC}', [NhaCungCapController::class, 'show3']);
                // Route::post('editnhacungcap/{MaNCC}', [NhaCungCapController::class, 'update3']);
                // Route::get('addnhacungcap', [NhaCungCapController::class, 'create3']);
                // Route::post('addnhacungcap', [NhaCungCapController::class, 'store3']);
                // Route::delete('destroy', [NhaCungCapController::class, 'destroy3']);
        });
        Route::prefix('danhmuc')->group(function() {
            //danh mục
            Route::get('listdanhmuc', [DanhMucController::class, 'index2']);
            Route::get('editdanhmuc/{MaDanhMuc}', [DanhMucController::class, 'show2']);
            Route::post('editdanhmuc/{MaDanhMuc}', [DanhMucController::class, 'update2']);
            Route::get('adddanhmuc', [DanhMucController::class, 'create2']);
            Route::post('adddanhmuc', [DanhMucController::class, 'store2']);
            Route::delete('destroy', [DanhMucController::class, 'destroy2']);
    });
    Route::prefix('nhacungcap')->group(function() {
        // //nhà cung cấp
        Route::get('listnhacungcap', [NhaCungCapController::class, 'index3']);
        Route::get('editnhacungcap/{MaNCC}', [NhaCungCapController::class, 'show3']);
        Route::post('editnhacungcap/{MaNCC}', [NhaCungCapController::class, 'update3']);
        Route::get('addnhacungcap', [NhaCungCapController::class, 'create3']);
        Route::post('addnhacungcap', [NhaCungCapController::class, 'store3']);
        Route::delete('destroy', [NhaCungCapController::class, 'destroy3']);
});
        //Product
        Route::prefix('products')->group(function (){
                Route::get('add',[ProductController::class, 'create']);
        });
        #Upload
        Route::post('upload/services',[UploadController::class, 'store']);
    });
});

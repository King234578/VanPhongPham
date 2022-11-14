<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\ProductType;
use App\Providers\Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('header', function($view){ //truyền loại sản phẩm vào thanh menu ở header
            // nên ở đây là header, với tham số truyền vào $view là tham số bất kì
            $loai_sp = ProductType::all();
            $view->with('truyen_loai_sp', $loai_sp); 
            //tên tham số truyền qua là truyen_loai_sp, còn $loai_sp là dữ liệu sẽ truyền đi
            
            
          
        });

        //kiểm tra giỏ hàng và truyền view qua màn hình header
        $newcart = null;
        view()->composer(['header', 'page.dat_hang'], function($view){
            if(Session('cart')){
                $oldcart = session()->get('cart');
                $newcart = new Cart($oldcart);
                $view->with(['cart'=>session()->get('cart'), 'product_cart'=>$newcart->items, 'totalPrice'=>$newcart->totalPrice, 'totalQty'=>$newcart->totalQty]);
            }
        });

    }
}

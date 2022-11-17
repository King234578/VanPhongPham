<?php

namespace App\Http\Services\Menu;

// use App\Models\DanhMuc;
// use App\Models\Menu;
// use App\Models\SanPham;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Double;

class CustomerServices{
    public function getAll(){
        return Customer::orderbyDesc('id')->paginate(100);
    }
    public function get(){
        return Customer::where('id', $id)->first();

    }

    public function create($request){
        try {
            Customer::create([
                // 'name' => (string) $request->input('name'),
                // 'parent_id' => (int) $request->input('parent_id'),
                // 'description' => (string) $request->input('description'),
                // 'content' => (string) $request->input('content'),
                // 'active' => (string) $request->input('active'),
                // 'slug' => Str::slug($request->input('name','-')),
                'name' => (string) $request->input('name'),
                'phone_number' => (int) $request->input('phone_number'),
                'address'=> (string) $request->input('address'),
                'note'=> (string) $request->input('note'),
                'email'=> (string) $request->input('email'),
                'gender'=> (string) $request->input('gender'),
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            //throw $th;
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }



    public function destroy($request){
        $id = (int) $request->input('id');

        $menu = Customer::where('id', $id)->first();
        if($menu){
            return Customer::where('id', $id)->delete();
        }

        return false;
    }
    public function update($request, $id):bool
    {
        $id->name = (string) $request->input('name');
        $id->description = (string) $request->input('gender');
        $id->email = (Double) $request->input('email');
        $id->promotion_price = (Double) $request->input('address');
        $id->phone_number = (string) $request->input('phone_number');
        $id->note = (string) $request->input('note');
        // $menu->fill($request->input());
        // $MaSP->fill($request->input());
        $id->save();
        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }
}

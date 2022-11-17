<?php

namespace App\Http\Services\Menu;

// use App\Models\DanhMuc;
// use App\Models\Menu;
// use App\Models\SanPham;
use App\Models\Bill;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\Double;

class BillServices{
    public function getAll(){
        return Bill::orderbyDesc('id')->paginate(100);
    }
    public function get(){
        return Bill::where('id', $id)->first();

    }

    public function create($request){
        try {
            Product::create([
                // 'name' => (string) $request->input('name'),
                // 'parent_id' => (int) $request->input('parent_id'),
                // 'description' => (string) $request->input('description'),
                // 'content' => (string) $request->input('content'),
                // 'active' => (string) $request->input('active'),
                // 'slug' => Str::slug($request->input('name','-')),
                'name' => (string) $request->input('name'),
                'type_id' => (int) $request->input('parent_id'),
                'description'=> (string) $request->input('description'),
                'image'=> (string) $request->input('image'),
                'new'=> (string) $request->input('new'),
                'unit'=> (string) $request->input('unit'),
                'unit_price'=> (double) $request->input('SoLuong'),
                'promotion_price'=> (double) $request->input('GiamGia'),
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

        $menu = Product::where('id', $id)->first();
        if($menu){
            return Product::where('id', $id)->delete();
        }

        return false;
    }
    public function update($request, $id):bool
    {
        $id->name = (string) $request->input('name');
        $id->description = (string) $request->input('description');
        $id->unit_price = (Double) $request->input('unit_price');
        $id->promotion_price = (Double) $request->input('promotion_price');
        // $MaSP->sl = (string) $request->input('slug');
        // $menu->fill($request->input());
        // $MaSP->fill($request->input());
        $id->save();
        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }
}

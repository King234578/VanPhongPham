<?php

namespace App\Http\Services\Menu;

// use App\Models\DanhMuc;
// use App\Models\Menu;
use App\Models\SanPham;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class MenuServices{
    public function getAll(){
        return SanPham::orderbyDesc('MaSP')->paginate(20);
    }
    public function get(){
        return SanPham::where('MaSP', $id)->first();

    }
    // public function get($parent_id= 0){
    //     return SanPham::where('parent_id', 0)->getAll();
    //                 // when('parent_id' == 0, function ($query) use ($parent_id){
    //                 //     $query->where('parent_id', $parent_id);
    //                 // })
    //                 //     ->get();


    // }

    public function create($request){
        try {
            SanPham::create([
                // 'name' => (string) $request->input('name'),
                // 'parent_id' => (int) $request->input('parent_id'),
                // 'description' => (string) $request->input('description'),
                // 'content' => (string) $request->input('content'),
                // 'active' => (string) $request->input('active'),
                // 'slug' => Str::slug($request->input('name','-')),
                'TenSP' => (string) $request->input('TenSP'),
                'parent_id' => (int) $request->input('parent_id'),
                'MotaSP'=> (string) $request->input('MotaSP'),
                'AnhSP'=> (string) $request->input('AnhSP'),
                'SoLuong'=> (string) $request->input('SoLuong'),
                'GiamGia'=> (string) $request->input('GiamGia'),
                'MaNCC'=> (string) $request->input('MaNCC'),
                'SPBanChay'=> (string) $request->input('SPBanChay'),
                'active'=> (int) $request->input('acitve'),
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            //throw $th;
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }



    public function destroy($request2){
        $MaSP = (int) $request2->input('MaSP');

        $menu = SanPham::where('MaSP', $MaSP)->first();
        if($menu){
            return SanPham::where('MaSP', $MaSP)->delete();
        }

        return false;
    }
    public function update($request, $MaSP):bool
    {
        $MaSP->TenSP = (string) $request->input('TenSP');
        if($request->input('parent_id') != $MaSP->MaSP ){
             $MaSP->parent_id = (int) $request->input('parent_id');
        }
        $MaSP->MotaSP = (string) $request->input('MotaSP');
        $MaSP->MaNCC = (string) $request->input('MaNCC');
        $MaSP->active = (string) $request->input('active');
        // $MaSP->sl = (string) $request->input('slug');
        // $menu->fill($request->input());
        // $MaSP->fill($request->input());
        $MaSP->save();
        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }
}

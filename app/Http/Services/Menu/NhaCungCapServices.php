<?php

namespace App\Http\Services\Menu;
use App\Models\NhaCungCap;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class NhaCungCapServices{

    public function getAll(){
        return NhaCungCap::orderbyDesc('MaNCC')->paginate(20);
    }

    public function get($MaNCC){
        return NhaCungCap::where('MaNCC', $MaNCC)->first();

    }
    public function get2(){
        return NhaCungCap::where('parent_id'==0);
    }
    public function create($request2){
        try {
            NhaCungCap::create([
                'TenNCC' => (string) $request2->input('TenNCC'),
                'DiaChi_NCC' => (string) $request2->input('DiaChi_NCC'),
                'SoDT_NCC' => (string) $request2->input('SoDT_NCC'),
                'Email_NCC' => (string) $request2->input('Email_NCC'),
                // 'parent_id' => (int) $request2->input('parent_id'),
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            //throw $th;
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
    // public function destroy($request10){

    //     $MaNCC = (int) $request10->input('MaNCC');

    //     $menu = NhaCungCap::where('MaNCC', $MaNCC)->first();
    //     if($menu){
    //         return NhaCungCap::where('MaNCC', $MaNCC)->delete();
    //     }

    //     return false;
    // }
    public function update($request3, $MaNCC):bool
    {
        $MaNCC->TenNCC = (string) $request3->input('TenNCC');
        $MaNCC->DiaChi_NCC = (string) $request3->input('DiaChi_NCC');
        $MaNCC->SoDT_NCC = (string) $request3->input('SoDT_NCC');
        $MaNCC->Email_NCC = (string) $request3->input('Email_NCC');
        $MaNCC->save();
        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }
}

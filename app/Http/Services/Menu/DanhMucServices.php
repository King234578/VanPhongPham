<?php

namespace App\Http\Services\Menu;
use App\Models\DanhMuc;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class DanhMucServices{

    public function getAll2(){
        return DanhMuc::orderbyDesc('MaDanhMuc')->paginate(20);
    }

    public function get($MaDanhMuc){
        return DanhMuc::where('MaDanhMuc', $MaDanhMuc)->first();

    }
    public function get2(){
        return DanhMuc::where('parent_id'==0);
    }
    public function create($request){
        try {
            DanhMuc::create([
                'MaDanhMuc' => (string) $request->input('MaDanhMuc'),
                'TenDanhMuc' => (string) $request->input('TenDanhMuc'),
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
    public function destroy($request3){

        $MaDanhMuc = (int) $request3->input('MaDanhMuc');

        $menu = DanhMuc::where('MaDanhMuc', $MaDanhMuc)->first();
        if($menu){
            return DanhMuc::where('MaDanhMuc', $MaDanhMuc)->delete();
        }

        return false;
    }
    public function update($request3, $MaDanhMuc):bool
    {
    //     $MaDanhMuc->MaDanhMuc = (int) $request3->input('MaDanhMuc');
    //     $MaDanhMuc->TenDanhMuc = (string) $request3->input('TenDanhMuc');
        $MaDanhMuc->fill($request3->input());
        $MaDanhMuc->save();
        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }
}

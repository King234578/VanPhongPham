<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Menu\DanhMucServices;
use App\Models\DanhMuc;
use Encore\Admin\Form\Field\Id;
use App\Http\Requests\Menu\CreateFormRequest;
class DanhMucController extends Controller
{

    protected $DanhMucServices;

    public function __construct(DanhMucServices $DanhMucServices){
        $this->DanhMucServices = $DanhMucServices;
    }
    public function create2(){
        return view('admin.danhmucsanpham.adddanhmuc', [
            'title'=> 'Thêm danh mục mới',
            'danhmucsanpham'=> $this->DanhMucServices->get2()

        ]);
    }
    public function index2()
    {
        return view('admin.danhmucsanpham.list', [
            'title' => 'Danh sách danh mục mới nhất',
            'menu' => $this->DanhMucServices->getAll2(),

        ]);
    }
    public function destroy2(Request $request3){

        $result = $this->DanhMucServices->destroy($request3);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công danh mục'
            ]);
        }
    }
    public function store2(Request $request2){
        $result = $this->DanhMucServices->create($request2);
        return redirect()->back();
    }
    public function show2(DanhMuc $MaDanhMuc){
        return view('admin.danhmucsanpham.editdanhmuc', [
            'title' => 'Danh sách danh mục mới nhất',
            'MaDanhMuc'=>$MaDanhMuc,
            'danhmucsanpham'=> $this->DanhMucServices->get($MaDanhMuc)
        ]);
    }
    public function update2(DanhMuc $menu, Request $request2){
        $this->DanhMucServices->update($request2, $menu);
        return redirect('/admin/danhmuc/listdanhmuc');
    }
}

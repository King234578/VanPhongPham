<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\NhaCungCap;
use Illuminate\Http\Request;
use App\Http\Services\Menu\NhaCungCapServices;
class NhaCungCapController extends Controller
{
    protected $NhaCungCapServices;
    public function __construct(NhaCungCapServices $NhaCungCapServices){
        $this->NhaCungCapServices = $NhaCungCapServices;

    }
    public function create3(){
        return view('admin.nhacungcap.addncc', [
            'title'=> 'Thêm danh mục mới',
            'nhacungcap'=> $this->NhaCungCapServices->getAll()
        ]);
    }

    public function store3(Request $request){
        $result = $this->NhaCungCapServices->create($request);
        return redirect()->back();
    }

    public function index3()
    {
        return view('admin.nhacungcap.list', [
            'title' => 'Danh sách danh mục mới nhất',
            'menu' => $this->NhaCungCapServices->getAll(),

        ]);
    }

    public function destroy3(Request $request10){
        $result = $this->NhaCungCapServices->destroy($request10);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công danh mục'
            ]);
        }
    }
    public function show3(NhaCungCap $MaNCC){

        return view('admin.nhacungcap.edit', [
            'title' => 'Danh sách danh mục mới nhất',
            'MaNCC'=>$MaNCC,
            'nhacungcap'=>$this->NhaCungCapServices->getAll(),
        ]);
    }
    public function update3(NhaCungCap $MaNCC, Request $request3){
        // dd($request3);
        $this->NhaCungCapServices->update($request3, $MaNCC);
        return redirect('/admin/menu/listnhacungcap');
    }
}

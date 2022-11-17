<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\BillServices;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $BillServices;
    // protected $danhmucsanpham;
    public function __construct(BillServices $BillServices){
        $this->BillServices = $BillServices;
        // $this->danhmucsanpham= $danhmucsanpham;

    }
    public function create(){
        return view('admin.menu.addsp', [
            'title'=> 'Thêm danh mục mới',
            'sanpham'=> $this->menuServices->getAll()

        ]);
    }

    public function store(Request $request){
        $result = $this->menuServices->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.listb', [
            'title' => 'Danh sách danh mục mới nhất',
            'menu' => $this->BillServices->getAll(),

        ]);
    }


    public function destroy(Request $request){
        $result = $this->menuServices->destroy($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công danh mục'
            ]);
        }
    }

    public function show(Product $id){

        return view('admin.menu.edit', [
            'title' => 'Danh sách danh mục mới nhất',
            'id'=>$id,
            'product'=>$this->menuServices->getAll(),
            // 'danhmucsanpham'=> $this->danhmucsanpham->getAll2()
        ]);
    }
    public function update(Product $id, Request $request){
        // dd($request);
        $this->menuServices->update($request, $id);
        return redirect('/admin/menu/list');
    }
}

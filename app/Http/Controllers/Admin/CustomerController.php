<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\CustomerServices;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $CustomerServices;
    // protected $danhmucsanpham;
    public function __construct(CustomerServices $CustomerServices){
        $this->CustomerServices = $CustomerServices;
        // $this->danhmucsanpham= $danhmucsanpham;

    }
    public function create(){
        return view('admin.menu.addk', [
            'title'=> 'Thêm danh mục mới',
            'sanpham'=> $this->CustomerServices->getAll()

        ]);
    }

    public function store(Request $request){
        $result = $this->CustomerServices->create($request);
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.menu.listc', [
            'title' => 'Danh sách danh mục mới nhất',
            'menu' => $this->CustomerServices->getAll(),

        ]);
    }


    public function destroy(Request $request){
        $result = $this->CustomerServices->destroy($request);
        if($result){
            return response()->json([
                'error'=>false,
                'message'=>'Xóa thành công danh mục'
            ]);
        }
    }

    public function show(Customer $id){

        return view('admin.menu.edit', [
            'title' => 'Danh sách danh mục mới nhất',
            'id'=>$id,
            'product'=>$this->CustomerServices->getAll(),
            // 'danhmucsanpham'=> $this->danhmucsanpham->getAll2()
        ]);
    }
    public function update(Customer $id, Request $request){
        // dd($request);
        $this->CustomerServices->update($request, $id);
        return redirect('/admin/menu/list');
    }
}

<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Http\Menu;
// use App\Models\Menu;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuServices;
use App\Models\SanPham;
use Hamcrest\Core\Set;
use App\Http\Services\Menu\DanhMucServices;
use App\Models\Product;

class MenuController extends Controller
{

    protected $menuServices;
    protected $danhmucsanpham;
    public function __construct(MenuServices $menuServices){
        $this->menuServices = $menuServices;
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
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục mới nhất',
            'menu' => $this->menuServices->getAll(),

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

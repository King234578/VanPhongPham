<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Requests;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Cart;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();

        $new_product = Product::where('new',1)->paginate(4, ['*'], 'published');

        $sale_product = Product::where('promotion_price', '<>', 0)->paginate(4, ['*'], 'unpublished');
        // return view('page.trangchu', ['slide_d' => $slide]);
        // return view('page.trangchu', ['newproduct_d' => $new_product]);
        return view('page.trangchu', compact('slide', 'new_product', 'sale_product'));
    }

    public function getLoaiSanPham($type){
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $ten_loai_sp = ProductType::where('id', $type)->first();
        $loai_sp_left_menu = ProductType::all();
        return view('page.loai_sanpham' ,compact('sp_theoloai', 'sp_khac', 'loai_sp_left_menu', 'ten_loai_sp'));
    }

    public function getChiTietSP($id_sp){

        $chitiet_sp = Product::where('id', $id_sp)->first();
        // print_r($chitiet_sp);
        // exit;
        $sanpham_tuongtu = Product::where('id_type', $chitiet_sp->id_type)->paginate(6, ['*'], 'published');
        $new_product_1 = Product::where('new',1)->paginate(8, ['*'], 'unpublished');

        $sanpham_banchay = DB::select('SELECT products.id, products.name, products.id_type, products.id_type, products.description, products.unit_price, products.promotion_price, products.image FROM products, bill_detail WHERE products.id = bill_detail.id_product GROUP BY bill_detail.id_product, products.id, products.name, products.id_type, products.id_type, products.description, products.unit_price, products.promotion_price, products.image');
        return view('page.chitiet_sanpham', compact('chitiet_sp', 'sanpham_tuongtu', 'new_product_1', 'sanpham_banchay'));

    }

    public function getLienHe(){
        return view('page.lienhe');
    }

    public function getGioiThieu(){
        return view('page.gioithieu');
        // return redirect()->back();
    }

    public function getThemGioHang(Request $req, $id_product){
        $product = Product::find($id_product);
        $oldcart = Session('cart')?session()->get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->add($product, $id_product);
        $req->session()->put('cart', $cart);
        return redirect()->back();
        // return redirect()->route( 'index' );
        // return view('page.trangchu');
    }

    public function getXoaGioHang($id_product){
        $oldcart = Session('cart')?session()->get('cart'):null;
        $cart = new Cart($oldcart);
        $cart->removeItem($id_product);
        if(count($cart->items) > 0){
            session()->put('cart', $cart);
        }
        else{
            session()->forget('cart');
        }
        return redirect()->back();
    }

    public function getDatHang(){
        return view('page.dat_hang');
    }

    public function postDatHang(Request $req){
        $cart = Session('cart');
        $customer = new Customer();
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill();
        // $bill->id = $customer->id;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key => $value){
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }

        session()->forget('cart');
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }

    public function getDangNhap(){
        return view('page.dangnhap');
    }

    public function getDangKy(){
        return view('page.dangky');
    }

    public function postDangKy(Request $req){
        $this->validate($req,[
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:20',
            'fullname'=>'required',
            're_password'=>'required|same:password'
        ],[
            'email.required'=>'Vui lòng nhập email.',
            'email.email'=>'Không đúng định dạng email.',
            'email.unique'=>'Email đã có người sử dụng.',
            'password.required'=>'Vui lòng nhập mật khẩu.',
            're_password.same'=>'Mật khẩu không giống.',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự.'
        ]);

        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong', 'Đã tạo tài khoản thành công!');

    }

    public function postDangNhap(Request $req){
        $this->validate($req,[
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],[
            'email.required'=>'Vui lòng nhập email.',
            'email.email'=>'Email không đúng định dạng.',
            'password.required'=>'Vui lòng nhập mật khẩu.',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự.',
            'password.max'=>'Mật khẩu dài nhất 20 kí tự.',
        ]);

        $credentials = array('email'=>$req->email, 'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success', 'message'=>'Đăng nhập thành công']);

        }
        else{
            return redirect()->back()->with(['flag'=>'danger', 'message'=>'Đăng nhập không thành công']);
        }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect()->route('trangchu');
    }

    public function getTimKiem(Request $req){
        $product = Product::where('name', 'like', '%'.$req->key.'%')
                            ->orWhere('unit_price', $req->key)
                            ->get();
        return view('page.timkiem', compact('product'));
    }
}

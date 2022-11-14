<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
// use Encore\Admin\Middleware\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    public function index(){
        // echo '<h1 style="color:pink; font: size 100px; text-align:center;">LÊ NGỌC THANH NGÂN SPKHTN^^</h1>';
        return view('admin.users.login', [
            'title' => 'Đăng nhập hệ thống'
        ]);
    }
    public function store(Request $request){
        // dd($request->input());
        //kiểm tra email và pass đã được nhập vô chưa
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required|'
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')

        ], $request->input('remember') )){
            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
}

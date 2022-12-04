<?php

namespace App\Http\Controllers;

use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Sale\SaleService;
use App\Http\Services\Slider\SliderService;
use App\Models\UserHome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected $sale;

    public function __construct(SliderService  $slider, MenuService $menu,
                                ProductService $product, SaleService $sale)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->sale = $sale;
    }
    public function login(){
        return view('auth.home_login', [
            'title' => 'Shop Nước Hoa ABC',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get(),
            'sales' => $this->sale->get()
        ]);
    }
//    public function registration(){
//        return view("auth.registration");
//    }
    public function registerUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
             'password' => 'required|min:5|max:12',
        ]);
        $user =  new UserHome();
        $user ->name= $request->name;
        $user ->email= $request->email;
        $user ->password= Hash::make($request->password);//mã hóa
        $res= $user ->save();
        if ($res){
           return back()->with('success', 'Đăng kí thành công! Hãy đăng nhập ngay để mua sắm!');
        }else{
            return back()->with('fail', 'Đăng kí lỗi');
        }
    }

    public function loginUser( Request $request){
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|min:5|max:12',
        ]);
        $user =UserHome::where('email', '=', $request->email)->first();
        if($user){
            if (Hash::check($request->password, $user-> password)){
                $request->Session()->put('loginId', $user->id);
                return redirect('home');
            }else{
                return back()->with('fail','Mật khẩu không khớp');
            }
        }else{
            return back()->with('fail', 'Email này chưa được đăng kí.');
        }
    }

    public function home(){
        if(Session::has('loginId')){
//            return UserHome::where('id', '=', Session::get('loginId'))->first();
            return UserHome::select('name', 'id')
                ->where( 'id', '=', Session::get('loginId'))
                ->orderbyDesc('name','id')
                ->get();
        }
    }

    public function show($id)
    {
        return UserHome::where('id', $id)
            ->where('id', 1)
            ->with('comment')//gọi hàm lấy ra menu
            ->get();
    }
    public function showid($id)
    {

        return UserHome::select('id')
            ->where( 'id', '=', Session::get('loginId'))
        ->firstOrFail();

    }
}

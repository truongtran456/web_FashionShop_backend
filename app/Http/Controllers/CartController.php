<?php

namespace App\Http\Controllers;


use App\Http\Services\Cart\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    protected $user_home;

    public function __construct(CartService $cartService,CustomAuthController $user_home)
    {
        $this->cartService = $cartService;
        $this->user_home=$user_home;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'user_homes' =>$this->user_home->home(),
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request)//updatecart
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)//đặt hàng
    {
        $this->cartService->addCart($request);

        return redirect()->back();//chuyển sang trang khac
    }
}

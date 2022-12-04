<?php

namespace App\Http\Controllers;

use App\Http\Services\Sale\SaleService;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    protected $slider;
    protected $menu;
    protected $product;
    protected $sale;
    protected $user_home;

    public function __construct(SliderService  $slider, MenuService $menu,
                                ProductService $product, SaleService $sale, CustomAuthController $user_home )
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
        $this->sale = $sale;
        $this->user_home=$user_home;
    }

    public function index()
    {
        return view('home', [
            'title' => 'Shop Nước Hoa ABC',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get(),
            'sales' => $this->sale->get(),
            'user_homes' =>$this->user_home->home()
        ]);
    }

    public function loadProduct(Request $request)
    {
        $page = $request->input('page', 0);
        $result = $this->product->get($page);
        if (count($result) != 0) {
            $html = view('products.list', ['products' => $result ])->render();

            return response()->json([ 'html' => $html ]);
        }
        return response()->json(['html' => '' ]);
    }

}

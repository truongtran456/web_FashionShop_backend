<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{
    protected $menuService;
    protected $user_home;

    public function __construct(MenuService $menuService,CustomAuthController $user_home)
    {
        $this->menuService = $menuService;
        $this->user_home=$user_home;

    }

    public function index(Request $request, $id, $slug = '')//(request nhận các thông tin
    {
        $menu = $this->menuService->getId($id);//tạo hàm bên menuService
        $products = $this->menuService->getProduct($menu, $request);

        return view('menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu'  => $menu,
            'user_homes' =>$this->user_home->home()
        ]);
        return view('auth.menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu'  => $menu
        ]);
    }

}

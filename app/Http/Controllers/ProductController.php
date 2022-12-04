<?php

namespace App\Http\Controllers;

use App\Http\Services\Comment\CommentService;
use App\Models\Comment;
use App\Models\UserHome;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;
    protected $user_home;
    protected $comment;

    public function __construct(ProductService $productService,CustomAuthController $user_home,CommentService $comment)
    {
        $this->productService = $productService;
        $this->user_home=$user_home;
        $this->comment=$comment;
    }

    public function index($id = '', $slug = '')
    {
//        kiểm tra xem có tồn tại không để xuất ra
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
//        $comment =$this->comment->home();


        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'user_homes' =>$this->user_home->home(),
//            'comments' =>$this->comment->home(),
//            'comments'=>$comment->name,
        ]);

        return view('footer', [
            'title' => $product->name,
            'product' => $product,
        ]);
    }
    public function store( $id = '', Request $request, $user_home='' )
    {
//        $user_id =Comment::where('$user_id', '=', UserHome::id)->first();
        $this->comment->insert($request, $id);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CustomAuthController;
use App\Http\Services\Comment\CommentService;
use App\Http\Services\Product\ProductService;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController
{
    protected $comment;

    public function __construct(CommentService $comment)
    {
        $this->comment=$comment;
    }


    public function index()
    {
        return view('admin.comments.content', [//truyền tới view
            'title' => 'Danh Sách Comment',
            'comments' => $this->comment->show()

        ]);
    }

    public function view(Comment $comment)
    {
        $aa = $this->comment->getProductForCart($comment);

        return view('admin.comments.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $comment->id,
            'comment' => $comment,
//            'carts' => $carts
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->comment->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bình luận'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

}

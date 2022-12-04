<?php

namespace App\Http\Services\Comment;

use App\Http\Controllers\CustomAuthController;
use App\Models\Comment;
use App\Models\UserHome;
use Illuminate\Support\Facades\Session;

class CommentService
{
    protected $user_home;
    public function __construct( CustomAuthController $user_home)
    {
        $this->user_home=$user_home;
    }
    public function get()
    {
        return Comment::select('comment_body')
            ->where('comment_body')
            ->get();
    }

    public function insert($request, $id)
    {
        $user_id=$this->user_home->showid($id);

        Comment::create([
            'comment_body' => $request->get('comment_body'),
            'user_id' => $user_id->id,
            'post_id' => $id
        ]);
    }

    public function home(){
            return Comment::select('user_id')->
                where( 'user_id', '=', Session::get('loginId'))
                ->with('user')//gọi hàm user lấy ra trong model Comment
                ->firstOrFail();
        }

    public function show()//show du lieu ra admin
    {
        return Comment::with('post')//goi products bên model Comment
        ->orderByDesc('id')->paginate(15);
    }

    public function delete($request)
    {
        $comment = Comment::where('id', $request->input('id'))->first();
        if ($comment) {
            $comment->delete();
            return true;
        }
        return false;
    }
}

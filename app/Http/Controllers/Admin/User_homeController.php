<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\User_home\User_homeService;
use Illuminate\Http\Request;

class User_homeController
{
    protected $user_home;

    public function __construct(User_homeService $user_home)
    {
        $this->user_home=$user_home;
    }
    public function index()
    {
        return view('admin.userhomes.Userhome', [//truyền tới view
            'title' => 'Danh Sách người dùng',
            'user_homes' => $this->user_home->show()

        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->user_home->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công tài khoản'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

}

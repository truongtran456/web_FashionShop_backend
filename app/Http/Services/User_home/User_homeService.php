<?php

namespace App\Http\Services\User_home;

use App\Models\UserHome;

class User_homeService
{
    public function show()//show du lieu ra admin
    {
        return UserHome::select('id','email','name','created_at')
            ->get();
    }

    public function delete($request)
    {
        $user_home = UserHome::where('id', $request->input('id'))->first();
        if ($user_home) {
            $user_home->delete();
            return true;
        }
        return false;
    }


}

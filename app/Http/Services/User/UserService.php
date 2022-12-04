<?php


namespace App\Http\Services\User;


use App\Models\UserHome;

class UserService
{
    public function show()
    {
        return UserHome::select('name', 'email')
            ->where('name', 0)
            ->orderbyDesc('name')
            ->get();
    }
}

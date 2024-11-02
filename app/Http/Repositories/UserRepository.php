<?php

namespace App\Http\Repositories;
use App\Http\Requests\UserCreateRequest;

use App\Models\User;

class UserRepository {
    public function store(UserCreateRequest $request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    }

}
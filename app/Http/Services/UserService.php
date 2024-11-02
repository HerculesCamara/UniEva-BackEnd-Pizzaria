<?php

namespace App\Http\Services;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserCreateRequest;

class UserService {
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function storeUser(array $data) {
        // Create a new UserCreateRequest object from the given data,
        // which automatically validates the incoming request data.
        
        $request = new UserCreateRequest([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], 
            'password_confirmation' => $data['password_confirmation'],
        ]
        );
        
        // Validate the incoming request data using the rules defined in the UserCreateRequest class.
        // Use the UserRepository to store the validated user data.
        return $this->userRepository->store($request);
    }
}
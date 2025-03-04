<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $userDetails
     * @return User
     */
    public function create(array $userDetails): User
    {
        return $this->userRepository->create($userDetails);
    }
}

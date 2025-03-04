<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * @param int $id
     * @return User
     */
    public function show(int $id): User
    {
        return User::findOrFail($id);
    }

    /**
     * @param array $userDetails
     * @return User
     */
    public function create(array $userDetails): User
    {
        return User::create($userDetails);
    }

    /**
     * @param int $userId
     * @param array $userDetails
     * @return User
     */
    public function update(int $userId, array $userDetails)
    {
        // updations
    }

    /**
     * @param int $userId
     * @return bool
     */
    public function delete(int $userId): bool
    {
        // deletion
        return true;
    }
}

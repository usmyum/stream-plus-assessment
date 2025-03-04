<?php

namespace App\Repositories;

use App\Models\UserAddress;

class AddressRepository
{

    /**
     * @param \App\Models\User $user
     * @param array $addressDetails
     * @return mixed
     */
    public function create(\App\Models\User $user, array $addressDetails): UserAddress
    {
        return $user->address()->create($addressDetails);
    }
}

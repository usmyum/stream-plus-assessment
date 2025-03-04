<?php

namespace App\Services;

use App\Repositories\AddressRepository;

class AddressService
{
    /** @var AddressRepository */
    public $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * @param \App\Models\User $user
     * @param array $addressDetails
     * @return \App\Models\UserAddress|mixed
     */
    public function create(\App\Models\User $user, array $addressDetails)
    {
        return $this->addressRepository->create($user, $addressDetails);
    }
}

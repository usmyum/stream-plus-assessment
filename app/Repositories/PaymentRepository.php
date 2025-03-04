<?php

namespace App\Repositories;

use App\Models\PaymentMethod;

class PaymentRepository
{
    /**
     * @param \App\Models\User $user
     * @param array $paymentDetails
     * @return mixed
     */
    public function create(\App\Models\User $user, array $paymentDetails)
    {
        return PaymentMethod::create($paymentDetails);
    }
}

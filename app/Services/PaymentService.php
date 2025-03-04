<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService
{

    /** @var PaymentRepository */
    public $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    /**
     * @param \App\Models\User $user
     * @param array $paymentDetails
     * @return mixed
     */
    public function create(\App\Models\User $user, array $paymentDetails)
    {
        $paymentDetails = array_merge($paymentDetails, ['user_id' => $user->id]);
        $paymentDetails['name'] = $paymentDetails['cardholder_name'];
        unset($paymentDetails['cardholder_name']);
        return $this->paymentRepository->create($user, $paymentDetails);
    }
}

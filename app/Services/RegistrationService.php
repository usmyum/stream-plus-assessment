<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class RegistrationService
{
    /** @var UserService */
    protected $userService;

    /** @var AddressService */
    protected $addressService;

    /** @var PaymentService */
    protected $paymentService;

    /** @var SubscriptionService */
    protected $subscriptionService;

    public function __construct(UserService $userService, AddressService $addressService, PaymentService $paymentService, SubscriptionService $subscriptionService)
    {
        $this->userService = $userService;
        $this->addressService = $addressService;
        $this->paymentService = $paymentService;
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Register a user along with their address and payment details.
     *
     * @param array $userData
     * @return User
     */
    public function registerUser(array $userData): User
    {
        return DB::transaction(function () use ($userData) {
            $user = $this->userService->create($userData['user_details']);
            $this->subscriptionService->create(array_merge($userData['subscription_details'], ['user_id' => $user->id]));

            if (!empty($userData['address_details'])) {
                $this->addressService->create($user, $userData['address_details']);
            }

            if ($userData['subscription_details']['type'] === 'premium' && !empty($userData['payment_details'])) {
                $this->paymentService->create($user, $userData['payment_details']);
            }

            return $user;
        });
    }

}

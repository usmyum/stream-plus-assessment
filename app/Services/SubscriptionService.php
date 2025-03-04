<?php

namespace App\Services;

use App\Repositories\SubscriptionRepository;

class SubscriptionService
{
    /** @var SubscriptionRepository */
    public $subscriptionRepository;

    public function __construct(SubscriptionRepository $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * @param array $subscriptionDetails
     * @return mixed
     */
    public function create(array $subscriptionDetails)
    {
        return $this->subscriptionRepository->create($subscriptionDetails);
    }
}

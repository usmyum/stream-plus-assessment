<?php

namespace App\Repositories;

use App\Models\Subscription;

class SubscriptionRepository
{
    /**
     * @param array $subscriptionDetails
     * @return mixed
     */
    public function create(array $subscriptionDetails)
    {
        return Subscription::create($subscriptionDetails);
    }
}

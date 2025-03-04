<?php

namespace App\Livewire;

use App\Services\RegistrationService;
use Livewire\Component;
use MarvinLabs\Luhn\Facades\Luhn;

class RegisterForm extends Component
{
    public $currentStep = 1;
    public $countries;
    public $name, $email, $phone, $subscriptionType = 'free';
    public $addressLine1, $addressLine2, $city, $postalCode, $state, $country;
    public $cardholderName, $creditCard, $expirationDate, $cvv;

    protected $registrationService;

    public function booted(RegistrationService $registrationService)
    {
        $this->registrationService = $registrationService;
    }

    public function mount()
    {
        $this->countries = \WW\Countries\Models\Country::all()->toArray();
    }

    public function render()
    {
        return view('livewire.register-form');
    }


    public function increaseStep()
    {
        $this->validateStep();
        $this->currentStep++;
    }

    public function decreaseStep()
    {
        $this->currentStep--;
    }

    /**
     * validation of each step
     *
     * @return void
     */
    public function validateStep()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required|min:7',
                'subscriptionType' => 'required|in:free,premium',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'addressLine1' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postalCode' => 'required|string|max:10',
                'country' => 'required|string|max:255',
            ]);
        } elseif ($this->currentStep == 3 && $this->subscriptionType == 'premium') {
            $this->validate([
                'cardholderName' => 'required|string|max:255',
                'creditCard' => 'required|digits:16|Luhn::isValid',
                'expirationDate' => 'required|date_format:m/y|after:today',
                'cvv' => 'required|digits:3',
            ]);
        }
    }

    /**
     * submitting the form & saving data
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit()
    {
        $this->validateStep();

        $this->registrationService->registerUser([
            'user_details' => [
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
            ],
            'address_details' => [
                'address_line1' => $this->addressLine1,
                'address_line2' => $this->addressLine2,
                'city' => $this->city,
                'postal_code' => $this->postalCode,
                'state' => $this->state,
                'country' => $this->country,
            ],
            'subscription_details' => [
                'type' => $this->subscriptionType,
            ],
            'payment_details' => $this->subscriptionType == 'premium' ? [
                'cardholder_name' => $this->cardholderName,
                'credit_card' => $this->creditCard,
                'expiration_date' => $this->expirationDate,
                'cvv' => $this->cvv,
            ] : []
        ]);

        return redirect()->to('/success');
    }
}

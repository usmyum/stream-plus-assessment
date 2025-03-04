<div>
    @if ($currentStep == 1)
        <h2>Step 1: User Information</h2>
        <div class="mb-3">
            <input type="text" class="form-control" wire:model="name" placeholder="Name" id="name" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="email" class="form-control" wire:model="email" placeholder="Email" id="email" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="number" class="form-control" wire:model="phone" placeholder="Phone" id="number" required>
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <select wire:model="subscriptionType" class="form-select">
                <option value="free">Free</option>
                <option value="premium">Premium</option>
            </select>
            @error('subscriptionType') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <p>Selected Subscription Type: <strong>{{ $subscriptionType }}</strong></p>

        <button wire:click="increaseStep" class="btn btn-primary">Next</button>
    @endif

    @if ($currentStep == 2)
        <h2>Step 2: Address Information</h2>
        <div class="mb-3">
            <input type="text" wire:model="addressLine1" class="form-control" placeholder="Address Line 1" required>
            @error('addressLine1') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="text" wire:model="addressLine2" class="form-control" placeholder="Address Line 2 (optional)">
            @error('addressLine2') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="text" wire:model="city" class="form-control" placeholder="City" required>
            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="text" wire:model="postalCode" class="form-control" placeholder="Postal Code" required>
            @error('postalCode') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <input type="text" wire:model="state" class="form-control" placeholder="State/Province" required>
            @error('state') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
        <select wire:model="country" class="form-control" required>
            @foreach($countries as $country)
                <option
                    value="{!! $country['iso_code'] !!}"
                    wire:key="{{$country['iso_code']}}"
                >
                    {!! $country['iso_code'] !!} - {!! $country['name'] !!}
                </option>
            @endforeach
        </select>
        </div>

        <button wire:click="decreaseStep" class="btn btn-secondary">Back</button>
        <button wire:click="increaseStep" class="btn btn-primary">Next to Review Details</button>
    @endif

    @if ($currentStep == 3 && $subscriptionType == 'premium')
        <h2>Step 3: Payment Information</h2>
        <div class="mb-3">
            <input type="text" wire:model="cardholderName" class="form-control" placeholder="Cardholder Name" required>
            @error('cardholderName') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <input type="text" wire:model="creditCard" class="form-control" placeholder="Credit Card Number" required>
            @error('creditCard') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <input type="text" wire:model="expirationDate" class="form-control" placeholder="Expiration Date (MM/YY)" required>
            @error('expirationDate') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <input type="text" wire:model="cvv" class="form-control" placeholder="CVV" required>
            @error('cvv') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button wire:click="decreaseStep" class="btn btn-secondary">Back</button>
        <button wire:click="increaseStep" class="btn btn-primary">Next to Review Details</button>
    @endif

    @if ($currentStep == 4 || ($currentStep == 3 && $subscriptionType == 'free'))
        <h2>Step 4: Review Your Details</h2>
        <div>
            <h4>User Information</h4>
            <p><strong>Name:</strong> {{ $name }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
            <p><strong>Phone:</strong> {{ $phone }}</p>
            <p><strong>Subscription Type:</strong> {{ $subscriptionType }}</p>

            <h4>Address Information</h4>
            <p><strong>Address Line 1:</strong> {{ $addressLine1 }}</p>
            <p><strong>Address Line 2:</strong> {{ $addressLine2 }}</p>
            <p><strong>City:</strong> {{ $city }}</p>
            <p><strong>Postal Code:</strong> {{ $postalCode }}</p>
            <p><strong>State/Province:</strong> {{ $state }}</p>
            <p><strong>Country:</strong> {{ $country }}</p>

            @if ($subscriptionType == 'premium')
                <h4>Payment Information</h4>
                <p><strong>Cardholder Name:</strong> {{ $cardholderName }}</p>
                <p><strong>Credit Card Number:</strong> **** **** **** {{ substr($creditCard, -4) }}</p>
                <p><strong>Expiration Date:</strong> {{ $expirationDate }}</p>
                <p><strong>CVV:</strong> {{ $cvv }}</p>
            @endif
        </div>

        <button wire:click="decreaseStep" class="btn btn-secondary">Back</button>
        <button wire:click="submit" class="btn btn-success">Submit</button>
    @endif
</div>

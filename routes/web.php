<?php

use App\Http\Livewire\OnboardingForm;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function(){
    return view('register');
})->name('register-form');
Route::get('/success', function () {
    return view('success'); // Create a success.blade.php view to show after submission
})->name('success');

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public function render()
    {
        $user = Auth::user();
        return view('livewire.profile', compact('user'));
    }

    public function logout()
    {
        Auth::logout();

        // Redirect to home or any other page after logout
        return redirect('/login');
    }
}

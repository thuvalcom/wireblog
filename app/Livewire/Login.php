<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;
    #[Layout('layouts.login')]
    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($data)) {
            session()->flash('success', 'Login Successfuly');
            $this->redirect('/dashboard', navigate: true);
        } else {
            // Login gagal
            session()->flash('error', 'Invalid credentials');
        }
    }
}

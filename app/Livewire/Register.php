<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    #[Layout('layouts.login')]
    public function render()
    {
        return view('livewire.register');
    }

    public function register()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        session()->flash('success', 'Register Successfuly');
        $this->redirect('/posts', navigate: true);
    }
}

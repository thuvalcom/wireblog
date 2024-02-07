<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Password;

class ResetPassword extends Component
{
    #[Layout('layouts.login')]
    public $email;
    public $token;
    public $password;
    public $password_confirmation;
    public function render()
    {
        return view('livewire.reset-password');
    }



    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            request(['email', 'password', 'password_confirmation', 'token']),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                    'remember_token' => \Illuminate\Support\Str::random(60),
                ])->save();

                $user->setRememberToken(\Illuminate\Support\Str::random(60));

                $this->reset(['email', 'password', 'password_confirmation']);
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            session()->flash('success', 'Password has been reset successfully!');
            return redirect(route('login'));
        } else {
            session()->flash('error', 'Unable to reset password. Please try again.');
            return back();
        }
    }
}

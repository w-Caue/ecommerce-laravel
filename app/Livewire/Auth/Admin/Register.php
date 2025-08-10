<?php

namespace App\Livewire\Auth\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;

    public function save()
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        if ($user->save()) {
            Auth::guard('web')->login($user, false);

            // $this->alert('success', 'Conta cadastrada!', [
            //     'position' => 'center',
            //     'timer' => 3000,
            //     'toast' => false,
            // ]);

            return redirect()->route('admin.dashboard');
        }
    }

    #[Layout('components.layouts.auth-admin')]
    public function render()
    {
        return view('livewire.auth.admin.register');
    }
}

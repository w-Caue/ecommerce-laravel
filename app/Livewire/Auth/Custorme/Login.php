<?php

namespace App\Livewire\Auth\Custorme;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $user = Customer::where('email', $this->email)->first();

        if (!$user) {

            $this->email = '';
            $this->password = '';
            return LivewireAlert::title('Usuário não encontrado!')
                // ->toast()
                ->error()
                ->show();
        }

        $pass = Hash::check($this->password, $user->password);

        if (!$pass) {
            $this->email = '';
            $this->password = '';
            return LivewireAlert::title('Email ou senha incorreto!')
                // ->toast()
                ->error()
                ->show();
            return;
        }

        Auth::guard('customer')->login($user, false);
        return redirect()->route('home');
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.custorme.login');
    }
}

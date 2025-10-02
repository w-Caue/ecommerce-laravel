<?php

namespace App\Livewire\Auth\Admin;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email;

    public $password;

    public function login()
    {
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            return;
        }

        $pass = Hash::check($this->password, $user->password);

        if (!$pass) {
            return;
        }

        $company = Company::where('id', $user->company_id)->first();

        session()->put('company', $company);

        Auth::guard('web')->login($user, false);
        return redirect()->route('admin.dashboard');
    }

    #[Layout('components.layouts.auth-admin')]
    public function render()
    {
        return view('livewire.auth.admin.login');
    }
}

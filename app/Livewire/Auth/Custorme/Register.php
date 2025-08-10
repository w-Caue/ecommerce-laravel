<?php

namespace App\Livewire\Auth\Custorme;

use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;

    public function save()
    {
        $client = Customer::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);

        if ($client->save()) {
            Auth::guard('customer')->login($client, false);

            // $this->alert('success', 'Conta cadastrada!', [
            //     'position' => 'center',
            //     'timer' => 3000,
            //     'toast' => false,
            // ]);

            return redirect()->route('home');
        }
    }
    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.custorme.register');
    }
}

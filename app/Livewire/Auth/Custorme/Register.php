<?php

namespace App\Livewire\Auth\Custorme;

use App\Models\Customer;
use App\Models\CustomerImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
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
        $usuario = Customer::where('email', $this->email)->first();

        $count = CustomerImage::count();

        $id = random_int(1, $count);

        $image = CustomerImage::where('id', $id)->first();

        if ($usuario == null) {
            $user = Customer::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'image' => $image->image,
                'password' => Hash::make($this->password),
            ]);

            if ($user) {
                Auth::guard('customer')->login($user, false);

                return redirect()->route('home');
            }
        } else {
            return LivewireAlert::title('Email já esta sendo utilizado!')
                // ->toast()
                ->error()
                ->show();
        }
    }
    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.auth.custorme.register');
    }
}

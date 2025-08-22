<?php

namespace App\Livewire\Ecommerce;

use App\Models\Customer;
use App\Models\CustomerImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Pessoa extends Component
{
    // #[Validate('min:3', message: 'This title is too short')]
    #[Validate('required', message: 'O campo nome não pode estar em branco.')]
    public $name;

    #[Validate('required', message: 'O campo email não pode estar em branco.')]
    public $email;

    public $phone;

    #[Validate('required', message: 'O campo senha estar em branco.')]
    public $password;

    public $emailLogin;

    public $passwordLogin;

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('ecommerce.localizacao');
        }
    }

    public function login()
    {
        $client = Customer::where('email', $this->emailLogin)->first();

        if (!$client) {
            return LivewireAlert::title('Usuário não encontrado!')
                // ->toast()
                ->error()
                ->show();
        }

        $pass = Hash::check($this->passwordLogin, $client->password);

        if (!$pass) {
            return LivewireAlert::title('Senha incorreta!')
                // ->toast()
                ->error()
                ->show();
        }

        Auth::guard('customer')->login($client, false);

        return redirect()->route('pagamento');
    }

    public function register()
    {
        // $this->validate();

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

                return redirect()->route('pagamento');
            }
        } else {
            return LivewireAlert::title('Email já esta sendo utilizado!')
                // ->toast()
                ->error()
                ->show();
        }
    }
    public function render()
    {
        return view('livewire.ecommerce.pessoa');
    }
}

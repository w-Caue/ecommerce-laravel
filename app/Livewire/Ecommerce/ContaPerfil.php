<?php

namespace App\Livewire\Ecommerce;

use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class ContaPerfil extends Component
{
    public $client;

    public $name;

    public $email;

    public $phone;

    public $image;

    public $password;
    public $newpassword;

    public function dados()
    {
        $this->client = auth()->guard('customer')->user()->id;

        $customer = Customer::where('id', $this->client)->first();

        $this->name = $customer->name;
        $this->email = $customer->email;
        $this->phone = $customer->phone;
        $this->image = $customer->image;

        return $customer;
    }

    public function edit()
    {
        $client = Customer::where('id', $this->client)->first();

        if ($this->password) {
            $pass = Hash::check($this->password, $client->password);

            if (!$pass) {
                return LivewireAlert::title('Senha atual incorreta!')
                    // ->toast()
                    ->error()
                    ->show();
            }

            Customer::where('id', $client->id)->update([
                'password' => Hash::make($this->newpassword),
            ]);
        }

        Customer::where('id', $client->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        $this->password = '';
        $this->newpassword = '';

        return LivewireAlert::title('Alteração feita!')
            // ->toast()
            ->success()
            ->show();
    }

    public function render()
    {
        return view('livewire.ecommerce.conta-perfil', [
            'customer' => $this->dados(),
        ]);
    }
}

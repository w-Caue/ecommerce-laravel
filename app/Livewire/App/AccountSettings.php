<?php

namespace App\Livewire\App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class AccountSettings extends Component
{
    use WithFileUploads;

    public $codUser;

    public $name;

    public $email;

    public $img;

    public $password;
    public $newpassword;

    public $newName;
    public $newEmail;

    public $newPass;
    public $confirmPass;

    public $newimage;

    public $loginEmail;
    public $loginPass;
    // public $loginImage;

    public $loginUser;

    public function mount()
    {
        $this->codUser = Auth::user()->id;

        $this->detail();
    }

    public function dados()
    {
        $users = User::select([
            'users.*'
        ])->get();

        return $users;
    }

    public function detail()
    {
        $user = User::where('id', $this->codUser)->first();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->img = $user->image;

        return;
    }

    public function edit()
    {
        $user = User::where('id', $this->codUser)->first();

        $blob = '';

        if ($this->img) {
            $path = $this->img->getRealPath();
            $mimetype = pathinfo($path, PATHINFO_EXTENSION);

            $source = file_get_contents($path);
            $base64 = base64_encode($source);
            $blob = 'data:' . $mimetype . ';base64,' . $base64;
        }

        if ($this->password) {
            $pass = Hash::check($this->password, $user->password);

            if (!$pass) {
                return LivewireAlert::title('Senha atual incorreta!')
                    // ->toast()
                    ->error()
                    ->show();
            }

            User::where('id', $user->id)->update([
                'password' => Hash::make($this->newpassword),
            ]);
        }

        User::where('id', $user->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'image' => $blob,
        ]);

        $this->password = '';
        $this->newpassword = '';

        return LivewireAlert::title('Alteração feita!')
            // ->toast()
            ->success()
            ->show();
    }

    public function save()
    {
        if ($this->newPass != $this->confirmPass) {
            $this->newPass = '';
            $this->confirmPass = '';

            return LivewireAlert::title('Senhas diferentes!')
                // ->toast()
                ->error()
                ->show();
        }

        $blob = '';
        if ($this->newimage) {
            $path = $this->newimage->getRealPath();
            $mimetype = pathinfo($path, PATHINFO_EXTENSION);

            $source = file_get_contents($path);
            $base64 = base64_encode($source);
            $blob = 'data:' . $mimetype . ';base64,' . $base64;
        }

        $user = User::create([
            'name' => $this->newName,
            'email' => $this->newEmail,
            'type' => 'User',
            'password' => Hash::make($this->newPass),
            'image' => $blob,
        ]);

        if ($user->save()) {
            $this->dispatch('close-modal-medium');

            return LivewireAlert::title('Usuário criado!')
                // ->toast()
                ->success()
                ->show();
        }
    }

    public function setLogin($cod)
    {
        $user = User::where('id', $cod)->first();

        return $this->loginUser = $user;
    }

    public function login()
    {
        if ($this->loginEmail != $this->loginUser->email) {
            return LivewireAlert::title('Email incorreto!')
                // ->toast()
                ->error()
                ->show();
        }

        $pass = Hash::check($this->loginPass, $this->loginUser->password);

        if (!$pass) {
            return LivewireAlert::title('Senha incorreta!')
                // ->toast()
                ->error()
                ->show();
        }

        Auth::login($this->loginUser, false);

        return $this->js('window.location.reload()');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.app.account-settings', [
            'users' => $this->dados()
        ]);
    }
}

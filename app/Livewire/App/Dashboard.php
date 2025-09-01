<?php

namespace App\Livewire\App;

use App\Models\Customer;
use App\Models\CustomerImage;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Dashboard extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.app.dashboard');
    }
}

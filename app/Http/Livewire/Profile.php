<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Profile extends Component
{
    protected $listeners = [
        'refreshParent' => '$refresh',
    ];
    
    public function render()
    {
        return view('livewire.profile');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminNav extends Component
{
    protected $listeners = [
        'photoAdded' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.admin.admin-nav');
    }
}

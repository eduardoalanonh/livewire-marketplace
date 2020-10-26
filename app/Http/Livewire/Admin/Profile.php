<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        return view('livewire.admin.profile')
            ->extends('layouts.admin')
            ->section('content');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminHome extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-home')
            ->extends('layouts.admin')
            ->section('content');

    }
}

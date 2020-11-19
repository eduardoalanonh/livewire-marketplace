<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use MongoDB\Driver\Session;

class AdminHome extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-home',[
            'user' => auth()->user()
        ])
            ->extends('layouts.admin')
            ->section('content');

    }
}

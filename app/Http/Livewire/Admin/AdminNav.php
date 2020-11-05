<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminNav extends Component
{
    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';
    public $noAvatar = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/no-avatar.png';

    protected $listeners = [
        'photoAdded' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.admin.admin-nav');
    }
}

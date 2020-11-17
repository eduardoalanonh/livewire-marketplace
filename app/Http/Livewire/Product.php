<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Product extends Component
{

    public $product;
    public $user;
    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';

    public function mount(int $id)
    {
        $this->product = \App\Models\Product::find($id);
        $this->user = User::find($this->product->user_id);
    }

    public function render()
    {
        return view('livewire.product')
            ->extends('layouts.app')
            ->section('content');
    }

}

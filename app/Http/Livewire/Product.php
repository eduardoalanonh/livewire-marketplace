<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Product extends Component
{

    public $product;
    public $user;
    public $quantity = 1;
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

    public function upQuantity()
    {
        $this->quantity += 1;
    }

    public function downQuantity()
    {
        $this->quantity -= 1;
        if ($this->quantity <= 0) {
            $this->quantity = 1;
        }
    }
}

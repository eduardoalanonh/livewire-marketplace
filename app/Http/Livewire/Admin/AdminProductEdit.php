<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class AdminProductEdit extends Component
{
    public $product;
    public $name;
    public $description;
    public $price;
    public $unique_product;
    public $photo;
    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';


    public function mount($id)
    {
        $this->product = Product::findOrfail($id);
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->unique_product = $this->product->unique_product;
        $this->photo = $this->product->photo;
    }


    public function render()
    {
        if (auth()->user()->id !== $this->product->user_id) {
            redirect()->route('admin.product');
        }
        return view('livewire.admin.admin-product-edit')
            ->extends('layouts.admin')
            ->section('content');
    }

    public function updateProduct()
    {
        $this->product->update([
           'name' =>  $this->name,
           'description'  => $this->description,
           'price'=> $this->price,
           'unique_product' => $this->unique_product
        ]);

        $this->alert('success', 'Sucesso!', [
            'position'  =>  'center',
            'timer'  =>  5000,
            'toast'  =>  false,
            'text'  =>  'Seu produto foi atualizado!',
            'showCancelButton'  =>  false,
            'showConfirmButton'  =>  false
        ]);
    }
}

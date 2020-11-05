<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductPhoto;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProduct extends Component
{

    use WithFileUploads;

    public $name;
    public $description;
    public $price;
    public $unique_product;
    public $photo;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|min:10',
        'price' => 'required',
        'photo' => 'required'
    ];


    public function render()
    {
        return view('livewire.admin.admin-product')
            ->extends('layouts.admin')
            ->section('content');

    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }


    public function creatProduct()
    {
        $this->validate();

        //creat product
        $product = Product::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'description' => $this->description,
            'unique_product' => $this->unique_product ?? 0,
            'price' => $this->price
        ]);


        $imagePath = $this->photo->store('photos', 's3');


        //creat product image
        ProductPhoto::create([
            'product_id' => $product->id,
            'image' => $imagePath
        ]);


        $this->name = $this->description = $this->price = $this->photo = '';


        $this->emit('productAdded');

        $this->alert('success', 'Sucesso!', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'text' => 'Seu produto foi criado!',
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
    }

}

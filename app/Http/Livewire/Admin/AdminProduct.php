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
    public $photo;

    protected $rules = [
        'name' => 'required',
        'description' => 'required|min:10',
        'price' => 'required'
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
            'user_id' => 1,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price
        ]);

        $imagePath = $this->photo->store('public/photos');

        //creat product image
        ProductPhoto::create([
            'product_id' => $product->id,
            'image' => $imagePath
        ]);

        $this->name = $this->description = $this->price = $this->photo = '';

        $this->emit('productAdded');

    }

}

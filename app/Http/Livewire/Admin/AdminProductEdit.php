<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductPhoto;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProductEdit extends Component
{
    use WithFileUploads;

    public $product;
    public $name;
    public $description;
    public $price;
    public $unique_product;
    public $photo;
    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';
    public $photos;


    public function mount($id)
    {
        $this->product = Product::findOrfail($id);
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->unique_product = $this->product->unique_product;
        $this->photos = $this->product->photo;
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
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'unique_product' => $this->unique_product
        ]);

        $this->alert('success', 'Sucesso!', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'text' => 'Seu produto foi atualizado!',
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);
    }

    public function updatePhoto()
    {

        $path = $this->photo->store('photos', 's3');

        ProductPhoto::create([
                'product_id' => $this->product->id,
                'image' =>  $path,
            ]);

       $this->alert('success', 'Sucesso!', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'text' => 'Sua foto foi adicionada ao produto',
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);

       $this->photo = null;

        $this->emit('updatePhotoProduct');
    }
}

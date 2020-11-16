<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductPhoto;
use Livewire\Component;

class AdminProductImage extends Component
{
    public $product;
    public $image;
    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';


    protected $listeners = [
        'updatePhotoProduct' => '$refresh'
    ];

    public function render()
    {
        $product = Product::findOrfail($this->product);
        $this->image = $product->photo;

        return view('livewire.admin.admin-product-image', [
            'images' => $this->image
        ]);
    }

    public function destroyPhoto(int $id)
    {
       ProductPhoto::destroy($id);

        $this->alert('success', 'Sucesso!', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'text' => 'Sua foto foi excluida com sucesso!',
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);

    }
}

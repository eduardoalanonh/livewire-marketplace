<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class AdminProductsShow extends Component
{
    use WithPagination;

    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';
    public $firstImage;

    protected $listeners = [
        'productAdded' => '$refresh'
    ];

    public function render()
    {

        return view('livewire.admin.admin-products-show', [
            'products' =>  auth()->user()->products()->orderBy('id', 'desc')->paginate(6)
        ]);
    }

    public function destroyProduct(int $id)
    {
        Product::destroy($id);
    }

}

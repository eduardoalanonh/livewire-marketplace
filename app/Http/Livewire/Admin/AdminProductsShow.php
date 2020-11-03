<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\ProductPhoto;
use Livewire\Component;
use Livewire\WithPagination;


class AdminProductsShow extends Component
{
    use WithPagination;

    protected $listeners = [
        'productAdded' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.admin.admin-products-show', [
            'products' =>  auth()->user()->products()->orderBy('id', 'desc')->paginate(6),
        ]);
    }

    public function destroyProduct(int $id)
    {
        Product::destroy($id);
    }

}

<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Home extends Component
{
    use WithPagination;

    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';


    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {


        return view('livewire.home',[
            'products' => Product::where('name', 'like', '%'.$this->search.'%')->paginate(10),
        ])
            ->extends('layouts.app')
            ->section('content');
    }

//    public function searchProducts()
//    {
//        $okok = [];
//         $searchTerm = '%'.$this->searchTerm.'%';
//        $ok = Product::where('name','like', $searchTerm)->paginate(10);
//        foreach ($ok as $oks)
//        {
//           $okok[] = $oks;
//        }
//        $this->teste = $okok;
//
//    }

}

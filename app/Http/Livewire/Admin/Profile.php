<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $email;
    public $password;
    public $address;
    public $phone;
    public $name;
    public $photo;
    public $imagePath = null;

    public function render()
    {
        return view('livewire.admin.profile')
            ->extends('layouts.admin')
            ->section('content');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    //show data inputs
    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->address = auth()->user()->address->block_and_number ?? '';
        $this->phone = auth()->user()->address->phone ?? '';
    }

    public function updateProfile()
    {

        if ($this->photo) {
            $imagePath = $this->photo->store('public');
            $this->imagePath = str_replace('public/', '', $imagePath);
        } else {
            $this->imagePath = auth()->user()->profile_photo_path;
        }

        \auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
            'profile_photo_path' => $this->imagePath
        ]);

        if (auth()->user()->address) {
            auth()->user()->address->update([
                'user_id' => auth()->user()->id,
                'block_and_number' => $this->address,
                'phone' => $this->phone
            ]);
        } else {
            auth()->user()->address()->create([
                'user_id' => auth()->user()->id,
                'block_and_number' => $this->address,
                'phone' => $this->phone
            ]);
        }

        $this->emit('photoAdded');
    }


}

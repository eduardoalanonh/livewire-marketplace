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
    public $block;
    public $apartment;
    public $phone;
    public $name;
    public $photo;
    public $imagePath = null;
    public $tempImage = false;
    public $s3Photo = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/';
    public $noAvatar = 'https://auroramarketplace.s3-sa-east-1.amazonaws.com/no-avatar.png';


    public function render()
    {
        return view('livewire.admin.profile')
            ->extends('layouts.admin')
            ->section('content');
    }

    public function updatedPhoto()
    {
        $this->photo->store('tmp', 's3');
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    //show data inputs
    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->block = auth()->user()->address->block ?? '';
        $this->apartment = auth()->user()->address->apartment ?? '';
        $this->phone = auth()->user()->address->phone ?? '';
    }

    public function updateProfile()
    {

        if ($this->photo) {
            $this->imagePath = $this->photo->store('avatar', 's3');
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
                'block' => $this->block,
                'apartment' => $this->apartment,
                'phone' => $this->phone
            ]);
        } else {
            auth()->user()->address()->create([
                'user_id' => auth()->user()->id,
                'block' => $this->block,
                'apartment' => $this->apartment,
                'phone' => $this->phone
            ]);
        }

        $this->alert('success', 'Sucesso!', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'text' => 'Seu perfil foi atualizado!',
            'showCancelButton' => false,
            'showConfirmButton' => false
        ]);

        $this->emit('photoAdded');

        $this->tempImage = true;

    }

}

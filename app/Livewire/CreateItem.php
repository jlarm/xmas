<?php

namespace App\Livewire;

use App\Models\Kid;
use Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateItem extends Component
{
    use WithFileUploads;

    public Kid $kid;

    #[Validate(['required', 'string'])]
    public string $name = '';
    #[Validate(['nullable', 'string'])]
    public string $store = '';
    #[Validate(['nullable', 'string'])]
    public $size;
    #[Validate(['nullable', 'string'])]
    public string $color = '';
    #[Validate(['nullable', 'string'])]
    public string $link = '';
    #[Validate(['nullable'])]
    public $price;
    #[Validate(['boolean'])]
    public bool $purchased = false;
    #[Validate(['boolean'])]
    public bool $grandma = false;
    public $hidePurchased;
    #[Validate(['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:1024'])]
    public $image;

    public function addItem(): void
    {
        $this->validate();

        // Remove any $ from the price input
        $this->price = str_replace('$', '', $this->price);

        $item = $this->kid->items()->create([
            'parent' => (bool) auth()->user(),
            'name' => $this->pull('name'),
            'store' => $this->pull('store'),
            'size' => $this->pull('size'),
            'color' => $this->pull('color'),
            'price' => $this->pull('price'),
            'link' => $this->pull('link'),
            'purchased' => $this->pull('purchased'),
            'grandma' => $this->pull('grandma'),
        ]);

        if ($this->image) {
            $item->addMedia($this->image)->toMediaCollection('images');
            $this->image = null;
        }

        Flux::toast(
            text: 'Item added successfully',
            heading: 'Added',
            variant: 'success',
        );
    }

    public function removeTempImage()
    {
        $this->image = null;
    }

    public function render()
    {
        return view('livewire.create-item');
    }
}

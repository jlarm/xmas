<?php

namespace App\Livewire;

use App\Models\Kid;
use Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateItem extends Component
{
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
    public $hidePurchased;

    public function addItem(): void
    {
        $this->validate();

        // Remove any $ from the price input
        $this->price = str_replace('$', '', $this->price);

        // Ensure the price is a valid number
        if (! is_numeric($this->price)) {
            $this->price = null;
        }

        $this->price = $this->price * 100;

        $this->kid->items()->create([
            'parent' => (bool) auth()->user(),
            'name' => $this->pull('name'),
            'store' => $this->pull('store'),
            'size' => $this->pull('size'),
            'color' => $this->pull('color'),
            'price' => $this->pull('price'),
            'link' => $this->pull('link'),
            'purchased' => $this->pull('purchased'),
        ]);

        $this->dispatch('update-items');

        Flux::toast(
            heading: 'Added',
            text: 'Item added successfully',
            variant: 'success',
        );
    }

    public function render()
    {
        return view('livewire.create-item');
    }
}

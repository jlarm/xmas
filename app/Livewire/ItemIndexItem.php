<?php

namespace App\Livewire;

use App\Models\Item;
use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ItemIndexItem extends Component
{
    public Item $item;
    #[Validate(['required', 'string'])]
    public string $name;
    #[Validate(['nullable', 'string'])]
    public string $store;
    #[Validate(['nullable', 'string'])]
    public $size;
    #[Validate(['nullable', 'string'])]
    public string $color;
    #[Validate(['nullable', 'string'])]
    public string $link;
    #[Validate(['nullable'])]
    public $price;
    #[Validate(['boolean'])]
    public bool $purchased = false;

    public function mount()
    {
        $this->name = $this->item->name;
        $this->store = $this->item->store ?? '';
        $this->size = $this->item->size ?? '';
        $this->color = $this->item->color ?? '';
        $this->link = $this->item->link ?? '';
        $this->price = $this->item->price ? number_format($this->item->price / 100, 2, '.', '') : null;
        $this->purchased = $this->item->purchased ?? false;
    }

    public function edit()
    {
        $this->modal('item-edit')->show();
    }

    public function markPurchased()
    {
        $this->item->update(['purchased' => true]);

        $this->dispatch('update-items');

        Flux::toast(
            heading: 'Purchases',
            text: 'Item marked as purchased',
            variant: 'success',
        );
    }

    public function update()
    {
        $this->validate();

        // Remove any $ from the price input
        $this->price = str_replace('$', '', $this->price);

        // Ensure the price is a valid number
        if (! is_numeric($this->price)) {
            $this->price = null;
        }

        $this->price = $this->price * 100;

        $this->item->update([
            'name' => $this->name,
            'store' => $this->store,
            'size' => $this->size,
            'color' => $this->color,
            'link' => $this->link,
            'price' => $this->price,
            'purchased' => $this->purchased,
        ]);

        $this->modal('item-edit')->close();

        Flux::toast(
            heading: 'Updated',
            text: 'Item updated successfully',
            variant: 'success',
        );
    }

    public function render()
    {
        return view('livewire.item-index-item');
    }
}

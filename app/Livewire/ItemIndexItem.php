<?php

namespace App\Livewire;

use App\Models\Item;
use Flux\Flux;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ItemIndexItem extends Component
{
    use WithFileUploads;

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
    #[Validate(['boolean'])]
    public bool $grandma = false;
    public $image;

    public function mount()
    {
        $this->name = $this->item->name;
        $this->store = $this->item->store ?? '';
        $this->size = $this->item->size ?? '';
        $this->color = $this->item->color ?? '';
        $this->link = $this->item->link ?? '';
        $this->price = $this->item->price;
        $this->purchased = $this->item->purchased ?? false;
        $this->grandma = $this->item->grandma;
        $this->image = $this->item->getFirstMediaUrl('images', 'main') ?? '';
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
            text: 'Item marked as purchased',
            heading: 'Purchases',
            variant: 'success',
        );
    }

    public function editItem()
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
            'grandma' => $this->grandma,
        ]);

        if ($this->image) {
            $this->item->addMedia($this->image)->toMediaCollection('images');
            $this->image = null;
        }

        $this->modal('item-edit')->close();

        $this->dispatch('update-items');

        Flux::toast(
            text: 'Item updated successfully',
            heading: 'Updated',
            variant: 'success',
        );
    }

    public function removeTempImage(): void
    {
        $this->image = null;
    }

    public function deleteImg()
    {
        $this->item->clearMediaCollection('images');

        $this->image = null;

        $this->dispatch('update-items');
    }

    public function render()
    {
        return view('livewire.item-index-item');
    }
}

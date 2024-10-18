<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemIndexItem extends Component
{
    public Item $item;
    public $purchased;

    public function updatedPurchased(): void
    {
        $this->item->update(['purchased' => true]);
    }

    public function render()
    {
        return view('livewire.item-index-item');
    }
}

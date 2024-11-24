<?php

namespace App\Livewire\Grandma;

use App\Models\Item;
use Flux\Flux;
use Livewire\Component;

class IndexItem extends Component
{
    public Item $item;
    public $purchased;

    public function mount(): void
    {
        $this->purchased = $this->item->purchased;
    }

    public function updatedPurchased($value): void
    {
        $this->item->update([
            'purchased' => $value,
        ]);

        Flux::toast(
            text: $value ? 'Item marked as purchased' : 'Item marked as not purchased',
            heading: $value ? 'Purchased' : 'Not Purchased',
            variant: 'success',
        );
    }

    public function render()
    {
        return view('livewire.grandma.index-item');
    }
}

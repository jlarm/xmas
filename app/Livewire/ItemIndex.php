<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Kid;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ItemIndex extends Component
{
    use WithPagination;

    public Kid $kid;

    public function deleteItem($id): void
    {
        $item = Item::findOrFail($id);
        $item->delete();
        $this->dispatch('update-items');

        Flux::toast(
            heading: 'Deleted',
            text: 'Item deleted successfully',
            variant: 'success',
        );
    }

    #[On('update-items')]
    public function render()
    {
        $query = $this->kid->items();

        if (auth()->check()) {
            $items = $query->where('purchased', false)->paginate(9);
        } else {
            $items = $query->where('parent', false)->paginate(9);
        }

        return view('livewire.item-index', [
            'items' => $items,
        ]);
    }
}

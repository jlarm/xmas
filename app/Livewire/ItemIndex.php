<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Kid;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ItemIndex extends Component
{
    use WithoutUrlPagination, WithPagination;

    public Kid $kid;

    #[Computed]
    #[On('update-items')]
    public function items()
    {
        return $this->kid->items()->latest()->paginate(8);
    }

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

    public function render()
    {
        return view('livewire.item-index');
    }
}

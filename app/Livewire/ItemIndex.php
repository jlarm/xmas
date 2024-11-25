<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Kid;
use Flux\Flux;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[Lazy]
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
            text: 'Item deleted successfully',
            heading: 'Deleted',
            variant: 'success',
        );
    }

    public function placeholder(): string
    {
        return <<<'HTML'
        <div>
            <div class="gird-cols-1 grid gap-5 md:grid-cols-3">
                <div class="relative bg-gray-200 animate-pulse h-72 w-full overflow-hidden rounded-lg"></div>
                <div class="relative bg-gray-200 animate-pulse h-72 w-full overflow-hidden rounded-lg"></div>
                <div class="relative bg-gray-200 animate-pulse h-72 w-full overflow-hidden rounded-lg"></div>
                <div class="relative bg-gray-200 animate-pulse h-72 w-full overflow-hidden rounded-lg"></div>
                <div class="relative bg-gray-200 animate-pulse h-72 w-full overflow-hidden rounded-lg"></div>
                <div class="relative bg-gray-200 animate-pulse h-72 w-full overflow-hidden rounded-lg"></div>
            </div>
        </div>
        HTML;
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

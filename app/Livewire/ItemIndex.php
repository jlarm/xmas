<?php

namespace App\Livewire;

use App\Models\Kid;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ItemIndex extends Component
{
    use WithPagination;

    public Kid $kid;

    #[Computed]
    #[On('update-items')]
    public function items()
    {
        return $this->kid->items()->latest()->paginate(8);
    }

    public function render()
    {
        return view('livewire.item-index');
    }
}

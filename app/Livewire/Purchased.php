<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Purchased extends Component
{
    use WithPagination;

    public \App\Models\Kid $kid;

    #[On('update-items')]
    public function render()
    {
        return view('livewire.purchased', [
            'items' => $this->kid->items()->where('purchased', true)->paginate(9),
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Purchased extends Component
{
    use WithPagination;

    public \App\Models\Kid $kid;

    #[Computed]
    #[On('update-items')]
    public function items()
    {
        return $this->kid->items()->where('purchased', true)->paginate(8);
    }

    public function render()
    {
        return view('livewire.purchased');
    }
}

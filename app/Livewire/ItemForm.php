<?php

namespace App\Livewire;

use App\Models\Kid;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ItemForm extends Component
{
    public Kid $kid;

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.item-form');
    }
}

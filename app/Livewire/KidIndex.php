<?php

namespace App\Livewire;

use App\Models\Kid;
use Livewire\Component;

class KidIndex extends Component
{
    public function render()
    {
        return view('livewire.kid-index', [
            'kids' => Kid::all(),
        ]);
    }
}

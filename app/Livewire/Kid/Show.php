<?php

namespace App\Livewire\Kid;

use App\Models\Kid;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    public Kid $kid;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.kid.show');
    }
}

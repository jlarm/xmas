<?php

namespace App\Livewire\Page;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Kid extends Component
{
    public \App\Models\Kid $kid;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.page.kid');
    }
}

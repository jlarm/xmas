<?php

namespace App\Livewire;

use App\Models\Kid;
use Livewire\Component;

class Stats extends Component
{
    public Kid $kid;

    public function totalItems()
    {
        return $this->kid->items()->count();
    }

    public function totalPurchased()
    {
        return $this->kid->items()->where('purchased', true)->count();
    }

    public function totalCost()
    {
        return $this->kid->items()->select('price')->sum('price') / 100;
    }

    public function totalSpent()
    {
        return $this->kid->items()->where('purchased', true)->sum('price') / 100;
    }

    public function render()
    {
        return view('livewire.stats');
    }
}

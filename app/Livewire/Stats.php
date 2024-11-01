<?php

namespace App\Livewire;

use App\Models\Kid;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class Stats extends Component
{
    public Kid $kid;

    public function totalItems()
    {
        return $this->getItems()->count();
    }

    public function totalPurchased()
    {
        return $this->getItems()->where('purchased', true)->count();
    }

    public function totalCost(): float|int
    {
        return $this->getItems()->select('price')->sum('price') / 100;
    }

    public function totalSpent(): float|int
    {
        return $this->getItems()->where('purchased', true)->sum('price') / 100;
    }

    public function placeholder(): string
    {
        return <<<'HTML'
            <div class="w-full h-32 my-8 bg-gray-200 rounded-2xl animate-pulse"></div>
        HTML;

    }

    public function render(): View
    {
        return view('livewire.stats');
    }

    private function getItems()
    {
        return $this->kid->items();
    }
}

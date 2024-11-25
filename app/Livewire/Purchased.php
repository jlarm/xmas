<?php

namespace App\Livewire;

use App\Models\Kid;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

#[Lazy]
class Purchased extends Component
{
    use WithoutUrlPagination, WithPagination;

    public Kid $kid;

    public function placeholder()
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
        return view('livewire.purchased', [
            'items' => $this->kid->items()->where('purchased', true)->paginate(9),
        ]);
    }
}

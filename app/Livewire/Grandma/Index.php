<?php

namespace App\Livewire\Grandma;

use App\Models\Item;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Index extends Component
{
    use WithoutUrlPagination, WithPagination;

    public $sortBy = 'name';
    public $sortDirection = 'desc';
    #[Url(as: 'kid')]
    public $kid = '';

    public function sort($column): void
    {
        if ($this->sortBy == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    #[Computed]
    public function items()
    {
        return Item::query()
            ->where('grandma', true)
            ->when($this->kid, fn ($query) => $query->where('kid_id', $this->kid))
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(20);
    }

    public function render()
    {
        return view('livewire.grandma.index');
    }
}

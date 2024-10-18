<flux:table :paginate="$this->items">
    <flux:columns>
        <flux:column>Name</flux:column>
        <flux:column>Size</flux:column>
        <flux:column>Color</flux:column>
        <flux:column>Price</flux:column>
        <flux:column>Purchased</flux:column>
        <flux:column></flux:column>
    </flux:columns>

    <flux:rows>
        @foreach ($this->items as $item)
            <livewire:item-index-item :$item />
        @endforeach
    </flux:rows>
</flux:table>

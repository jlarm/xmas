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
            <flux:row>
                <flux:cell>{{ $item->name }}</flux:cell>
                <flux:cell>{{ $item->size ? $item->size : '-' }}</flux:cell>
                <flux:cell>{{ $item->color ? $item->color : '-' }}</flux:cell>
                <flux:cell>{{ $item->price ? Number::currency($item->price / 100) : '-' }}</flux:cell>
                <flux:cell>
                    @if ($item->purchased)
                        <flux:badge size="sm" color="lime" inset="top bottom">
                            <flux:icon.check variant="micro" />
                        </flux:badge>
                    @else
                        -
                    @endif
                </flux:cell>
                <flux:cell>
                    @if ($item->link)
                        <flux:button href="{{ $item->link }}" target="_blank" icon-trailing="arrow-up-right" size="xs">
                            Link
                        </flux:button>
                    @else
                        -
                    @endif
                </flux:cell>
            </flux:row>
        @endforeach
    </flux:rows>
</flux:table>

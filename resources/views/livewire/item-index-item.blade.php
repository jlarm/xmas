<flux:row>
    <flux:cell>{{ $item->name }}</flux:cell>
    <flux:cell>{{ $item->size ? $item->size : '-' }}</flux:cell>
    <flux:cell>{{ $item->color ? $item->color : '-' }}</flux:cell>
    <flux:cell>{{ $item->price ? Number::currency($item->price / 100) : '-' }}</flux:cell>
    <flux:cell>
        <flux:switch wire:model.live="purchased" wire:click="purchased" />
        {{ $item->purchased }}
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
